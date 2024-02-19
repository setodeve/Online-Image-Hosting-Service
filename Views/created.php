<?php
  if ($token != null){
?>
  <div class="image-container">
    <h2>Created image</h2>
    <div>
      <h5>you can delete with accessing below URL.</h5>
      <a href="<?php echo "delete?token=" . $token ?>"><?php echo "delete?token=" . $token ?></a>
    </div>
    
  </div>
<?php 
  }else{
    header("Location: no-exist");
  }
?>
