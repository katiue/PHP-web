<?php
    echo '
    <header>
        <img src="images/light/logo-with-text.svg" alt="Future Powered Solutions Logo"
            class="light-mode-element nav-logo">
        <img src="images/dark/logo-with-text.svg" alt="Future Powered Solutions Logo"
            class="dark-mode-element nav-logo">
        <nav>
            <ul class="nav-list" id="nav-list">
                <li><a class="nav-item" href="index.php">HOME</a></li>
                <li><a class="nav-item" href="jobs.php">JOBS</a></li>
                <li><a class="nav-item" href="apply.php">APPLY</a></li>
                <li><a class="nav-item" href="about.php">ABOUT</a></li>';
        session_start();
        if (isset($_SESSION['role']))
            if($_SESSION['role']=='admin'){
                echo '<li><a class="nav-item" href="manage.php">MANAGE</a></li>';
                echo '<li><a class="nav-item" href="applicant.php">APPLICANT</a></li>';
            }
                echo '<li><a class="nav-item" href="enhancements.php">ENHANCEMENTS</a></li>
                      <li><a class="nav-item" href="mailto:104486332@student.swin.edu.au">EMAIL</a></li>';
                echo '<a class="close-hamburger-menu" href="#">
                    <img src="images/light/close.svg" alt="Close Menu Icon"
                        class="light-mode-element hamburger-menu-icon">
                    <img src="images/dark/close.svg" alt="Close Menu Icon"
                        class="dark-mode-element hamburger-menu-icon">
                </a>
            </ul>';
    if (isset($_SESSION['user_id'])) {
        echo '
        <a class="nav-item profile" href="#user_profile">
            <img src="images/flat_avatar.png" alt="Avatar Icon" class="avt_img">
        </a>';
    } else
        echo '<a class="nav-item profile" href="login.php">Log in</a>';
        echo'    <a class="open-hamburger-menu" href="#nav-list">
                <img src="images/light/hamburger-menu.svg" alt="Open Menu Icon"
                    class="light-mode-element hamburger-menu-icon">
                <img src="images/dark/hamburger-menu.svg" alt="Open Menu Icon"
                    class="dark-mode-element hamburger-menu-icon">
            </a>
        </nav>';
            echo '<div class="user_profile" id="user_profile">';
                echo '<a class="profile_close" href="#">
                    <img src="images/light/close.svg" alt="Close Menu Icon"
                        class="light-mode-element close-icon">
                    <img src="images/dark/close.svg" alt="Close Menu Icon"
                        class="dark-mode-element close-icon">
                </a>';
                echo'
            <a class="nav-item" href="profile.php">Profile</a>
            <a class="nav-item" href="#notification">Notification</a>
            <a class="nav-item" href="logout.php">Log out</a>
        </div>
    </header>';
?>