let cookies = document.cookie.split( ';' );
let data    = cookies [0].includes( 'data' ) ? cookies [0].split( '=' ) [1] : cookies [1].split( '=' ) [1];

data = JSON.parse ( decodeURIComponent( data ) );

console.log( data );

let minutes = document.querySelector( '.minutes' );
let seconds = document.querySelector( '.seconds' );
let form    = document.querySelector( 'form' );

let min = minutes.innerText;
let sec = seconds.innerText;
min = 0;
sec = 1;
let handler = setInterval(() => {
  sec--;

  if ( sec < 0 && min >= 1 ) {
    sec = 59;
    min--;
  }

  minutes.innerText = min < 10 ? '0' + min : min;
  seconds.innerText = sec < 10 ? '0' + sec : sec;

  if ( sec <= 0 && min === 0 ) {
    clearInterval( handler );
  }

}, 1000);

setTimeout(() => {
  let q = document.querySelectorAll( `input:checked` );

// console.log( q[0] .name)
// console.log( data [5].question)

// console.log( data )
// console.log( a );
console.log( data[5].question)
  q.forEach( ( elem ) => {
    // console.log( elem.name )
    let obj = data.filter( ( val ) => val.question.replace( /\\r\\n/g, '' ) === elem ['name'] ) [0];

    console.log( obj  )
    // if ( elem.value === obj.answer ) {
    //   elem.classList.add( 'true' );
    // } else {
    //   elem.classList.add( 'false' );
    // }
  });
  // sendGetXHR( 'questionsAction.php', 'e_id=<?= $e_id; ?>', ( res ) => {

  //   let arr = JSON.parse( res );

  //   let a = document.querySelectorAll( `[type=radio]:checked` );
  //   console.log( a[0] )
  //   arr.forEach( ( obj ) => {
  //   });

  //   console.log( 'hi' + "&#160;" );

    

  // } );

}, ( ( parseInt( min ) * 60 + parseInt( sec ) ) * 1000 ) );