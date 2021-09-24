<?php

session_start ();
if (! isset ( $_SESSION ['usr'] ['auth'] )) {
  header ( 'location:app/pages/login.php' );
} else {
  header ( 'location:app/pages/home.php' );
}