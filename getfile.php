<?php

require('config.php');
require('common.php');
//check if a file ID is set - if not, it means the user hasn't visited download.php and requested a valid file
session_start();

if (!isset($_SESSION['id']))
{
    header('location: index.php');
    exit;
}

//set file info from session

$id = $_SESSION['id'];
$file = rtrim(FILES_FOLDER, '/').'/'.$id;
$name = $_SESSION['name'];
$size = $_SESSION['size'];

if (!file_exists($file))
{
    exit_message('Unexpected error. This upload is in the DB but the file is missing');
}

header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename= '.$name);
header('Content-Length: '.$size);
readfile($file);

session_destroy();
exit;
