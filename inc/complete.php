<?php

if (!define('IN_SCRIPT'))
{
    header('localtion: ../index.php');
    exit;
}

?>

<p class="title">Your file has been uploaded</p>
<ul id="file-ready">
    <li><span class="tick">&#10003;</span>Available for sharing</li>
    <li><span class="arrow">&#10148;</span>File name <span class="blue-strong"><?php echo htmlentities($name, ENT_QUOTES); ?></span></li>
    <li><span class="arrow">&#10148;</span>File size <span class="blue-strong"><?php echo $size; ?>B</span></li>
    <li><span class="arrow">&#10148;</span>Your download URL is below</li>
</ul>
<input id="download-url" value="http://<?php echo rtrim(SIZE_URL, '/'); ?>/download.php?id=<?php echo $id; ?>" readonly />

