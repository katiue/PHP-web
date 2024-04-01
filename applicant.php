<?php
// Include the database connection file
include_once "settings.php";
include("header.inc");
session_start();
function sanitise_input($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if the form is submitted for listing all users_dbs
if(isset($_POST['UPDATE'])){
    $update_value=sanitise_input($_POST['role']);
    $update_application=sanitise_input($_POST['id']);
    $sql= "UPDATE users_db SET role = '$update_value' WHERE user_id = '$update_application' ";
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
    $sql = "SELECT * FROM users_db";
    $result = mysqli_query($conn, $sql);
    // Display the results
    // You can format the results as HTML table or any other format
}

// Check if the form is submitted for listing users_dbs by job reference number
if(isset($_POST['list_by_phone'])) {
    $phone = sanitise_input($_POST['phone']);
    $sql = "SELECT * FROM users_db WHERE phone = '$phone'";
    $result = mysqli_query($conn, $sql);
    // Display the results
}
// Check if the form is submitted for listing users_dbs by job reference number
if(isset($_POST['list_by_email'])) {
    $email = sanitise_input($_POST['email']);
    $sql = "SELECT * FROM users_db WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    // Display the results
}
// Check if the form is submitted for listing users_dbs by job reference number
if(isset($_POST['list_by_role'])) {
    $role = sanitise_input($_POST['role']);
    $sql = "SELECT * FROM users_db WHERE role = '$role'";
    $result = mysqli_query($conn, $sql);
    // Display the results
}

// Check if the form is submitted for listing users_dbs by applicant name
if(isset($_POST['list_by_applicant'])) {
    $first_name = sanitise_input($_POST['first_name']);
    $last_name = sanitise_input($_POST['last_name']);
    $sql = "SELECT * FROM users_db WHERE first_name = '$first_name' OR last_name = '$last_name'";
    $result = mysqli_query($conn, $sql);
    // Display the results
}

// Check if the form is submitted for deleting users_dbs by job reference number
if(isset($_POST['delete_by_user_id'])) {
    $job_del = sanitise_input($_POST['job_del']);
    $sql = "DELETE FROM users_db WHERE user_id = '$job_del'";
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
    <h1>Manage user in this website</h1>
    <div class="manage-options">
        <form method="post" class="manage-form">
            <h2>List all users_dbs</h2>
            <input type="submit" name="list_all" value="List" class="button applicant_button">
        </form>

        <form method="post" class="manage-form" novalidate='novalidate'>
            <h2>List by phone number</h2>
            <div class="input-field">
                <input type="text" id="phone" name="phone" pattern="[0-9\s]{8,12}" required placeholder=" ">
                <span>Phone number</span>
            </div>
            <input type="submit" name="list_by_phone" value="List" class="button applicant_button">
        </form>

        <form method="post" class="manage-form" novalidate='novalidate'>
            <h2>List by e-mail address</h2>
            <div class="input-field">
                <input type="email" id="email" name="email" required placeholder=" ">
                <span>E-mail address</span>
            </div>
            <input type="submit" name="list_by_email" value="List" class="button applicant_button">
        </form>

        <form method="post" class="manage-form" novalidate='novalidate'>
            <h2>List by role</h2>
            <div class="input-field">
                <input type="text" id="role" name="role" pattern="[A-Za-z]" required placeholder=" ">
                <span>Job reference number</span>
            </div>
            <input type="submit" name="list_by_role" value="List" class="button applicant_button">
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
            <input type="submit" name="list_by_applicant" value="List" class="button applicant_button">
        </form>

        <form method="post" class="manage-form" novalidate="novalidate">
            <h2>Delete user</h2>
            <!-- Form for listing all users_dbs -->
            <div class="input-field">
                <input type="text" id="job_del" name="job_del" pattern="[A-Za-z0-9]" required placeholder=" ">
                <span>User id</span>
            </div>
            <input type="submit" name="delete_by_user_id" value="Delete" class="button applicant_button">
        </form>
    </div>
    <div class="EOI-displayer">
        <?php
            if(isset($result)&&!isset($_POST['UPDATE'])){
                echo"
                    <table class='manage-table'>
                    <thead>
                        <tr>
                            <th>User id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Role</th>
                        </tr>
                    </thead>";
            }
            if(isset($result)&&!isset($_POST['UPDATE'])){
                while($application_data = mysqli_fetch_assoc($result)){
                    
                    echo"
                        <tr class='time-table-row'>
                            <td>" . $application_data['user_id'] . " </td>
                            <td>" .$application_data['first_name']. "</td>
                            <td>" .$application_data['last_name']. "</td>
                            <td>" .$application_data['phone'] . "</td>
                            <td>" .$application_data['email']. "</td>
                            <td>
                            <form action='applicant.php' method='POST' class='role_update'>
                                <fieldset class='status-selection'>
                                    <select id='role' name='role'>
                                        <option value='admin'"; if ($application_data['role'] == 'admin') echo 'selected'; echo">admin</option>
                                        <option value='user'"; if ($application_data['role'] == 'user') echo 'selected';echo">user</option>
                                    </select>
                                    <span class='manage-down-arrow'>&#9660;</span>
                                    <input type='hidden' name='id' value="; echo $application_data['user_id'];echo">
                                </fieldset>
                                <input type='submit' name='UPDATE' value='Submit' id='UPDATE' class='button'>
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
