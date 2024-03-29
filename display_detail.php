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
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        foreach($_POST as $key => $value)
            $application=$key;
        $sql="SELECT * FROM EOI WHERE EOInumber=$application";
        $result=mysqli_query($conn,$sql);
        $user_data = mysqli_fetch_assoc($result);
        echo"
            <h2 class='section-heading'>Application detail</h2>
            <div class='process_table'>
                <table>";
                    foreach ($user_data as $key => $value) {
                        if($key!='status')
                            echo "<tr class='process_row'>
                                        <td>$key</td>
                                        <td>$value</td>
                                    </tr>";
                                }
                    echo"
                </table>";
    }
    else
        header("Location:manage.php")?>
        <form action='manage.php' method='POST' class="status_update">
            <h3>Status</h3>
            <fieldset class='status-selection'>
                <select id='status' name='status'>
                    <option value='New'<?php if ($user_data['status'] == 'New') echo 'selected' ?>>New</option>
                    <option value='Current'<?php if ($user_data['status'] == 'Current') echo 'selected'?>>Current</option>
                    <option value='Final'<?php if ($user_data['status'] == 'Final') echo 'selected';?>>Final</option>
                </select>
                <span class='manage-down-arrow'>&#9660;</span>
                <input type="hidden" name="EOI" value=<?php echo $application;?>>
            </fieldset>
            <input type='submit' name='UPDATE' value="Submit" id="UPDATE" class='button process_button'>
        </form>
    </div>
<?php
    include("footer.inc");
?>
</body>
</html>