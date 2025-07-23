<?php
session_start();

if(isset($_SESSION['logged_in']) == FALSE){
        header("Location: ../pages/auth/login.php");
}

$note_id = $_GET['notes_id']

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Queuepal</title>
    <link rel="icon" type="image/x-icon" href="../assets/images/flogo.png">
    <link rel="stylesheet" href="file-upload.css">
</head>
<body>
    <div class="upload-container">
        <h2>Upload a File</h2>
        
        <form method="POST" enctype="multipart/form-data" action="process-upload.php">
            <input type="hidden" name="note_id" value="<?= htmlspecialchars($note_id) ?>">
            
            <div class="drop-zone" id="dropZone">
                <span class="drop-zone-text">Drag & Drop your file here or click to browse</span>
                <input type="file" id="file" name="file" hidden>
            </div>

            <button type="submit">Upload</button>
        </form>

        <a href="../pages/task/view_notes.php?notes_id=<?= htmlspecialchars($note_id) ?>" class="btn-back">
            ⬅ Back to Note
        </a>
    </div>

    <script>
        const dropZone = document.getElementById('dropZone');
        const fileInput = document.getElementById('file');

        dropZone.addEventListener('click', () => fileInput.click());

        dropZone.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropZone.classList.add('drop-zone-hover');
        });

        dropZone.addEventListener('dragleave', () => {
            dropZone.classList.remove('drop-zone-hover');
        });

        dropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropZone.classList.remove('drop-zone-hover');

            if (e.dataTransfer.files.length) {
                fileInput.files = e.dataTransfer.files;

                // Show selected filename
                dropZone.querySelector('.drop-zone-text').textContent = e.dataTransfer.files[0].name;
            }
        });

        fileInput.addEventListener('change', () => {
            if (fileInput.files.length) {
                dropZone.querySelector('.drop-zone-text').textContent = fileInput.files[0].name;
            }
        });
    </script>
</body>

</html>