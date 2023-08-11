<?php

session_start();

$sessionExpiration = 130;
if (isset($_SESSION['username'])) {
    if (isset($_SESSION['lastActivity']) && time() - $_SESSION['lastActivity'] > $sessionExpiration) {
        $_SESSION = array();

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }

        session_unset();
        session_destroy();
        header('Location: adminLogin.php');
        exit;
    }


    $_SESSION['lastActivity'] = time();
} else {
    header('Location: adminLogin.php');
    exit;
}



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
    <style>
        .logout_btn {
            position: absolute;
            top: 110%;
            right: 0;
            background: #fff;
            padding: 0.5rem;

            text-decoration: none;
            font-size: 1.4rem;
            border-radius: 0.5rem;

            transition: 0.1s ease-in-out;

        }

        .logout_btn:hover {
            color: #000;
            transform: scale(1.1);
        }

        .btn_delete,
        .btn_reply {
            display: block;
            text-transform: capitalize;

            padding: 0.2rem;
            border-radius: 0.6rem;

            width: 5rem;
            margin: 1rem;
            text-align: center;
            color: var(--clr-txt);
            transition: 0.1s ease-in-out;

        }
        .btn_delete:hover,
        .btn_reply:hover {
            color: #000;
            transform: scale(1.1);
        }

        .btn_delete {
            background: red;
            color: var(--clr-txt);          

            float: right;
            text-decoration: none;
        }

        .btn_reply {
            text-decoration: none;
            background: green;
        }
    </style>
</head>

<body>
    <div class="contact_us">
        <div class="right_details">
            <div class="title">
                ADMINISTRATOR Info
                <p>
                    NAME : <?php echo ucfirst($_SESSION['adminName']) ?>
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
                    echo "<a class='logout_btn' href='logout.php'>LOG OUT</a>";
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
    function fetchAndRefreshData() {
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