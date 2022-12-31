<?php 
if ( isset( $_GET ['status'] ) ) {

  $status				= $_GET ['status'];
  $alert_style	= strpos( $status, 'Successfully...' ) ? 'success' : 'danger'; ?>

  <div class="alert-wrapper">
    <div class="alert alert-<?php echo $alert_style ?>"><?php echo $status; ?></div>
  </div>
  
<?php } ?>