<?php
require "dbconnection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['note_id'])) {
    $note_id = (int)$_POST['note_id'];

    // Find the file path first
    $stmt = $db->prepare("SELECT file_path FROM upload WHERE notes_id = ?");
    $stmt->bind_param("i", $note_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $file_path = $row['file_path'];

        // Delete the actual file if it exists
        $full_path = realpath(__DIR__ . "/../" . $file_path); 
        if ($full_path && file_exists($full_path)) {
            unlink($full_path); // Delete the physical file
        }

        // Delete the record from DB
        $stmt_delete = $db->prepare("DELETE FROM upload WHERE notes_id = ?");
        $stmt_delete->bind_param("i", $note_id);
        $stmt_delete->execute();
    }

    // Redirect back to the note page
    header("Location: ../pages/task/view_notes.php?notes_id=" . $note_id);
    exit;
} else {
    echo "Invalid request.";
}
?>
