<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <title>Success</title>
</head>
<body>
    <?php
        include("header.inc");
        include("settings.php");
        if (isset($_SESSION['postData']))
        {
            $postData = $_SESSION['postData']; // Retrieve POST data from session
            unset($_SESSION['postData']);
            $application = "INSERT INTO EOI(
                    user_id,
                    job_reference,
                    first_name,
                    last_name,
                    dob,
                    gender,
                    street_address,
                    suburb,
                    state,
                    postcode,
                    email,
                    phone,
                    other_skills,
                    status
                )
                VALUES(
                    '{$_SESSION['user_id']}',
                    '{$postData['job_reference_number']}',
                    '{$postData['first_name']}',
                    '{$postData['last_name']}',
                    '{$postData['date_of_birth']}',
                    '{$postData['gender']}',
                    '{$postData['street_address']}',
                    '{$postData['suburb']}',
                    '{$postData['state']}',
                    '{$postData['postcode']}',
                    '{$postData['email']}',
                    '{$postData['phone']}',
                    '{$postData['other_skills']}',
                    'New'
                );";
            $result = mysqli_query($conn, $application);
            //update 4 skills
            if (isset($postData['skills1'])) {
                $application = "UPDATE EOI
                    SET skill1 = '{$postData['skills1']}'
                    WHERE EOInumber = (
                        SELECT t.EOInumber
                        FROM (SELECT MAX(EOInumber) as EOInumber FROM EOI) AS t /*t is the representation of the value*/
                    );";
                $result = mysqli_query($conn, $application);
            }
            if (isset($postData['skills2'])) {
                $application = "UPDATE EOI
                    SET skill2 = '{$postData['skills2']}'
                    WHERE EOInumber = (
                        SELECT t.EOInumber
                        FROM (SELECT MAX(EOInumber) as EOInumber FROM EOI) AS t
                    );";
                $result = mysqli_query($conn, $application);
            }
            if (isset($postData['skills3'])) {
                $application = "UPDATE EOI
                    SET skill3 = '{$postData['skills3']}'
                    WHERE EOInumber = (
                        SELECT t.EOInumber
                        FROM (SELECT MAX(EOInumber) as EOInumber FROM EOI) AS t
                    );";
                $result = mysqli_query($conn, $application);
            }
            if (isset($postData['skills4'])) {
                $application = "UPDATE EOI
                    SET skill4 = '{$postData['skills4']}'
                    WHERE EOInumber = (
                        SELECT t.EOInumber
                        FROM (SELECT MAX(EOInumber) as EOInumber FROM EOI) AS t
                    );";
                $result = mysqli_query($conn, $application);
            }
            echo "<h2 class='section-heading'>Your form have been submitted</h2>";
        }
        else
            header("Location:apply.php");
        echo '
        <form action="index.php" method="get" class="success-button">        
            <button type="submit" value="Return to homepage" class="button submit-button">
                <span>Return to homepage
                    <img src="images/light/right-arrow.svg" alt="Right Arrow Icon" class="arrow-icon light-mode-element">
                    <img src="images/dark/right-arrow.svg" alt="Right Arrow Icon" class="arrow-icon dark-mode-element">
                </span>
            </button>
        </form>
        ';
    include("footer.inc");
    ?>
</body>
</html>