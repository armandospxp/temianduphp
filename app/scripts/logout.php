<?php

session_start();
//session_destroy();
unset($_SESSION ['temiandu'] ['auth']);
header("Location: ../pages/login.php");