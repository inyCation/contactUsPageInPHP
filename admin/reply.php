<?php

$reply_sent = false;

session_start();

if (isset($_SESSION['username'])) {
    include("_con.php");
    if (!$conn) {
        die('Could not connect to MySQL: ' . mysqli_connect_error());
    }

    $sl = (int)$_GET['reply'];

    $query = "SELECT message FROM `contact` WHERE sl=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $sl);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $message = null;

    if ($row = mysqli_fetch_assoc($result)) {
        $message = $row['message'];
    }
    mysqli_stmt_close($stmt);


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $reply = htmlspecialchars(trim($_POST['reply']), ENT_QUOTES, 'UTF-8');

        $reply_query = "UPDATE `contact` SET `status` = ? WHERE `contact`.`sl` = ?";

        $reply_stmt = mysqli_prepare($conn, $reply_query);
        if ($reply_query) {
            mysqli_stmt_bind_param($reply_stmt, "ss", $reply, $sl);
            mysqli_stmt_execute($reply_stmt);
            $reply_sent = true;
        }
        mysqli_stmt_close($reply_stmt);
    }
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
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap');

        :root {
            --clr-pri: rgba(141, 67, 216, 0.336);
            --clr-txt: rgb(245, 245, 244);
            --clr-black: rgb(10, 10, 10);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: url(../assets/bgImg.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-clip: border-box;
            font-family: 'Roboto Mono', monospace;


        }

        .banner {
            position: absolute;
            top: 30vh;

            height: 40vh;
            width: 100vw;
            background: var(--clr-pri);

        }

        .card {
            position: absolute;
            top: 25vh;
            left: 34vw;

            background: var(--clr-txt);
            width: 35vw;
            height: 50vh;

            border-radius: 0.4rem;
            box-shadow: 2px 2px 0.5rem var(--clr-txt);

            display: flex;
            justify-content: space-evenly;
            align-items: center;
            flex-direction: column;
        }

        .card form {
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-direction: column;
            height: 7rem;
        }

        .card form input {
            width: 19rem;

            outline: none;
            border: none;
            background: none;

            border-bottom: 2px solid var(--clr-black);
            font-size: 1.1rem;

        }

        .card form button {
            outline: none;
            border: none;
            background: none;

            border-bottom: 2px solid var(--clr-black);
            border-top: 2px solid var(--clr-black);
            border-right: 2px solid var(--clr-black);
            border-left: 2px solid var(--clr-black);

            letter-spacing: 0.2rem;
            font-size: 1.1rem;

            width: 6rem;
            height: 2.4rem;
        }

        .card form button:hover {
            background-color: var(--clr-black);
            color: var(--clr-txt);
        }
    </style>

</head>

<body>
    <div class="banner"></div>
    <div class="card">
        <div class="user_query">
            <?php
            if ($message) {
                echo "USER QUERY: " . htmlspecialchars($message);
            } else {
                echo "No message found.";
            }
            ?>
        </div>
        <form action="" method="post">
            <?php
            if ($reply_sent != false) {
                echo "REPLY SENT";
            }
            ?>
            <input type="text" name="reply" id="reply" placeholder="Response">
            <button type="submit">SUBMIT</button>
        </form>
    </div>
</body>

</html>