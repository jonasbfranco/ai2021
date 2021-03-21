<?php
session_start();
$x = $_SESSION['teste'] = "A Sessões estão funcionando no servidor!";
header("Location:teste2.php");
?>