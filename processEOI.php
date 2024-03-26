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
        if (sanitise_input($_POST[$key]) == "") {
            if($key=="other-skills"){
                if (isset($_POST['skills4'])){                
                    array_push($error_msg, "Please tel me $key");
                    $go_back = true;
                }
            }
            else
            {
                array_push($error_msg, "Please tell me $key");
                $go_back = true;
            }
        }
    }
    if(!isset($_POST['gender']))
    {
        array_push($error_msg, "Please tell me your gender");
        $go_back = true;
    }
    $current_time = new DateTime();

    // Input date (e.g., '2023-01-01 12:00:00')
    $input_date = new DateTime($_POST['dob']);

    // Calculate the difference (current time - input date)
    $time_difference = $current_time->diff($input_date);

    // Display the difference
    $age = $time_difference->y;
    $age = intval($age);
    if($age<15 || $age>80)
        $go_back=true;
    if ($go_back) {
        session_start();
        $_SESSION['postData'] = $_POST;
        array_push($_SESSION['postData'],$error_msg);
        header('Location: apply.php');
    }
    $entropy = random_bytes(1); // Adjust the byte length as needed
    $id = uniqid(bin2hex($entropy));
    ?>
</body>

</html>