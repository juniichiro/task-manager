<?php
    $filetype = "image";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data" action="process-upload.php">
        <label for="file">Upload File</label>
        <input type="file" id = "file" name = <?php echo $filetype ?> >
        <button>Upload</button>
    </form>
</body>
</html>