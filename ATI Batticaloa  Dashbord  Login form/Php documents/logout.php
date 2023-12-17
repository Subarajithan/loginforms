<?php

session_start();


session_destroy();
header('Location: FrontPage.php');
exit();
?>