<?php

include('config.php');
include('functions.php');

$newContent = false;

$_SESSION['current-textid'] = $_POST['textid'];
$_SESSION['current-location'] = $_POST['contentLocation'];

// echo file_get_contents("edit-form.html");
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  // echo "in post";
  if($newContent) {
    // echo "new content ready";
  }
  else {
    // echo "no new content ready";
  }

}
?>

<!-- <!doctype html> -->
<html>
  <head>
    <!-- <script>
      function testFunction(){
        document.getElementById('textareaId').value = "";
      }
    </script> -->
  </head>
  <body>
    <form method="POST" action="" id='editPanel' class='customEditPanel'>
      <textarea id='textareaId' class='form-control customTextArea' name='new-content' value="<?php echo $_POST['contentHTML'] ?>" autofocus><?php echo $_POST['contentHTML'] ?></textarea>
      <input id='sourceElementID' type='hidden' value="<?php echo $_POST['sourceElementID'] ?>" />
      <input id='currentlyEditing' type='hidden' value="<?php echo $_POST['currentlyEditing'] ?>" />
      <hr>
      <button type='submit' id='saveBtn' class='btn btn-dark customBtn'>Save</button>
      <button type='button' id='clearBtn' class='btn btn-dark customBtn'>Clear</button>
      <button type='button' id='resetBtn' class='btn btn-dark customBtn'>Reset</button>
      <a href="cms.php">
        <button type='button' id='cancelBtn' class='btn btn-dark customBtn'>Cancel</button>
      </a>
    </form>
  </body>
  <!-- ajax script -->
  <script src='js/replace-content-with-form.js'></script>
</html>
