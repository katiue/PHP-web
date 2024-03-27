<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    function sanitise_input($data)
    {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
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
        header('Location: apply.php');
    }
    $entropy = random_bytes(1); // Adjust the byte length as needed
    $id = uniqid(bin2hex($entropy));
    ?>
</body>

</html>