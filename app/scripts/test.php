<?php
include_once (__DIR__ . "/../config/ConnectionPgJoaju.php");
include_once (__DIR__ . "/../config/ConnectionPgTemiandu.php");
include_once (__DIR__ . "/../controllers/PersonalCont.php");

$conexionJoaju = new ConnectionPgJoaju();
$conexionTemiandu = new ConnectionPgTemiandu();
$personalCont = new PersonalCont();


$conexionJoaju->open();
