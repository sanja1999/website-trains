<?php
include_once('okvir.php');

Sesija::obrisiSesiju();
//setcookie (session_name(), "", time() - 3600);
header("Location: index.php");
?>