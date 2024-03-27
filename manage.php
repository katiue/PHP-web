<?php
// Include the database connection file
include_once "settings.php";

// Check if the form is submitted for listing all EOIs
if(isset($_POST['list_all'])) {
    $sql = "SELECT * FROM EOI";
    $result = mysqli_query($conn, $sql);
    $user_data = mysqli_fetch_assoc($result);
    echo $user_data['dob'];
    // Display the results
    // You can format the results as HTML table or any other format
}

// Check if the form is submitted for listing EOIs by job reference number
if(isset($_POST['list_by_reference'])) {
    $job_reference = $_POST['job_reference'];
    $sql = "SELECT * FROM EOI WHERE job_reference = '$job_reference'";
    $result = mysqli_query($conn, $sql);
    // Display the results
}

// Check if the form is submitted for listing EOIs by applicant name
if(isset($_POST['list_by_applicant'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $sql = "SELECT * FROM EOI WHERE first_name = '$first_name' OR last_name = '$last_name'";
    $result = mysqli_query($conn, $sql);
    // Display the results
}

// Check if the form is submitted for deleting EOIs by job reference number
if(isset($_POST['delete_by_reference'])) {
    $job_reference = $_POST['job_reference'];
    $sql = "DELETE FROM EOI WHERE job_reference = '$job_reference'";
    $result = mysqli_query($conn, $sql);
    // Display success or failure message
}

// Check if the form is submitted for changing the status of an EOI
if(isset($_POST['change_status'])) {
    $EOI_id = $_POST['EOI_id'];
    $new_status = $_POST['new_status'];
    $sql = "UPDATE EOI SET status = '$new_status' WHERE EOI_id = '$EOI_id'";
    $result = mysqli_query($conn, $sql);
    // Display success or failure message
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <title>Manage</title>
</head>
<body>
    <h2>List all EOIs</h2>
    <form method="post">
        <!-- Form for listing all EOIs -->
        <input type="submit" name="list_all" value="List All EOIs">
    </form>

    <!-- Add more forms for other functionalities (list by reference, list by applicant, delete by reference, change status) -->

</body>
</html>
