<?php 

# Here is what USER CAN DO in Sl!nk.com.

interface UserWill
{    
    function logHimIn($pseudo,$pwd);
    function logHimOut();
    function register($mail, $pseudo, $pwd);
}

?>