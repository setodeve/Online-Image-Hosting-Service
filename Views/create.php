<?php
use Helpers\DatabaseHelper;

if ($_POST) {
  DatabaseHelper::setSnipet($_POST);
  header("Location: snipets");
  exit;
}
else {

?>

<div class="container">
  <form action="/" method="post">
      <div class="form-group">
        <label for="title">title</label>
        <input type="text" name="title" id="title" value="Hello Javascript">
      </div>
      <div class="form-group">
        <label for="content">content</label>
        <div id="input-container"></div>
        <input required type="hidden" id="text" name="content" value='console.log("hello World!!");'>
      </div>
      <div class="form-group">
        <label for="expiry">date of expiry</label>
        <input type="text" list="expiry-choice" id="expiry" name="expiry" value="1 week"/>
        <datalist id="expiry-choice">
          <option value="10 seconds">10 seconds</option>
          <option value="10 minitues">10 minitues</option>
          <option value="1 hours">1 hours</option>
          <option value="1 day">1 day</option>
          <option value="1 week">1 week</option>
        </datalist>
      </div>
      <div class="form-group">
        <label for="language">language</label>
        <input type="text" list="language" oninput="langChange()" id="language-choice" name="language" value="javascript"/>
        <datalist id="language">
          <option value="javascript">JavaScript</option>
          <option value="typescript">TypeScript</option>
          <option value="ruby">Ruby</option>
          <option value="java">Java</option>
          <option value="cpp">C++</option>
          <option value="python">Python</option>
          <option value="html">HTML</option>
          <option value="css">CSS</option>
          <option value="sql">SQL</option>
          <option value="php">PHP</option>
        </datalist>
      </div>
      <button type="submit" name="submit">Register</button>
  </form>
  <div class="snippet-list">
    <h3>Public Snipet</h3>
    <!-- <h5>Scraping Website<span> - python</span></h5> -->
    <div class="snipets-container">
      <?php foreach ($snipets as $key => $value) { ?>
        <a href="/snipet?id=<?php echo "{$value["id"]}"; ?>" class="snipet-item">
          <h6><?php echo "{$value["title"]}"; ?><span> - <?php echo "{$value["lang"]}"; ?></span></h6>
        </a>
      <?php } ?>
    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.32.1/min/vs/loader.min.js"></script>
<script>
  let editor
  let inp = document.getElementById('text');
  require.config({ paths: { 'vs': 'https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.32.1/min/vs' }});
  require(['vs/editor/editor.main'], function() {
  editor = monaco.editor.create(document.getElementById('input-container'), {
        value: 'console.log("hello World!!");',
        language: 'javascript',
        automaticLayout: true
    });

    editor.onDidChangeModelContent(e => {
      console.log(editor.getValue())
      inp.value = editor.getValue().replace(/\n/g, "<br>").replace(/\t/g, "    ");
    });
  });
//   languageSelector.addEventListener('change', function() {
//   const selectedLanguage = this.value;
//   monaco.editor.setModelLanguage(editor.getModel(), selectedLanguage);
// });
  function langChange() {
      let val = document.getElementById("language-choice").value;
      let opts = document.getElementById('language').children;
      for (let i = 0; i < opts.length; i++) {
        if (opts[i].value === val) {
          editor.updateOptions({
            language: opts[i].value
          });
          break;
        }
      }
    }
</script>

<?php

} // end "else" loop

?>