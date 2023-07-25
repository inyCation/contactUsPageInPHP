<?php

    include("_con.php");

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
        echo "<a class='btn_delete' href='delete.php?dl=" . $row['sl'] . "'> delete </a>";
        echo '</div>';
    }
    
    mysqli_free_result($result);
    mysqli_close($conn);
    

?>