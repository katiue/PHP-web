<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <title>Register</title>
</head>

<body>
    <?php
    require_once("settings.php");
    require_once("header.inc");
    if(isset($_SESSION['user_id']))
        header("Location: login.php");
    ?>
    <?php
    function isClientNameExists($clientName, $conn)
    {
        $sql = "SELECT * FROM users_db WHERE phone = '$clientName' OR email = '$clientName'";
        $result = mysqli_query($conn, $sql);
        return $result->num_rows > 0;
    }
    function sanitise_input($data)
    {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    try {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $checkTableSQL = "SHOW TABLES LIKE 'users_db'";
            $result = mysqli_query($conn, $checkTableSQL);

            if (!$result || $result->num_rows == 0) {
                $createTableSQL = "
                        CREATE TABLE users_db(
                            user_id VARCHAR(255) PRIMARY KEY,
                            first_name VARCHAR(255) NOT NULL,
                            last_name VARCHAR(255) NOT NULL,
                            phone VARCHAR(255),
                            email VARCHAR(255),
                            role VARCHAR(255) NOT NULL,
                            pwd VARCHAR(255) NOT NULL
                        )";
                if (!mysqli_query($conn,  $createTableSQL)) {
                    $checkTableSQL = "SHOW TABLES LIKE 'users_db'";
                    $result = mysqli_query($conn, $checkTableSQL);
                    if (!$result || $result->num_rows == 0) {
                        mysqli_close($conn);
                        throw new Exception('Table creation error: ' . mysqli_connect_error());
                    }
                }            
            }
            $role = 'user';
            $sql = "SELECT * from users_db";

            if ($result = mysqli_query($conn, $sql))
                if(mysqli_num_rows($result) == 0)
                    $role = 'admin';

            if (!isset($_POST['Re_username']))
                throw new Exception("Please enter e-mail or phone number");
            if (!isset($_POST['Fi_name']))
                throw new Exception("Please enter first name");
            if (!isset($_POST['La_name']))
                throw new Exception("Please enter last name");
            if (!isset($_POST['Re_password']))
                throw new Exception("Please enter password");
            if (!isset($_POST['Co_password']))
                throw new Exception("Please enter re-password");

            $username = sanitise_input($_POST["Re_username"]);
            $fi_name = sanitise_input($_POST["Fi_name"]);
            $la_name = sanitise_input($_POST["La_name"]);
            $password = sanitise_input($_POST["Re_password"]);
            $re_password = sanitise_input($_POST["Co_password"]);

            if ($username == "")
                throw new Exception("Please enter e-mail or phone number");
            if ($fi_name == "")
                throw new Exception("Please enter first name");
            if ($la_name == "")
                throw new Exception("Please enter last name");
            if ($password == "")
                throw new Exception("Please enter password");
            if ($re_password == "")
                throw new Exception("Please enter re-password");

            if (!filter_var($username, FILTER_VALIDATE_EMAIL) && !preg_match("/^[\d\s]{8,12}$/u", $username))
                throw new Exception("invalid e-mail or phone number.");
            if (isClientNameExists($username, $conn))
                throw new Exception("e-mail or phone number already exists.");

            if ($password !== $re_password)
                throw new Exception("Passwords and confirm password do not match!");

            $hasedPassword = password_hash($password, PASSWORD_BCRYPT);


            $entropy = random_bytes(1); // Adjust the byte length as needed
            $id = uniqid(bin2hex($entropy));

            if (filter_var($username, FILTER_VALIDATE_EMAIL))
                $query = "INSERT INTO users_db (user_id,
                    first_name,
                    last_name, 
                    email,
                    role,
                    pwd
                    ) 
                    VALUES ('$id',
                    '$fi_name',
                    '$la_name',
                    '$username',
                    '$role',
                    '$hasedPassword');";
            else
                $query = "INSERT INTO users_db (user_id,
                    first_name,
                    last_name, 
                    phone,
                    role,
                    pwd
                    ) 
                    VALUES ('$id',
                    '$fi_name',
                    '$la_name',
                    '$username',
                    '$role',
                    '$hasedPassword');";
            $result = mysqli_query($conn, $query);
            if (!$result) {
                echo "<p>Something is wrong with ", $query, "</p>";
            } else {
                header("Location: login.php");
            }
            $_SESSION['register_error'] = "";
            $conn->close();
        }
    } catch (Exception $error_msg) {
        $_SESSION['register_error'] = $error_msg->getMessage();
    }
    ?>
    <div class="bg-register">
        <h2>Register page</h2>
    </div>
    <div class="register-container">
        <img src="images/light/logo-with-text.svg" alt="Future Powered Solutions Logo" class="light-mode-element nav-logo">
        <img src="images/dark/logo-with-text.svg" alt="Future Powered Solutions Logo" class="dark-mode-element nav-logo">
        <h2>Sign up</h2>
        <!-- <div class="form-login"> -->
        <form class="form-register" method="post" novalidate="novalidate">
            <div class="input-field">
                <input type="text" name="Re_username" placeholder="" required>
                <span>Phone/E-mail</span>
            </div>
            <div class="input-field">
                <input type="text" name="Fi_name" placeholder="" required>
                <span>First name</span>
            </div>
            <div class="input-field">
                <input type="text" name="La_name" placeholder="" required>
                <span>Last name</span>
            </div>
            <div class="input-field">
                <input type="password" name="Re_password" placeholder="" required>
                <span>Password</span>
            </div>
            <div class="input-field">
                <input type="password" name="Co_password" placeholder="" required>
                <span>Confirm password</span>
            </div>
            <?php if (isset($_SESSION['register_error'])) : ?>
                <h5>
                    <?php echo $_SESSION['register_error']; ?>
                </h5>
                <?php $_SESSION['register_error'] = ""; ?>
            <?php endif; ?>
            <input type="submit" value="Sign Up" class="button">
            <h5>Have an account already? <a href="login.php" class="register-login">Login here.</a></h5>
        </form>
        <!-- </div> -->
    </div>
    <?php
    require_once("footer.inc");
    ?>
</body>

</html>