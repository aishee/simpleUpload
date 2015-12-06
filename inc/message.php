<?php

if (!define('IN_SCRIPT'))
{
    header('location: ../index.php');
    exit;
}
?>

<p><?php echo $message; ?></p>
<p><a href="index.php">Return to the home screen</a></p>
