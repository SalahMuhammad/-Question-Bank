/** 
 * Displays alert with the given message
 * 
 * @param { string } message
 * @param { status } alert_status According to the alert status background is set
 * 
 * @return { void } void
 */
export function displayAlert( message, status, dir ) {
  let alert           = document.createElement( 'div' );
  let link            = document.createElement( 'link' );

  link.rel  = 'stylesheet';
  link.type = 'text/css';
  link.href = dir + 'styles/alertStyle.css';
  
  alert.classList.add( 
    'alert'
    , status > 0 ? 'alert-success' : 'alert-danger'
  );

  alert.appendChild( document.createTextNode( message ) );

  document.head.appendChild( link );
  document.body.appendChild( alert );
  
  setTimeout( () => {
    removeElements( link, alertContainer, alert );
  }, 3500 );
}

/**
 * This Function Remove The Given Elements
 * 
 * @param { elements } elements
 * 
 * @return { void } void
 */
function removeElements( ...elements ) {
  elements.forEach( element => {
    element.remove();
  });
}