<?php

session_start();

$sessionExpiration = 130; 


if (isset($_SESSION['lastActivity']) && time() - $_SESSION['lastActivity'] > $sessionExpiration) {
    
    session_unset();
    session_destroy();
    header('Location: adminLogin.php');
    exit;
}


$_SESSION['lastActivity'] = time();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="./style.css">
    <title>Admin</title>
</head>

<body>
    <div class="contact_us">
        <div class="right_details">
            <div class="title">
                ADMINISTRATOR Info
                <p>
                    NAME : ASHUTOSH KUMAR
                </p>
                <p>
                    POSITION : DATABASE ANALYST
                </p>
                <p>
                    ACCESS LEVEL : 1St 
                </p>
                <p>
                    CURRENT PORJECT : WORKING ON AZURE AS (DBA)
                </p>
                <p>
                    <?php
                        echo "<a>LOG OUT</a>";
                    ?>
                </p>
            </div>
        </div>
        <div class="contact_body">
            <h1 class="contact_title">
                Contact Fetched INFO
            </h1>
            <div class="db_cards" id="db-cards">
                
            </div>
        </div>
    </div>
</body>
<script>
        function fetchAndRefreshData(){
            fetch('fetch_data.php')
                .then(response => response.text())
                .then(data => {
                    document.getElementById('db-cards').innerHTML = data;
                });
        }
        fetchAndRefreshData();
        setInterval(fetchAndRefreshData, 1000);
</script>
</html>


