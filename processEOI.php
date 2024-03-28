<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <title>Profile</title>
</head>

<body>
    <?php
    include("header.inc");
    include("settings.php");
    function sanitise_input($data)
    {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $checkTableSQL = "SHOW TABLES LIKE 'EOI'";
    $result = mysqli_query($conn, $checkTableSQL);
    if (!$result || $result->num_rows == 0) {
        $createTableSQL = "
            CREATE TABLE EOI(
                user_id VARCHAR(255),
                EOInumber INT AUTO_INCREMENT PRIMARY KEY,
                job_reference VARCHAR(5),
                first_name VARCHAR(20),
                last_name VARCHAR(20),
                dob DATE,
                gender ENUM('Male', 'Female', 'Other'),
                street_address VARCHAR(40),
                suburb VARCHAR(40),
                state ENUM('VIC', 'NSW', 'QLD', 'NT', 'WA', 'SA', 'TAS', 'ACT'),
                postcode CHAR(4),
                email VARCHAR(255),
                phone VARCHAR(20),
                skill1 VARCHAR(255),
                skill2 VARCHAR(255),
                skill3 VARCHAR(255),
                skill4 VARCHAR(255),
                other_skills TEXT,
                FOREIGN KEY (user_id) REFERENCES users_db (user_id) ON DELETE CASCADE
            );";
        if (!mysqli_query($conn,  $createTableSQL)) {
            $checkTableSQL = "SHOW TABLES LIKE 'EOI'";
            $result = mysqli_query($conn, $checkTableSQL);
            if (!$result || $result->num_rows == 0) {
                mysqli_close($conn);
                throw new Exception('Table creation error: ' . mysqli_connect_error());
            }
        }
    }
    $error_msg = array();
    $go_back = false;
    foreach ($_POST as $key => $value) {
        $validating = sanitise_input($_POST[$key]);
        if ($validating == "") {
            if ($key == "other_skills") {
                if (isset($_POST['skills4'])) {
                    array_push($error_msg, "Please tel me other skills");
                    $go_back = true;
                }
            } else {
                array_push($error_msg, "Please tell me $key");
                $go_back = true;
            }
        } else {
            switch ($key) {

                case "job_reference_number":
                    if (!preg_match("/^[a-zA-Z0-9]{5}$/", $validating)) {
                        array_push($error_msg, "Job reference number must contain exactly 5 alphanumeric characters");
                        $go_back = true;
                    }
                    break;

                case "first_name":
                    if (!preg_match("/^[\p{L}\p{M}\s]{1,20}$/u", $validating)) {
                        array_push($error_msg, "First name must be within 20 alpha characters");
                        $go_back = true;
                    }
                    break;

                case "last_name":
                    if (!preg_match("/^[\p{L}\p{M}\s]{1,20}$/u", $validating)) {
                        array_push($error_msg, "Last name must be within 20 alpha characters");
                        $go_back = true;
                    }
                    break;

                case "street_address":
                    if (strlen($validating) > 40) {
                        array_push($error_msg, "Street address must have less than 40 characters");
                        $go_back = true;
                    }
                    break;

                case "suburb":
                    if (strlen($validating) > 40) {
                        array_push($error_msg, "Street address must have less than 40 characters");
                        $go_back = true;
                    }
                    break;

                case "postcode":
                    if (!preg_match("/^[0-9]{4}$/u", $validating)) {
                        array_push($error_msg, "Postcode must have exactly 4 digits");
                        $go_back = true;
                    }
                    break;

                case "email":
                    if (!filter_var($validating, FILTER_VALIDATE_EMAIL)) {
                        array_push($error_msg, "Invalid email");
                        $go_back = true;
                    }
                    break;

                case "phone":
                    if (!preg_match("/^[\d\s]{8,12}$/u", $validating)) {
                        array_push($error_msg, "Phone must be from 8 to 12 numbers");
                        $go_back = true;
                    }
                    break;
            }
        }
    }
    if (!isset($_POST['gender'])) {
        array_push($error_msg, "Please tell me your gender");
        $go_back = true;
    }
    $input_date = new DateTime($_POST['date_of_birth']);
    $current_time = date("Y");
    $year = $input_date->format("Y");
    // Display the difference
    $age = $current_time - $year;
    if ($age < 15 || $age > 80) {
        array_push($error_msg, "Age must be from 15 to 80 years old");
        $go_back = true;
    }
    if ($go_back) {
        session_start();
        $_SESSION['postData'] = $_POST;
        array_push($_SESSION['postData'], $error_msg);
        header('Location: apply.php#popup-container');
    }
    $application = "INSERT INTO EOI(
        user_id,
        job_reference,
        first_name,
        last_name,
        dob,
        gender,
        street_address,
        suburb,
        state,
        postcode,
        email,
        phone,
        other_skills
    )
    VALUES(
        '{$_SESSION['user_id']}',
        '{$_POST['job_reference_number']}',
        '{$_POST['first_name']}',
        '{$_POST['last_name']}',
        '{$_POST['date_of_birth']}',
        '{$_POST['gender']}',
        '{$_POST['street_address']}',
        '{$_POST['suburb']}',
        '{$_POST['state']}',
        '{$_POST['postcode']}',
        '{$_POST['email']}',
        '{$_POST['phone']}',
        '{$_POST['other_skills']}'
    );";
    $result = mysqli_query($conn, $application);
    if (isset($_POST['skills1']))
    {
        $application = "UPDATE EOI
        SET skill1 = '{$_POST['skills1']}'
        WHERE EOInumber = (
            SELECT t.EOInumber
            FROM (SELECT MAX(EOInumber) as EOInumber FROM EOI) AS t /*t is the representation of the value*/
        );";
        $result = mysqli_query($conn, $application);
    }
    if (isset($_POST['skills2']))
    {
        $application = "UPDATE EOI
        SET skill2 = '{$_POST['skills2']}'
        WHERE EOInumber = (
            SELECT t.EOInumber
            FROM (SELECT MAX(EOInumber) as EOInumber FROM EOI) AS t
        );";
        $result = mysqli_query($conn, $application);
    }
    if (isset($_POST['skills3']))
    {
        $application = "UPDATE EOI
        SET skill3 = '{$_POST['skills3']}'
        WHERE EOInumber = (
            SELECT t.EOInumber
            FROM (SELECT MAX(EOInumber) as EOInumber FROM EOI) AS t
        );";
        $result = mysqli_query($conn, $application);
    }
    if (isset($_POST['skills4']))
    {
        $application = "UPDATE EOI
        SET skill4 = '{$_POST['skills4']}'
        WHERE EOInumber = (
            SELECT t.EOInumber
            FROM (SELECT MAX(EOInumber) as EOInumber FROM EOI) AS t
        );";
        $result = mysqli_query($conn, $application);
    }
    ?>
</body>

</html>