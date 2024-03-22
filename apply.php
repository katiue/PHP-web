<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <title>Apply</title>
</head>

<body>
    <?php
        include("header.inc");
    ?>
    <main class="form-and-title-container">
        <h1 class="apply-title">Interested in our company?</h1>
        <form action="https://mercury.swin.edu.au/it000000/formtest.php" method="post" id="jobApplicationForm"
            onsubmit="return validateForm()">
            <h2>Job Application Form</h2>
            <!-- Job Information -->
            <div class="input-field">
                <input type="text" id="jobReference" name="jobReference" pattern="[A-Za-z0-9]{5}" required
                    placeholder=" ">
                <span>Job reference number</span>
            </div>

            <!-- Applicant Information -->
            <div class="name">
                <div class="input-field">
                    <input type="text" id="firstName" name="firstName" pattern="[a-zA-Z]{0,20}" required
                        placeholder=" ">
                    <span>First name</span>
                </div>
                <div class="input-field">
                    <input type="text" id="lastName" name="lastName" pattern="[a-zA-Z]{0,20}" required placeholder=" ">
                    <span>Last name</span>
                </div>
            </div>
            <div class="input-field">
                <input type="text" id="dob" name="dob" pattern="\d{2}/\d{2}/\d{4}" required placeholder=" ">
                <span>Date of birth (dd/mm/yyyy)</span>
            </div>
            <fieldset>
                <legend>Gender</legend>
                <div class="gender">
                    <input type="radio" name="gender" id="male" value="male" required>
                    <label for="male">Male</label>
                    <input type="radio" name="gender" id="female" value="female" required>
                    <label for="female">Female</label>
                    <input type="radio" name="gender" id="other" value="other" required>
                    <label for="other">Other</label>
                </div>
            </fieldset>

            <!-- Address Information -->
            <div class="input-field">
                <input type="text" id="streetAddress" name="streetAddress" maxlength="40" required placeholder=" ">
                <span>Street address</span>
            </div>

            <div class="input-field">
                <input type="text" id="suburb" name="suburb" maxlength="40" required placeholder=" ">
                <span>Subrub/Town</span>
            </div>

            <fieldset class="state-container">
                <select id="state" name="state" required>
                    <option value="">Choose state</option>
                    <option value="VIC">VIC</option>
                    <option value="NSW">NSW</option>
                    <option value="QLD">QLD</option>
                    <option value="NT">NT</option>
                    <option value="WA">WA</option>
                    <option value="SA">SA</option>
                    <option value="TAS">TAS</option>
                    <option value="ACT">ACT</option>
                </select>
                <span class="down-arrow">&#9660;</span>
            </fieldset>

            <div class="input-field">
                <input type="text" id="postcode" name="postcode" pattern="\d{4}" required placeholder=" ">
                <span>Postcode: 4 digits</span>
            </div>

            <!-- Contact Information -->
            <div class="input-field">
                <input type="email" id="email" name="email" required placeholder=" ">
                <span>Email</span>
            </div>
            <div class="input-field">
                <input type="tel" id="phone" name="phone" pattern="[0-9\s]{8,12}" required placeholder=" ">
                <span class="except">Phone number</span>
            </div>

            <!-- Skills -->
            <h3>Select skills</h3>
            <ul class="skills-container">
                <li class="skill">
                    <input type="checkbox" name="skills1" value="programming" id="programming" checked>
                    <label for="programming">
                        <img src="images/light/programming.svg" alt="Programming Icon" class="light-mode-element">
                        <img src="images/dark/programming.svg" alt="Programming Icon" class="dark-mode-element">
                        <h4>Programming</h4>
                    </label>
                </li>
                <li class="skill">
                    <input type="checkbox" name="skills2" value="design" id="design">
                    <label for="design">
                        <img src="images/light/design.svg" alt="Design Icon" class="light-mode-element">
                        <img src="images/dark/design.svg" alt="Design Icon" class="dark-mode-element">
                        <h4>Design</h4>
                    </label>
                </li>
                <li class="skill">
                    <input type="checkbox" name="skills3" value="communication" id="communication">
                    <label for="communication">
                        <img src="images/light/communication.svg" alt="Communication Icon" class="light-mode-element">
                        <img src="images/dark/communication.svg" alt="Communication Icon" class="dark-mode-element">
                        <h4>Communication</h4>
                    </label>
                </li>
                <li class="skill">
                    <input type="checkbox" name="skills4" value="other" id="other">
                    <label for="other">
                        <img src="images/light/other-skills.svg" alt="Other Skills Icon" class="light-mode-element">
                        <img src="images/dark/other-skills.svg" alt="Other Skills Icon" class="dark-mode-element">
                        <h4>Other</h4>
                    </label>
                    <textarea id="other-textarea" name="other-skills" placeholder="Other skills"></textarea>
                </li>
            </ul>

            <!-- Submit Button -->
            <button type="submit" value="Submit" class="button submit-button">
                <span>SUBMIT
                    <img src="images/light/right-arrow.svg" alt="Right Arrow Icon"
                        class="arrow-icon light-mode-element">
                    <img src="images/dark/right-arrow.svg" alt="Right Arrow Icon" class="arrow-icon dark-mode-element">
                </span>
            </button>
        </form>
    </main>
    <?php
        include("footer.inc");
    ?>
</body>

</html>