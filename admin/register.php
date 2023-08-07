<?php
$data_sent = false;
$blank_found = false;
$invalid_input = false;
$name_lt_30 = false;




if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    $username = htmlspecialchars(trim($_POST['username']), ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars(trim($_POST['email']), ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars(trim($_POST['password']), ENT_QUOTES, 'UTF-8');
    
    if (empty($username) || empty($email) || empty($password)) {
        $blank_found = true;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $invalid_input = true;
    } elseif (strlen($username) > 30) {
        $name_lt_30 = true;
    }
    
    if (!$blank_found && !$invalid_input && !$name_lt_30) {
        $server = "localhost";
        $user = "root";
        $pass = "";
        $database = "contactUs";
    
        $conn = mysqli_connect($server, $user, $pass);
    
        if (!$conn) {
            die("Connection failed Due to " . mysqli_connect_error());
            exit;
        }
        $select_db = mysqli_select_db($conn, $database);
        if (!$select_db) {
            die("Failed to select the database: " . mysqli_error($conn));
            exit;
        }
    
        $query = "INSERT INTO `admin` (`name`, `email`, `passwd`) VALUES ( ?, ? , ?)";
    
        $stmt = mysqli_prepare($conn,$query);
        if($stmt){
            mysqli_stmt_bind_param($stmt, "sss", $username, $email, $password);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            $data_sent = true;
        }
        else{
            echo "Error in query preparation: " . mysqli_error($conn);
        }
    
        $conn->close();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap');

        :root {
            --clr-pri: rgba(141, 67, 216, 0.336);
            --clr-txt: rgb(245, 245, 244);
            --clr-black: rgb(10, 10, 10);
            --font-family: 'Roboto Mono', monospace;

        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            background-image: url(../assets/bgImg.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-clip: content-box;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;

            height: 100vh;
            font-family: var(--font-family);
        }

        .main_container {
            height: 45vh;
            width: 100vw;
            background: var(--clr-pri);
        }

        .main_container .card {
            position: absolute;
            left: 30vw;
            top: 20vh;

            width: 40vw;
            height: 65vh;

            background-color: var(--clr-txt);
            border-radius: 0.6rem;
            box-shadow: 3px 3px 1rem var(--clr-txt);

            display: flex;
            justify-content: space-evenly;
            align-items: center;
            flex-direction: column;
        }

        .main_container .card form {
            display: flex;
            justify-content: space-evenly;
            align-items: center;

            flex-direction: column;
        }

        .main_container .card form .input_field {
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            height: 30vh;

            flex-direction: column;
        }

        .main_container .card form .input_field input {
            width: 25vw;
            border: none;
            background: none;
            outline: none;

            border-bottom: 2px solid var(--clr-black);

        }

        .main_container .card form>input {
            cursor: pointer;
            border: none;
            background: none;
            outline: none;

            font-size: 1.3rem;
            width: 8rem;
            height: 2.5rem;

            border-bottom: 2px solid var(--clr-black);
            border-top: 2px solid var(--clr-black);
            border-left: 2px solid var(--clr-black);
            border-right: 2px solid var(--clr-black);
        }

        .main_container .card form>input:hover {
            color: var(--clr-txt);
            background: var(--clr-black);
        }
    </style>
</head>

<body>

    <div class="main_container">

        <div class="card">
            <h2 class="card_title">
                REGISTER HERE AS ADMIN
            </h2>
            <?php
            if ($data_sent != false) {
                echo "<p class='sent' > REGISTRATION SUCCESS </p>";
            } elseif ($blank_found != false) {
                echo "<p class='blank' > PLEASE PROVIDE INPUT </p>";
            } elseif ($name_lt_30 != false) {
                echo "<p class='blank' > PLEASE PUT NAME LESSTHAN 30 CHARs </p>";
            }
            ?>
            <form action="" method="POST">
                <div class="input_field">
                    <input type="text" name="username" id="username" placeholder="Your Username" autocomplete="off" >
                    <input type="email" name="email" id="email" placeholder="Your Email" autocomplete="off">
                    <input type="password" name="password" id="password" placeholder="Your Password" autocomplete="off">
                </div>
                <input type="submit" value="submit">
                <a href="./adminLogin.php"> LOGIN HERE</a>
            </form>
        </div>
        
    </div>

</body>

</html>