<?php

session_start();

unset($_SESSION["uid"]);

unset($_SESSION["name"]);

$BackToMyPage = $_SERVER['HTTP_REFERER'];
if(isset($BackToMyPage)) {
    echo "done";
    header('Location: ../index.php'); // default page
}
   

?>