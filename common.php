<?php

define('IN_SCRIPT', true);
function exit_message($message)
{
    require('inc/header.php');
    require('inc/message.php');
    require('inc/footer.php');
    exit;
}