<?php
include_once (__DIR__."/../controllers/PersonalCont.php");
include_once (__DIR__."/../models/Personal.php");

$usuario = $_POST ['usuario'];
$password = md5 ( $_POST ['password'] );
$personalCont = new PersonalCont ();
$personal = $personalCont->loguearse ( $usuario, $password );

if ($personal->isEmpty()) {
    session_start();
    $_SESSION ['temiandu'] ['auth'] = md5 ( $personal->getCedula() );
    $_SESSION ['temiandu']['cedula'] = $personal->getCedula();
    $_SESSION ['temiandu']['login'] = $personal->getLogin();
    $_SESSION ['temiandu']['usuario'] = $personal->getNombreCompleto();
    $_SESSION ['temiandu']['codigo_administrador'] = $personal->getTaCodigo();
    header ( 'location:../pages/home.php' );
} else {
    header ( 'location:../pages/login.php' );
}