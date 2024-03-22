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
        if ($data == "")
            {
                header('Location: apply.php');
            }
        else
            return $data;
    }

    if (isset($_POST['jobReference']))
        $jobReference = sanitise_input($_POST['jobReference']);
    if (isset($_POST['firstName']))
        $jobReference = sanitise_input($_POST['firstName']);
    if (isset($_POST['lastName']))
        $jobReference = sanitise_input($_POST['lastName']);
    if (isset($_POST['dob']))
        $jobReference = sanitise_input($_POST['dob']);
    if (isset($_POST['gender']))
        $jobReference = sanitise_input($_POST['gender']);
    if (isset($_POST['streetAddress']))
        $jobReference = sanitise_input($_POST['streetAddress']);
    if (isset($_POST['suburb']))
        $jobReference = sanitise_input($_POST['suburb']);
    if (isset($_POST['state']))
        $jobReference = sanitise_input($_POST['state']);
    if (isset($_POST['postcode']))
        $jobReference = sanitise_input($_POST['postcode']);
    if (isset($_POST['email']))
        $jobReference = sanitise_input($_POST['email']);
    if (isset($_POST['phone']))
        $jobReference = sanitise_input($_POST['phone']);
    if (isset($_POST['skills1']))
        $jobReference = sanitise_input($_POST['skills1']);
    if (isset($_POST['skills2']))
        $jobReference = sanitise_input($_POST['skills2']);
    if (isset($_POST['skills3']))
        $jobReference = sanitise_input($_POST['skills3']);
    if (isset($_POST['skills4']))
        $jobReference = sanitise_input($_POST['skills4']);
    if (isset($_POST['other-skills']))
        $jobReference = sanitise_input($_POST['other-skills']);
    $entropy = random_bytes(1); // Adjust the byte length as needed
    $id = uniqid(bin2hex($entropy));
    ?>
</body>

</html>