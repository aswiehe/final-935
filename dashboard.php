<?php

?>

<!doctype html>
<html>
  <head>
    <!-- Bootstrap core CSS -->
    <link href='vendor/bootstrap/css/bootstrap.min.css' rel='stylesheet'>
    <!-- Custom styles for this template -->
    <link href='css/style.css' rel='stylesheet'>
  </head>
  <body>
    <div id="container">
      <!-- Welcome the user -->
      <!-- <h1>
        <?php echo "Welcome, " . $_SESSION['userID'] . "!" ?>
      </h1> -->
      <span>
        <h3 class="label label-default">
          Mode:
        <h3>
        <ul class="list-inline">
          <li class="modeLi">
            <a href="management.php?action=add">
              <button id='addBtn' type='submit' class='btn btn-dark modeBtn align-middle'>Add</button>
            </a>
          </li>
          <li class="modeLi">
            <a href="management.php?action=edit">
              <button id='editBtn' type='submit' class='btn btn-dark modeBtn align-middle'>Edit</button>
            </a>
          </li>
          <li class="modeLi">
            <a href="index.php">
              <button id='viewBtn' type='submit' class='btn btn-dark modeBtn align-middle'>View</button>
            </a>
          </li>
          <li class="modeLi">
            <button id='saveBtn' type='submit' class='btn btn-dark modeBtn align-middle'>Save</button>
          </li>
        </ul>

      <span>
    </div>
  </body>


</html>
