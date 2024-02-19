<?php
use Helpers\DatabaseHelper;

if ($_POST) {
  $imageName = uniqid('',true) .'-'. $_FILES["image"]["name"];
  $imageOriginal = $_FILES["image"]["name"];
  $extension = substr($imageOriginal, strrpos($imageOriginal, '.') + 1);
  $fileSize = filesize($_FILES["image"]["tmp_name"]);

  if ($fileSize > 20971520){
    throw new Exception('Over 20Mbyte');
  }
  if(!in_array($extension, ['jpeg', 'jpg', 'png', 'gif'])) {
    throw new Exception('Not Supporte this extention');
  }
  $token = uniqid('',true);
  move_uploaded_file($_FILES["image"]["tmp_name"],"images/" . $imageName);
  DatabaseHelper::setImage($_POST, $imageName, $token);
  header("Location: created?token=".$token);
  exit;
}
else {

?>
<div class="container">
  <form enctype="multipart/form-data" action="/" method="post" name="changer">
      <div class="form-group">
        <label for="comment">comment</label>
        <input type="text" name="comment" id="comment" value="Hello Javascript">
      </div>
      <div class="form-group">
        <label for="image">image<span class="image-aleart"> support only <strong>png, jpeg, jpg, gif (by 20Mbyte)</strong></span></label>
        <input name="image" accept=".png,.jpeg,.jpg,.gif" id="fileUpload" type="file">
        <div id="image-holder"></div>
      </div>
      <div class="form-group">
        <label for="expiry">date of expiry</label>
        <select id="expiry" id="expiry"  name="expiry" value="10 seconds">
          <option value="10 seconds">10 seconds</option>
          <option value="10 minitues">10 minitues</option>
          <option value="1 hours">1 hours</option>
          <option value="1 day">1 day</option>
          <option value="1 week">1 week</option>
        </select>
      </div>
      <button type="submit" name="submit">Register</button>
  </form>
</div>

<script>
  $("#fileUpload").on('change', function () {
    var imgPath = $(this)[0].value;
    var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();

    if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
        if (typeof (FileReader) != "undefined") {

            var image_holder = $("#image-holder");
            image_holder.empty();

            var reader = new FileReader();
            reader.onload = function (e) {
                $("<img />", {
                    "src": e.target.result,
                        "class": "thumb-image"
                }).appendTo(image_holder);
            }
            image_holder.show();
            reader.readAsDataURL($(this)[0].files[0]);
        } else {
            alert("This browser does not support FileReader.");
        }
    } else {
        alert("Pls select only images");
    }
  });
</script>

<?php

}

?>