<?php
$data_sent = false;
$blank_found = false;
$invalid_input = false;
$name_lt_30 = false;

if (isset($_POST['name'])) {

    $name = htmlspecialchars(trim($_POST['name']), ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars(trim($_POST['email']), ENT_QUOTES, 'UTF-8');
    $message = htmlspecialchars(trim($_POST['message']), ENT_QUOTES, 'UTF-8');


    if (empty($name) || empty($email) || empty($message)) {
        $blank_found = true;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $invalid_input = true;
    } elseif (strlen($name) > 30) {
        $name_lt_30 = true;
    }

    if (!$blank_found && !$invalid_input && !$name_lt_30) {
        $server = "localhost";
        $username = "root";
        $password = "";
        $database = "contactUs";

        $connection = mysqli_connect($server, $username, $password);

        if (!$connection) {
            die("Connection failed Due to " . mysqli_connect_error());
        }
        $select_db = mysqli_select_db($connection, $database);
        if (!$select_db) {
            die("Failed to select the database: " . mysqli_error($connection));
        }

        $stmt = $connection->prepare("INSERT INTO `contactUs`.`contact` (`name`, `email`, `message`, `dt`) VALUES (?, ?, ?, current_timestamp())");
        $stmt->bind_param("sss", $name, $email, $message);

        if ($stmt->execute()) {
            $data_sent = true;
        }

        $stmt->close();
        $connection->close();
    } else {
        echo "Invalid input or blank fields. Data not sent to the database.";
        exit(); 
    }
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
    <title>CONTACT US PAGE</title>
</head>

<body>
    <div class="contact_us">
        <div class="right_details">
            <div class="logo_callus">
                <h3 class="logo">
                    Call Us
                    <span class="material-symbols-outlined">call</span>
                </h3>
                <div class="detail ">
                    0123456789, 0987654321
                </div>

            </div>
            <div class="location">
                <h3 class="logo">
                    Address
                    <span class="material-symbols-outlined">apartment</span>
                </h3>
                <div class="detail  ">
                    Bihar, (IN) PIN:012345
                </div>

            </div>
            <div class="workingday">
                <h3 class="logo">
                    Working day
                    <span class="material-symbols-outlined">work</span>
                </h3>
                <div class="detail  ">
                    MON-SAT
                </div>

            </div>
        </div>
        <div class="contact_body">
            <h1 class="contact_title">
                Contact Us
            </h1>
            <?php
            if ($data_sent != false) {
                echo "<p class='sent' > MESSAGE SENT </p>";
            } elseif ($blank_found != false) {
                echo "<p class='blank' > PLEASE PROVIDE INPUT </p>";
            } elseif ($name_lt_30 != false) {
                echo "<p class='blank' > PLEASE PUT NAME LESSTHAN 30 CHARs </p>";
            }
            ?>
            <form action="index.php" method="POST">
                <div class="name">
                    <input type="text" name="name" id="name" placeholder="Your Full Name">
                </div>
                <div class="email">
                    <input type="email" name="email" id="email" placeholder="Your Email">
                </div>
                <div class="message">
                    <input type="text" name="message" id="message" placeholder="Your Message">
                </div>
                <button type="submit">Submit</button>
                <a href="./admin/adminLogin.php">ADMIN LOGIN</a>
            </form>
        </div>
    </div>

</body>

</html>
