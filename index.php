<?php

require_once'upload.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>
</head>
<body>


<form method="post" enctype="multipart/form-data">
    <label for="firstname">Firstname</label>
    <input type="text" name="firstname" placeholder="Firstname">
    <label for="lastname">Lastname</label>
    <input type="text" name="lastname" placeholder="Lastname">
    <label for="age">Age</label>
    <input type="text" name="age" placeholder="Age">
    <label for="imageUpload">Upload an profile image</label>    
    <input type="file" name="avatar" id="imageUpload" />
    <button name="send">Send</button>
</form>



</body>
</html>