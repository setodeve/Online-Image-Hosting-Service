<div class="snipets-container">
  <?php foreach ($snipets as $key => $value) { ?>
    <a href="/snipet?id=<?php echo "{$value["id"]}"; ?>" class="snipet-item">
      <div>title : <?php echo "{$value["title"]}"; ?></div>
      <div>language : <?php echo "{$value["lang"]}"; ?></div>
      <div>deleted_at : <?php echo "{$value["deleted_at"]}"; ?></div>
    </a>
  <?php } ?>
</div>
