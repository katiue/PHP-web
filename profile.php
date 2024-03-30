<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <title>Home</title>
</head>
</head>
<body>
    <?php
        require_once('header.inc');
        require_once('settings.php');
        //getting user's id to display
        $user_id=$_SESSION['user_id'];
        $sql = "SELECT * FROM EOI WHERE user_id='$user_id'";
        $result = mysqli_query($conn, $sql)
    ?>
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
        require_once('footer.inc');
    ?>
</body>
</html>