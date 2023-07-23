<?php
session_start();

if (isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'contactUs';

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die('Could not connect to MySQL: ' . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['passwd'];

    $query = "SELECT * FROM admin WHERE name = ? AND passwd = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'ss', $username, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) === 1) {
        $_SESSION['username'] = $username;
        header('Location: index.php');
        exit;
    } else {
        $error = "Invalid username or password.";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap');

        :root {
            --clr-pri: rgba(141, 67, 216, 0.336);
            --clr-txt: rgb(245, 245, 244);
            --clr-black: rgb(10, 10, 10);
        }

        html {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Roboto Mono', monospace;

        }

        body {
            display: grid;
            place-items: center;
            margin-top: 30vh;

            background: url(../assets/bgImg.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-clip: border-box;

        }

        .bg_banner {
            position: absolute;
            top: 22vh;
            width: 100vw;
            height: 40vh;
            background: var(--clr-pri);

        }

        form {
            position: absolute;
            top: 15vh;

            height: 60vh;
            width: 30vw;
            background-color: var(--clr-txt);

            border-radius: 0.4rem;
            display: grid;
            place-items: center;

            letter-spacing: 0.2rem;
        }

        form input {
            background: none;
            outline: none;

            border: none;

        }

        form button {
            background: none;
            border: none;
            letter-spacing: 0.2rem;

            position: absolute;
            margin-top: -5rem;
            margin-left: -4.7rem;

            width: 10rem;
            height: 2.4rem;

            border-top: 2px solid var(--clr-black);
            border-bottom: 2px solid var(--clr-black);
            border-right: 2px solid var(--clr-black);
            border-left: 2px solid var(--clr-black);

        }

        form button:hover {
            background: var(--clr-black);
            color: var(--clr-txt);
        }

        .username {}

        .username input {
            border-bottom: 2px solid var(--clr-black);

        }

        .passwd {
            position: absolute;
            margin-top: -5rem;
        }

        .passwd input {
            border-bottom: 2px solid var(--clr-black);

        }
    </style>
    <title>Login</title>
</head>

<body>
    <div class="bg_banner"></div>
    <form action="" method="post">
        <div class="username">
            <label for="username">USERNAME :</label>
            <input type="text" name="username" id="username" placeholder="Your Username">
        </div>
        <div class="passwd">
            <label for="passwd">PASSWORD :</label>
            <input type="password" name="passwd" id="passwd" placeholder="Your Password">
        </div>
        <?php if (isset($error)) echo $error; ?>
        <div class="submit">
            <button type="submit">LOGIN</button>
        </div>
    </form>
</body>

</html>