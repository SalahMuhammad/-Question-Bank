/**
 * Send XHR Request To Specific Page
 * 
 * @param { string } pageName ../scripts/php/ pageName
 * @param { string } queryStringParameters 
 * @param { callbackFunction } fn function contains response
 * 
 * @return { void } response
 * 
 */
function sendGetXHR( pageName, queryStringParameters, fn ) {
  let request = new XMLHttpRequest();

  request.onload = function() {
    if ( this.readyState === 4 && this.status === 200 ) {
      if ( typeof fn === 'function' ) fn( this.response );
    }
  }

  request.open( 'GET', '../scripts/php/' + pageName + '?' + queryStringParameters );
  request.send();
}

/**
 * add classes in classes string[] to alert element,
 * after delay 61ms between remove active class and add active class,
 * to take its effect.
 * 
 * @param { Element } alert 
 * @param { string } message alert message
 * @param { ...string } classes classes to add to alert element
 * 
 * @returns { void } void
 * 
 */
function alertInitializer( alert, message, ...classes ) {
  alert.innerText = message;
  alert.classList.remove( 'alert-success', 'alert-danger', 'active' );

  setTimeout(() => {
    classes.forEach( (c) => {
      alert.classList.add( c );
    });
  }, 61);
}

export { sendGetXHR, alertInitializer };