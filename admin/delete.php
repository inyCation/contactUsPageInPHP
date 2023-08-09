<?php

session_start();
if (isset($_SESSION['username'])) {

    include("_con.php");
    $del = $_GET['dl'];
    
    $query = "DELETE FROM contact WHERE sl = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $del);
    
    if ($stmt->execute()) {
        header("Location: index.php");
    } else {
        echo "Error deleting record: " . $stmt->error;
    }
    
    $stmt->close();
    $conn->close();
}
else{
    header("Location: adminLogin.php");
    exit;
}



?>
