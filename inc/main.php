<?php

if (!define('IN_SCRIPT')) {
    header('location: ../index.php');
    exit;
}
?>
<p class="title">File hosting made simple</p>
<ul id="whats-allowed">
    <li><span class="tick">&#10003;</span>It's completely free to upload your files!</li>
    <li><span class="tick">&#10003;</span>Upload any file type!</li>
    <li><span class="tick">&#10003;</span>Upload files up to <?php echo $size; ?>B in size!</li>
    <li><span class="tick">&#10003;</span>No registration required</li>
</ul>
<form id="upload-form" name="upload-form" method="post" action="upload.php" enctype="multipart/form-data">
    <input id="file-input" name="file-input" type="file" />
    <input id="select-file" name="select-file" type="button" value="click here to select a file"/>
    <input id="submit-file" type="submit" value="upload your file" />
</form>
