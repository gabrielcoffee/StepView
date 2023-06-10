



<?php 

include_once "PHPconfig.php";

session_start();

if(isset($_POST['logout'])) {
    session_destroy();
    header('Location: ../index.html');
    exit();
}

?>