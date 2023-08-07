<?php
if (isset($_POST['query_number'])) {
    $query_id = htmlspecialchars(trim($_POST['query_number']), ENT_QUOTES, 'UTF-8');

    include('./admin/_con.php');
    if (!$conn) {
        die("Connection failed Due to " . mysqli_connect_error());
    }

    $query = "SELECT * FROM `contact` WHERE `contact_query_no` = ?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $query_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            echo "<div class='query_data'>";
            echo "Query ID: " . $row['contact_query_no'] . "<br>";
            echo "Name: " . $row['name'] . "<br>";
            echo "Email: " . $row['email'] . "<br>";
            echo "Message: " . $row['message'] . "<br>";
            echo "REPLY: " . (($row['status']) ? $row['status'] : "NO RESPONSE YET!") . "<br>";
            echo "</div>";
        } else {
            echo "<div class='query_data'";
            echo "No results found for the provided query ID.";
            echo "</div>";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error in query preparation: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEARCH QUERY</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap');

        :root {
            --clr-pri: rgba(141, 67, 216, 0.336);
            --clr-txt: rgb(245, 245, 244);
            --clr-black: rgb(10, 10, 10);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            background: url(./assets/bgImg.jpg);
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            background-clip: content-box;
            font-family: 'Roboto Mono', monospace;
        }

        .banner {
            position: absolute;
            top: 28vh;
            width: 100vw;
            height: 40vh;
            background: var(--clr-pri);

        }

        form {
            position: absolute;
            top: 18vh;
            left: 34vw;
            height: 60vh;
            width: 30vw;

            background-color: var(--clr-txt);
            border-radius: 0.4rem;

            display: flex;
            justify-content: space-evenly;
            align-items: center;
            flex-direction: column;

            letter-spacing: 0.2rem;
            box-shadow: 4px 4px 1rem var(--clr-txt);
        }

        form input {
            background: none;
            outline: none;
            border: none;
        }
        form #query_number{
            width: 19rem;
            border-bottom: 2px solid var(--clr-black);
        }
        .query_data{
            position: absolute;
            top: 34vh;
            right: 8vw;

            height: 25vh;
            width: 20vw;
            color: var(--clr-txt);
            z-index: 44;

        }
        form button{
            background: none;
            border: none;

            letter-spacing: 0.2rem;

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
    </style>
</head>

<body>

    <div class="banner"></div>
    <form action="" method="POST">
        <input type="text" name="query_number" id="query_number" placeholder="ENTER YOUR QUERY NUMBER">
        <button type="submit">SUBMIT</button>
    </form>


</body>

</html>