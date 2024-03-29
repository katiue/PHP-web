<?php
// Include the database connection file
include_once "settings.php";

// Check if the form is submitted for listing all EOIs
if(isset($_POST['list_all'])) {
    $sql = "SELECT * FROM EOI";
    $result = mysqli_query($conn, $sql);
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
    $job_del = $_POST['job_del'];
    $sql = "DELETE FROM EOI WHERE job_reference = '$job_del'";
    $delete = mysqli_query($conn, $sql);
    // Display success or failure message
}

// Check if the form is submitted for changing the status of an EOI
/*if(isset($_POST['change_status'])) {
    $EOI_id = $_POST['EOI_id'];
    $new_status = $_POST['new_status'];
    $sql = "UPDATE EOI SET status = '$new_status' WHERE EOI_id = '$EOI_id'";
    $result = mysqli_query($conn, $sql);
    // Display success or failure message
}*/
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
    <?php
        include("header.inc");
        include("settings.php");
        if($_SESSION['role']!='admin')
            header("Location:index.php");
    ?>
    <div class="manage-options">
        <form method="post" class="manage-form">
            <h2>List all EOIs</h2>
            <input type="submit" name="list_all" value="List" class="button">
        </form>

        <form method="post" class="manage-form">
            <h2>List by job reference</h2>
            <div class="input-field">
                <input type="text" id="job_reference" name="job_reference" pattern="[A-Za-z0-9]{5}" required placeholder=" ">
                <span>Job reference number</span>
            </div>
            <input type="submit" name="list_by_reference" value="List" class="button">
        </form>

        <form method="post" class="manage-form">
            <h2>List by applicant's name</h2>
            <div class="input-field">
                <input type="text" id="first_name" name="first_name" pattern="[\p{L}\p{Mn}\p{Pd}'\s]{1,20}" required placeholder=" ">
                <span>First name</span>
            </div>
            <div class="input-field" class="manage-form">
                <input type="text" id="last_name" name="last_name" pattern="[\p{L}\p{Mn}\p{Pd}'\s]{1,20}" required placeholder=" ">
                <span>Last name</span>
            </div>
            <input type="submit" name="list_by_applicant" value="List" class="button">
        </form>

        <form method="post" class="manage-form">
            <h2>Delete EOIs</h2>
            <!-- Form for listing all EOIs -->
            <div class="input-field">
                <input type="text" id="job_del" name="job_del" pattern="[A-Za-z0-9]{5}" required placeholder=" ">
                <span>Job reference number</span>
            </div>
            <input type="submit" name="delete_by_reference" value="Delete EOIs" class="button">
        </form>
    </div>
    <?php
        if($result)
            $user_data = mysqli_fetch_assoc($result);
        if(isset($user_data))
        foreach($user_data as $key => $value){
            echo "$key ---- $value";
        }
        include("footer.inc");
    ?>
    <!-- Add more forms for other functionalities (list by reference, list by applicant, delete by reference, change status) -->

</body>
</html>
