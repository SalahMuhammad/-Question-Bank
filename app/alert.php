<?php 
if ( isset( $_GET ['status'] ) && strpos( $_GET ['status'], 'ailed To' ) ) {
  $status				= $_GET ['status'];
  // $alert_style	= strpos( $status, 'Successfully...' ) ? 'success' : 'danger'; 
  $alert_style	= 'danger';?>

  <div class="alert-wrapper">
    <div class="alert alert-<?= $alert_style ?>"><?= $status; ?></div>
  </div>
  
<?php } ?>