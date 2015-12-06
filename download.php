<?php

require('config.php');
require('common.php');

//make sure ID is specified
if (!isset($_GET['id']))
{
    exit_message('No file ID specified');
}
//make sure ID is valid alphanumeric
if (!ctype_alnum($_GET['id']))
{


}
$id = $_GET['id'];
require('db.php');

//retrieve file info from DB
$file = $file = mysqli_prepare($db, 'SELECT `name`, `size`, DATE_FORMAT(`time`, \'%d/%m/%Y\'), `deleted` FROM `files` WHERE `id` = ?');
mysqli_stmt_bind_param($file, 's', $id);
mysqli_stmt_execute($file);
++$db_queries;
mysqli_stmt_store_result($file);

if (mysqli_stmt_num_rows($file) === 0)
{
    exit_message('No files found with that ID');
}
mysqli_stmt_bind_result($file, $name, $size, $time, $deleted);
mysqli_stmt_fetch($file);

if ($deleted === '1')
{
    exit_message('This file is has been deleted');
}
mysqli_stmt_close($file);
mysqli_close($db);

require('inc/header.php');

session_start();
$_SESSION['id'] = $id;
$_SESSION['name'] = $name;
$_SESSION['size'] = $size;

#caculate size in easy to read format
$i=0;
while($size >= 1000)
{
    $size = ($size / 1000);
    ++$i;
}
$units = array('', 'K', 'M');
$size = round($size, 1).$units[$i];

require('inc/download.php');
require('inc/footer.php');
