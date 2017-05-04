<?php

session_start();
session_destroy();

echo "Te has deslogueado satisfactoriamente";

header("Refresh:4; url=index.php");


?>