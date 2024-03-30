<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <title>Process</title>
</head>

<body>
    <?php
    include("settings.php");
    include("header.inc");
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
                status ENUM('New','Current','Final'),
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
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
        $_SESSION['postData'] = $_POST;//storing data for other pages
        if ($go_back) {
            array_push($_SESSION['postData'], $error_msg);
            header('Location: apply.php#popup-container');
        }
        $sql = "SELECT MAX(EOInumber) AS max_value FROM EOI";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            // Fetch the result as an associative array
            $row = mysqli_fetch_assoc($result);
        
            // Get the maximum value from the result
            $maxValue = $row['max_value'] + 1;
        }
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        echo"
            <h2 class='section-heading'>Please verify your application</h2>
            <div class='process_table'>
                <table>
                    <tr class='process_row'>
                        <td>EOI number</td>
                        <td>$maxValue</td>
                    </tr>";
                foreach ($_POST as $key => $value) {
                    echo "<tr class='process_row'>
                                <td>$key</td>
                                <td>$value</td>
                            </tr>";
                }
                echo '
                </table>
                <form action="success.php" method="get">
                    <input type="submit" value="submit form" class="button process_button">
                </form>
            </div>';
    }
    include("footer.inc");
    ?>
</body>

</html>