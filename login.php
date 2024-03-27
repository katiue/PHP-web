<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <title>Login</title>
</head>

<body>
    <?php
    include("header.inc");
    ?>
    <div id="box">
        <form method="post">
            <div style="font-size: 20px;margin: 10px;color: white;">Login</div>

            <input id="text" type="text" name="user_name"><br><br>
            <input id="text" type="password" name="password"><br><br>

            <?php

            session_start();

            require_once("settings.php");

            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                //something was posted
                $user_name = $_POST['user_name'];
                $password = $_POST['password'];

                if (!empty($user_name) && !empty($password)) {

                    //read from database
                    $query = "select * from EOI where email = '$user_name' or phone = '$user_name' limit 1";
                    $result = mysqli_query($conn, $query);

                    if ($result) {
                        if ($result && mysqli_num_rows($result) > 0) {

                            $user_data = mysqli_fetch_assoc($result);

                            if ($user_data['pwd'] === $password) {

                                $_SESSION['user_id'] = $user_data['EOInumber'];
                                header("Location: index.php");
                                die;
                            }
                        }
                    }

                    echo "wrong username or password!";
                } else {
                    echo "wrong username";
                }
            } ?>
            <input id="button" type="submit" value="Login"><br><br>

            <a href="signup.php">Click to Signup</a><br><br>
        </form>
        <?php
        include("footer.inc");
        ?>
    </div>
</body>

</html>