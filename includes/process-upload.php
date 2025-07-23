<?php 

require "dbconnection.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    // can be page for where the file upload was initiated
    header("Location: file-upload.php");
}

if (empty($_FILES)) {
    // can be page for where the file upload was initiated
    header("Location: file-upload.php");
}

if ($_FILES['file']["error"] !== UPLOAD_ERR_OK) {
    
    switch ($_FILES['file']["error"]) {
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
if ($_FILES['file']["size"] > 25600000) {
    exit ("Files can be no more than 25 MB");
}

$note_id = $_POST['note_id'];


// getting file types
$finfo = new finfo (FILEINFO_MIME_TYPE);
// gets the file type by looking at the tmp_name arrays in $_FILES
$mime_type = $finfo->file($_FILES['file']["tmp_name"]);
// array for valid file types accepted

$mime_types = ["image/gif", "image/png", "image/jpeg"];

if( ! in_array($mime_type, $mime_types)) {
    exit("Invalid file type");
}

// moving the uploaded file from the temporary folder to the uploads directory
$pathinfo = pathinfo($_FILES['file']["name"]);
// separates the filename from the extension
$base = $pathinfo["filename"];
// checks for filenames that can be similar to directories as filenames
$base = preg_replace("/[^\w-]/", "_", $base);
// concatenates the extension of the file uploaded to the extracted filename
$filename = $base . "." . $pathinfo["extension"];
// sets the where the uploaded files are stored
$destination = "/xampp/htdocs/task-manager/assets/uploads/" . "$filename";

// cases where duplicated filenames can be accepted
// $i = 1;

// while (file_exists($destination)) {

$filename = $base . "." . $pathinfo["extension"];
$destination = "../assets/uploads/" . $filename;

//     $i++;
// }

// if (file_exists($destination)) {
//     header("Location:../pages/task/view_notes.php?notes_id=" . $note_id);
// }

if ( ! move_uploaded_file($_FILES['file']["tmp_name"], $destination)) {
    exit ("File can't be moved.");
}

$db_path = "../../assets/uploads/" . $filename;

    $sql_check = "SELECT notes_id FROM upload WHERE notes_id = ?";
    $stmt_check = mysqli_prepare($db, $sql_check);
    mysqli_stmt_bind_param($stmt_check, "s", $note_id);
    mysqli_stmt_execute($stmt_check);
    mysqli_stmt_store_result($stmt_check);

    if (mysqli_stmt_num_rows($stmt_check) > 0) {
        $sql_update = "UPDATE upload SET file_name = ?, file_path = ? WHERE notes_id = ?";
        $stmt_update = mysqli_prepare($db, $sql_update);
        mysqli_stmt_bind_param($stmt_update, "sss", $filename, $db_path, $note_id);
        mysqli_stmt_execute($stmt_update);
    } 
    else {
        $sql_insert = "INSERT INTO upload (file_name, file_path, notes_id) VALUES (?, ?, ?)";
        $stmt_insert = mysqli_prepare($db, $sql_insert);
        mysqli_stmt_bind_param($stmt_insert, "sss", $filename, $db_path, $note_id);
        mysqli_stmt_execute($stmt_insert);
    }


header("Location: ../pages/task/view_notes.php?notes_id=" . $note_id);
exit;

?>