<?php

if (isset($_SESSION[''])) {
  echo '<form action="index.php';
  if(isset($_GET['page'])) echo "?page=".$_GET['page'];
  echo '" class="input group" method="post">';
  echo "<h4>Привет,".$_SESSION ['']. "</h4>";
  echo '<input type="submit" name="exit" value="Выйти" class="btn btn-secondary">';
  echo "</form>";

// разлогивание 

if (isset($_POST['exit'])) {
  unset ($_SESSION['ruser']);
  unset ($_SESSION['radmin']);


}


} else {

  echo '<form action="index.php';
  if(isset($_GET['page'])) echo "?page=".$_GET['page'];
  echo '" class=" input group" method="post">';
 

  echo '<input type="text" name="login" placeholder="login">';
  echo '<input type="password" name="pass" placeholder="password">';
  echo '<input type="submit" name="auth" value="Login" class="btn btn-info">';
  echo '</form>';
  // обработчик логина 

  if(isset($_POST['auth']) AND $_POST['pass'] !== '' AND $_POST['login'] !== '') {

    login($_POST['login'], $_POST['pass']);
    echo '<script>window.location.reload()</script>';
    }
  }

