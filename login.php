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
    require("password.php");
    require_once("settings.php");
    include("header.inc");
    if(isset($_SESSION['user_id']))
        header("Location: index.php");
    ?>
    <div class="background_login">
        <h2>Login page</h2>
    </div>
    <div class="register-container">
        <img src="images/light/logo-with-text.svg" alt="Future Powered Solutions Logo" class="light-mode-element nav-logo">
        <img src="images/dark/logo-with-text.svg" alt="Future Powered Solutions Logo" class="dark-mode-element nav-logo">
        <h2>Login</h2>
        <!-- <div class="form-login"> -->
        <form class="form-register" method="post">
            <div class="input-field">
                <input type="text" name="username" placeholder="" required>
                <span>E-mail or phone number</span>
            </div>
            <div class="input-field">
                <input type="password" name="password" placeholder="" required>
                <span>Password</span>
            </div>

            <?php


            $attributes=[
                "user_id",
                "first_name",
                "last_name",
                "email",
                "phone",
                "role"];
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                //something was posted
                $user_name = $_POST['username'];
                $password = $_POST['password'];

                if (!empty($user_name) && !empty($password)) {

                    //read from database
                    $query = "select * from users_db where email = '$user_name' or phone = '$user_name' limit 1";
                    $result = mysqli_query($conn, $query);
                        if ($result) {

                            $user_data = mysqli_fetch_assoc($result);

                            if (password_verify($password, $user_data['pwd'])) {
                                foreach($attributes as $key)
                                    $_SESSION[$key] = $user_data[$key];
                                header("Location: index.php");
                                die;
                            }
                        }

                    echo "wrong username or password!";
                } else {
                    echo "Please input email or phone number";
                }
            } ?>
            <input type="submit" value="Login" class="button">
            <h5>Don't have an account? <a href="register.php" class="register-login">Sign up here.</a></h5>
        </form>
        <!-- </div> -->
    </div>
    <?php
    include("footer.inc");
    ?>
    </div>
</body>

</html>