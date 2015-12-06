<?php

if (!define('IN_SCRIPT'))
{
    header('location: ../index.php');
    exit;
}

?>

<p class="title"><?php echo htmlentities($name, ENT_QUOTES) ?></p>
<ul id="file-ready">
    <li><span class="tick">&#10003;</span>Available for download</li>
    <li><span class="arrow">&#10148;</span>File size<span class="blue-strong"><?php echo $size; ?>B</span></li>
    <li><span class="arrow">&#10148;</span>Upload date <span class="blue-strong"><?php echo $time; ?></span></li>
</ul>
<form id="download-form" name="download-form" method="post" action="getfile.php">
    <input id="get-file" name="get-file" type="submit" value="click here to download your file">
</form>