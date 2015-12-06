<?php

if (!define('IN_SCRIPT'))
{
    header('location: ../index.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo SITE_NAME; ?></title>
    <link href="css/u.css" rel="stylesheet" type="text/css" />
    <meta charset="UTF-8">
</head>
<body>
<div id="header">
    <a href="http://<?php echo SITE_URL; ?><?php echo SITE_NAME; ?>"></a>
</div>
<div id="main">
</body>
</html>
