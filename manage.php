<?php
// Include the database connection file
include_once "settings.php";
include("header.inc");
function sanitise_input($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if the form is submitted for listing all EOIs
if(isset($_POST['UPDATE'])){
    $update_value=sanitise_input($_POST['status']);
    $update_application=sanitise_input($_POST['EOI']);
    $sql= "UPDATE EOI SET status = '$update_value' WHERE EOInumber = $update_application";
    $result = mysqli_query($conn, $sql);

    $checkTableSQL = "SHOW TABLES LIKE 'notification'";
    $result = mysqli_query($conn, $checkTableSQL);

    if (!$result || $result->num_rows == 0) {
        $createTableSQL = "
                CREATE TABLE notification(
                    sender VARCHAR(255) NOT NULL,
                    receiver VARCHAR(255) NOT NULL,
                    noti TEXT,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
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
    
    $sql= "SELECT * FROM EOI WHERE EOInumber = $update_application";
    $result = mysqli_query($conn, $sql);

    while($row=mysqli_fetch_assoc($result))
        $receiver=$row['user_id'];
    $sender=$_SESSION['user_id'];
    $sql="INSERT INTO notification(
        sender,
        receiver,
        noti
    )
    VALUE(
        '{$sender}',
        '{$receiver}',
        'Status of your form have been changed'
    );";
    $result = mysqli_query($conn, $sql);
}
if(isset($_POST['list_all'])) {
    $sql = "SELECT * FROM EOI";
    $result = mysqli_query($conn, $sql);
    // Display the results
    // You can format the results as HTML table or any other format
}

// Check if the form is submitted for listing EOIs by job reference number
if(isset($_POST['list_by_reference'])) {
    $job_reference = sanitise_input($_POST['job_reference']);
    $sql = "SELECT * FROM EOI WHERE job_reference = '$job_reference'";
    $result = mysqli_query($conn, $sql);
    // Display the results
}

// Check if the form is submitted for listing EOIs by applicant name
if(isset($_POST['list_by_applicant'])) {
    $first_name = sanitise_input($_POST['first_name']);
    $last_name = sanitise_input($_POST['last_name']);
    $sql = "SELECT * FROM EOI WHERE first_name = '$first_name' OR last_name = '$last_name'";
    $result = mysqli_query($conn, $sql);
    // Display the results
}

// Check if the form is submitted for deleting EOIs by job reference number
if(isset($_POST['delete_by_reference'])) {
    $job_del = sanitise_input($_POST['job_del']);
    $sql = "DELETE FROM EOI WHERE job_reference = '$job_del'";
    $delete = mysqli_query($conn, $sql);
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
    <?php
        if($_SESSION['role']!='admin')
            header("Location:index.php");
    ?>
    <h1>Manage form in this website</h1>
    <div class="manage-options">
        <form method="post" class="manage-form">
            <h2>List all EOIs</h2>
            <input type="submit" name="list_all" value="List" class="button">
        </form>

        <form method="post" class="manage-form" novalidate='novalidate'>
            <h2>List by job reference</h2>
            <div class="input-field">
                <input type="text" id="job_reference" name="job_reference" pattern="[A-Za-z0-9]{5}" required placeholder=" ">
                <span>Job reference number</span>
            </div>
            <input type="submit" name="list_by_reference" value="List" class="button">
        </form>

        <form method="post" class="manage-form" novalidate='novalidate'>
            <h2>List by applicant's name</h2>
            <div class="input-field">
                <input type="text" id="first_name" name="first_name" pattern="[\p{L}\p{Mn}\p{Pd}'\s]{1,20}" required placeholder=" ">
                <span>First name</span>
            </div>
            <div class="input-field">
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
    <div class="EOI-displayer">
        <?php
            if(isset($result)&&!isset($_POST['UPDATE'])){
                echo"
                    <table class='manage-table'>
                    <thead>
                        <tr>
                            <th>EOI number</th>
                            <th>Job reference number</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Status</th>
                            <th>Detail</th>
                        </tr>
                    </thead>";
            }
            if(isset($result)&&!isset($_POST['UPDATE'])){
                while($application_data = mysqli_fetch_assoc($result)){
                    
                    echo"
                        <tr class='time-table-row'>
                            <td>" . $application_data['EOInumber'] . " </td>
                            <td>" .$application_data['job_reference'] . "</td>
                            <td>" .$application_data['first_name']. "</td>
                            <td>" .$application_data['last_name']. "</td>
                            <td>" .$application_data['status']. "</td>
                            <td>
                                <form action='display_detail.php' method='POST' class='manage-view'> 
                                    <input type='submit' name=".$application_data['EOInumber']." value='view' id=".$application_data['EOInumber']." class='form_reveal_button'>
                                </form>
                            </td>
                        </tr>";
                    }
                }
            echo'
            </table>
            ';
        ?>
    </div>
    <?php
        include("footer.inc");
    ?>
    <!-- Add more forms for other functionalities (list by reference, list by applicant, delete by reference, change status) -->

</body>
</html>
