<div class="images-container">
  <?php if (empty($images)){ 
    header("Location: no-exist");
    exit;
  }?>
  <?php foreach ($images as $key => $value) { ?>
    <a href="/image?name=<?php echo "{$value["img"]}"; ?>" class="image-item">
      <img class="image-single" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode(file_get_contents("Images/" . $value["img"]))?>" /> 
      <div><?php echo "{$value["comment"]}"; ?></div>
    </a>
  <?php } ?>
</div>