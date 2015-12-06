<?php

require('config.php');
require('common.php');

require('inc/header.php');

$i = 0;
$max_size = MAX_FILE_SIZE;
while ($max_size >= 1000)
{
    $max_size = ($max_size / 1000);
    ++$i;
}
$units = array('', 'K', 'M');
$size = round($max_size, 1).$units[$i];

require('inc/main.php');
require('inc/footer.php');
