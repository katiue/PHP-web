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
    <div class="background_login">
        <h2>Login page</h2>
    </div>
    <div class="register-container">
        <img src="images/light/logo-with-text.svg" alt="Future Powered Solutions Logo" class="light-mode-element nav-logo">
        <img src="images/dark/logo-with-text.svg" alt="Future Powered Solutions Logo" class="dark-mode-element nav-logo">
        <h2>Sign up</h2>
        <!-- <div class="form-login"> -->
        <form class="form-register" method="post">
            <div class="input-field">
                <input type="text" name="username" placeholder="" required>
                <span>Username</span>
            </div>
            <div class="input-field">
                <input type="password" name="password" placeholder="" required>
                <span>Password</span>
            </div>

            <?php

            require_once("settings.php");

            $attributes=[
                "EOInumber",
                "Job_reference_number",
                "First_name",
                "Last_name",
                "dob",
                "gender",
                "street_address",
                "suburb_town",
                "state",
                "postcode",
                "email",
                "phone",
                "skill1",
                "skill2",
                "skill3",
                "skill4",
                "other_skill",
                "Status",
                "role",
                "pwd"];
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                //something was posted
                $user_name = $_POST['username'];
                $password = $_POST['password'];

                if (!empty($user_name) && !empty($password)) {

                    //read from database
                    $query = "select * from EOI where email = '$user_name' or phone = '$user_name' limit 1";
                    $result = mysqli_query($conn, $query);
                        if ($result && mysqli_num_rows($result) > 0) {

                            $user_data = mysqli_fetch_assoc($result);

                            if (password_verify($password, $user_data['pwd'])) {
                                $_SESSION['user_id'] = $user_data['EOInumber'];
                                header("Location: index.php");
                                die;
                            }
                        }

                    echo "wrong username or password!";
                } else {
                    echo "Please input email or phone number";
                }
            } ?>
            <input type="submit" value="Sign Up" class="button">
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