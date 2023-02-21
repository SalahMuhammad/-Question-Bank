import { sendGetXHR } from "./myFunctions.js";

window.addEventListener( 'load', ( e ) => {
  // data consists of array of objects each object contains questions, answers, selections
  let data = decodeURIComponent( 
    document
    .cookie
    .split( ';' )
    .map( ( val ) => {
      if ( val.includes( 'data=' ) )
        return val.slice( 5 )
    } ) [0]
  );

  data = JSON.parse( data );

  let submit  = document.querySelector( 'input[type="submit"]');

  let popup   = document.querySelector( '.popup' );

  let minutes = document.querySelector( '.minutes' );
  let seconds = document.querySelector( '.seconds' );
  let min = parseInt( minutes.innerText );
  let sec = parseInt( seconds.innerText );

  let startupTime = Date.now();

  let params = [];
  let queryStringParameters = window.location.search.split( /\?|&/ );

  params.push( ...queryStringParameters.filter( ( val ) => val.includes( 'e_id=' ) ) ); // get e_id from query string parameters

  submit.addEventListener( 'click', ( e ) => {
    timeoutAction( interval, submit, data, params, startupTime, popup );

    sendData( params.join( '&' ) );
  });

  let interval = setInterval( () => {
    sec--;
  
    if ( sec < 0 && min >= 1 ) {
      sec = 59;
      min--;
    }
  
    minutes.innerText = min < 10 ? '0' + min : min;
    seconds.innerText = sec < 10 ? '0' + sec : sec;

    if ( sec <= 0 && min === 0 ) {
      timeoutAction( interval, submit, data, params, startupTime, popup );

      sendData( params.join( '&' ) );
    }

  }, 1000);
});

/**
 * 
 * @param { interval_to_clear } interval 
 * @param { btn_to_disable } btn 
 * @param { obj_to_mark_answers } data 
 * @param { arrayOfParamsToPathToExamActionToAddLogs } valuesArr
 */
function timeoutAction( interval, btn, data, valuesArr, startupTime, popup ) {
  let duration_by_secs  = ( ( Date.now() - startupTime ) / 1000 ).toFixed( 2 );

  clearInterval( interval );

  btn.remove();

  let correctAnswers  = markAnswers( data );
  let percentage      = ( correctAnswers / data.length * 100 ).toFixed( 2 );  // calculate percentage

  popupInitializer( popup, duration_by_secs, percentage );

  valuesArr.push( 'percentage=' + percentage );
  valuesArr.push( 'duration_by_secs=' + duration_by_secs );

  backBTN();
}

function popupInitializer( popup, duration_by_secs, percentage ) {
  let durationElem = popup.children[0];
  let degreeElem   = popup.children[1];

  let secs  = duration_by_secs % 60;
  let min   = ( duration_by_secs - secs ) / 60;

  durationElem.innerText = `Duration: ${ min < 10 ? '0' + min : min } : ${ secs < 10 ? '0' + secs : secs } `;
  degreeElem.innerText   = `Degree: ${ percentage }%`;

  popup.classList.toggle( 'active' );

  overlayInitializer( popup );
}

function overlayInitializer( popup ) {
  let overlay = document.querySelector( '.overlay' );
  overlay.classList.toggle( 'active' );

  overlay.addEventListener( 'click', ( e ) => {
    overlay.classList.toggle( 'active' );
    popup.classList.toggle( 'active' );
  } );
}

function backBTN() {
  let backBTN = document.querySelector( '.back-btn' );

  backBTN.classList.toggle( 'active' );
}

/**
 * 
 * @param { Array } arryOfObjectsThatContainingQuestionsAndAnswer Array
 * @return { number_of_correct_Answers} int
 */
function markAnswers( arr ) {
  let i = 0;
  arr.map( ( obj ) => {
    let elem = document.querySelector( `input[name='${ obj ['question'].replace( /&#13;&#10;|\s/g, '' ) }']:checked` );

    if ( elem ) {

      if ( elem.value == obj ['answer'].replace( /&#13;&#10;|\s/g, '' ) ) {

        elem.parentElement.classList.add( 'true' );
        i++;
        
      } else {

        elem.parentElement.classList.add( 'false' );

        document
        .querySelector( `input[name='${ obj ['question'].replace( /&#13;&#10;|\s/g, '' ) }'][value='${ obj ['answer'].replace( /&#13;&#10;|\s/g, '' ) }'`)
        .parentElement
        .classList
        .add( 'right' );

      }

    }

  } );

  return i;
}

function sendData( queryStringParams ) {
  sendGetXHR( 'logsAction.php', queryStringParams, ( res ) => {
  } );
}