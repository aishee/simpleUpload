<?php

require('config.php');
require('common.php');

//check if files has been submitted and is an acceptable size
//exit script and inform use if an error occurs

if (empty($_FILES['file-input']))
{
    exit_message('Please select a file to upload');
}

if ($_FILES['file-input']['size'] > MAX_FILE_SIZE)
{
    exit_message('The file you selected is too large');
}

//a file has been selected, and it is within the acceptable size limits
//continue to process
$file = $_FILES['file-input'];
require('db.php');

//create ID and check if it exists  in the DB
do
{
    //create ID
    $id = '';
    $chars = 'ACDEFHJKLMNPQRTUVWXYZabcdefghijkmnopqrstuvwxyz23479';
    for ($i = 0; $i < 8; ++$i)
    {
        $id .=$chars[mt_rand(0,50)];
    }
    //$id is now set to a randomly generated ID
    //query DB to see if ID exists
    $exists = mysqli_prepare($db, 'SELECT 1 FROM `files` WHERE `id` = ?');
    mysqli_stmt_bind_param($exists, "s", $id);
    mysqli_stmt_execute($exists);
    ++db_queries;
    mysqli_stmt_bind_result($exists, $result);
    mysqli_stmt_fetch($exists);
    mysqli_stmt_close($exists);
}
while($result === 1)
    //insert file data into DB
$query = mysqli_prepare($db, 'INSERT INTO `files`(`id`, `name`, `size`, `ip`) VALUES (?, ?, ?, ?)');
mysqli_stmt_bind_param($query, $id, $name, $size, $ip);

    //set data for query
$name = basename($file['name']);
$size = $file['size'];

$ip = $_SERVER['REMOTE_ADDR'];

    //insert data
mysqli_stmt_execute($query);
mysqli_stmt_close($query);

    //increase DB query counter and close connection
++$db_queries;
mysqli_close($db);

    //store file
move_uploaded_file($file['tmp_name'], rtrim(FILES_FOLDER, '/').'/'.$id);
require('inc/header.php');

    //caculate size in easy to read format
$id = 0;
while ($size >= 1000)
{
    $size = ($size / 1000);
    ++$i;
}
$units = array('', 'K', 'M');
$size = round($size, 1).$units[$i];

require('inc/complete.php');
require('inc/footer.php');

?>