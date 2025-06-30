<?php 

$filetype = "file";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    // can be page for where the file upload was initiated
    header("Location: file-upload.php");
}

if (empty($_FILES)) {
    // can be page for where the file upload was initiated
    header("Location: file-upload.php");
}

if ($_FILES[$filetype]["error"] !== UPLOAD_ERR_OK) {
    
    switch ($_FILES["file"]["error"]) {
        case UPLOAD_ERR_PARTIAL:
            // popup trigger nalang, pero tsaka na pag gets ko na js non (temp lang muna to)
            header("Location: file-upload.php");
            break;
        case UPLOAD_ERR_NO_FILE:
            header("Location: file-upload.php");
            break;
        case UPLOAD_ERR_FORM_SIZE:
            header("Location: file-upload.php");
            break;
        case UPLOAD_ERR_INI_SIZE:
            header("Location: file-upload.php");
            break;
        case UPLOAD_ERR_NO_TMP_DIR:
            header("Location: file-upload.php");
            break;
        case UPLOAD_ERR_CANT_WRITE:
            header("Location: file-upload.php");
            break;
        default:
            exit("Unknown upload error");
            break;
    }
} 

// file size restriction
if ($_FILES[$filetype]["size"] > 25600000) {
    exit ("Files can be no more than 25 MB");
}

// getting file types
$finfo = new finfo (FILEINFO_MIME_TYPE);
// gets the file type by looking at the tmp_name arrays in $_FILES
$mime_type = $finfo->file($_FILES[$filetype]["tmp_name"]);
// array for valid file types accepted

if ($filetype == "image") {
    $mime_types = ["image/gif", "image/png", "image/jpeg"];
    // checks if file type of uploaded file is found in the array
    if ( ! in_array($mime_type, $mime_types)) {
        exit ("Invalid File Type.");
    }
}
if ($filetype == "file") {
    $mime_types = ["application/vnd.openxmlformats-officedocument.wordprocessingml.document", "application/pdf"];
        // checks if file type of uploaded file is found in the array
        if ( ! in_array($mime_type, $mime_types)) {
            exit ("Invalid File Type.");
    }
}

// moving the uploaded file from the temporary folder to the uploads directory
$pathinfo = pathinfo($_FILES[$filetype]["name"]);
// separates the filename from the extension
$base = $pathinfo["filename"];
// checks for filenames that can be similar to directories as filenames
$base = preg_replace("/[^\w-]/", "_", $base);
// concatenates the extension of the file uploaded to the extracted filename
$filename = $base . "." . $pathinfo["extension"];
// sets the where the uploaded files are stored
$destination = "/xampp/htdocs/task-manager/assets/uploads/" . "$filename";

// cases where duplicated filenames can be accepted
$i = 1;

while (file_exists($destination)) {

    $filename = $base . "($i)." .  $pathinfo["extension"];
    $destination = "/xampp/htdocs/task-manager/assets/uploads/" . $filename;

    $i++;
}

if ( ! move_uploaded_file($_FILES[$filetype]["tmp_name"], $destination)) {
    exit ("File can't be moved.");
}

echo ("File uploaded succesfully");
?>