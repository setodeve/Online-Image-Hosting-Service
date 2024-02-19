<div class="image-container">
    <div class="image-data">
      <img class="image-detail" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode(file_get_contents("Images/" . $image["img"]))?>" /> 
      <div><?php echo "{$image["comment"]}"; ?></div>
      <div>deleted_at : <?php echo "{$image["deleted_at"]}"; ?></div>
    </div>
</div>


