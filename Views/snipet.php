<div class="snipet-container">
    <div class="snipet-data">
      <div>title : <?php echo "{$snipet["title"]}"; ?></div>
      <div>language : <?php echo "{$snipet["lang"]}"; ?></div>
      <div>deleted_at : <?php echo "{$snipet["deleted_at"]}"; ?></div>
    </div>
    <div id="input-container"></div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.32.1/min/vs/loader.min.js"></script>
<script>
  let editor
  let inp = document.getElementById('text');
  require.config({ paths: { 'vs': 'https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.32.1/min/vs' }});
  require(['vs/editor/editor.main'], function() {
  editor = monaco.editor.create(document.getElementById('input-container'), {
        value: '<?php echo str_replace('    ','\t', str_replace(array('<br>', '<br />'), "\\n", htmlspecialchars_decode($snipet["content"],ENT_QUOTES))); ?>',
        language: '<?php echo "{$snipet["lang"]}"; ?>',
        automaticLayout: true,
        readOnly: true,
    });
  });

</script>

