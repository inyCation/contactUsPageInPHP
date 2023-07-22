<?php

    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'contactUs';

    $conn = mysqli_connect($host, $username, $password, $database);

    if (!$conn) {
        die('Could not connect to MySQL: ' . mysqli_connect_error());
    }

    $query = "SELECT * FROM contact";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="card">';
        echo '<div class="name"> Name : ' . $row['name'] . '</div>';
        echo '<div class="email"> Email : ' . $row['email'] . '</div>';
        echo '<div class="message"> Message : ' . $row['message'] . '</div>';
        echo '<div class="dt"> Time : ' . $row['dt'] . '</div>';
        echo '</div>';
        echo '<button class="delete_btn" type="submit">Delete</button>';
    }
    
    mysqli_free_result($result);
    mysqli_close($conn);
    

?>