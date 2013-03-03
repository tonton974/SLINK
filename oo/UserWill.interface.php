<?php 
# UserWill TALK.class.php
# Here is what USER CAN DO in Sl!nk.com.

interface UserWill
{    
    function logHimIn($pseudo,$pwd);
    function logHimOut($pseudo);
    function register($mail, $pseudo, $pwd);
    function already_exist($email, $pseudo);
}