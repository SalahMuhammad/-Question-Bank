let navbar = document.querySelector( 'nav' );

if ( navbar ) {

  fetch( 'navbar.php' )
  .then( ( res ) => res.text() )
  .then( ( data ) => {

    navbar.innerHTML = data;

    // to fetch sripts from file

    // const parser  = new DOMParser();
    // const doc     = parser.parseFromString( data, 'text/html' );
    // eval( doc.querySelector( 'script' ).textContent );

  });

}