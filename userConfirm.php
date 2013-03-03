<?php

include './oo/UserWill.interface.php' ;



if(isset($_GET['token']) && isset($_GET['email']))
{
    $email =$_GET['email'];
    $token = $_GET['token'];

    $PPDO = new Talk;