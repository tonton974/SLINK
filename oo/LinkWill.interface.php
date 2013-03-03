<?php
# Link will WORK.class.php
# Here is what we can do with all-thing LINK-RELATED on Sl!nk.com. 

interface LinkWill
{    
    function generate   ($name,$longUrl,$byUser);
    function getAll     ($sessPSEUDO);
    function redirect   ($getCODE);        // I did not brok my head here.
    function disable    ($getCODE);
    function delete     ($getCODE);
}