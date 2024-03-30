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

<body>
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
            if($_SESSION['role']=='admin')
                echo '<li><a class="nav-item" href="manage.php">MANAGE</a></li>';
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
    <main>
        <section class="index-hero-section">
            <div>
                <img src="images/light/brain.svg" alt="Brain Icon" class="light-mode-element brain-icon">
                <img src="images/dark/brain.svg" alt="Brain Icon" class="dark-mode-element brain-icon">
                <h1 class="slogan">
                    POWERFUL AI <br> AT YOUR FINGERTIPS
                </h1>
            </div>
            <img src="images/light/ai-assistant.svg" alt="AI Assistant Icon" class="light-mode-element ai-assistant-icon">
            <img src="images/dark/ai-assistant.svg" alt="AI Assistant Icon" class="dark-mode-element ai-assistant-icon">
        </section>

        <section class="our-mission-section">
            <h2 class="section-heading">Our Mission</h2>
            <div class="double-quotes-container">
                <img src="images/light/double-quotes-start.svg" alt="Double Quotes Start Icon" class="light-mode-element quote-icon start-quote">
                <img src="images/dark/double-quotes-start.svg" alt="Double Quotes Start Icon" class="dark-mode-element quote-icon start-quote">
                <p class="text-in-double-quotes our-mission-paragraph">
                    Future Powered Solutions is committed to providing everyone with
                    <strong>cutting-edge AI assistants</strong>
                    that make life easier.
                    We are constantly improving and expanding our models to provide greater value.
                    Your productivity is our metric.
                </p>
                <img src="images/light/double-quotes-end.svg" alt="Double Quotes End Icon" class="light-mode-element quote-icon end-quote">
                <img src="images/dark/double-quotes-end.svg" alt="Double Quotes End Icon" class="dark-mode-element quote-icon end-quote">
            </div>
            <a href="about.html" class="button discover-who-we-are-button">
                <span>DISCOVER WHO WE ARE
                    <img src="images/light/right-arrow.svg" alt="Right Arrow Icon" class="light-mode-element arrow-icon">
                    <img src="images/dark/right-arrow.svg" alt="Right Arrow Icon" class="dark-mode-element arrow-icon">
                </span>
            </a>

            <h3 class="values-heading">Our models are</h3>
            <div class="values-container">
                <div class="value-item">
                    <img src="images/light/handshake.svg" alt="Handshake Icon" class="light-mode-element value-icon">
                    <img src="images/dark/handshake.svg" alt="Handshake Icon" class="dark-mode-element value-icon">
                    <h2 class="value-title">Helpful</h2>
                    <p>Solve problems and enhance productivity with clever, high-precision, and fast responses.</p>
                </div>
                <div class="value-item">
                    <img src="images/light/open-source.svg" alt="Open-source Icon" class="light-mode-element value-icon">
                    <img src="images/dark/open-source.svg" alt="Open-source Icon" class="dark-mode-element value-icon">
                    <h2 class="value-title">Accessible</h2>
                    <p>Available in 150+ countries with support for 50+ languages. Free and easy to sign up.</p>
                </div>
                <div class="value-item">
                    <img src="images/light/lock.svg" alt="Lock Icon" class="light-mode-element value-icon">
                    <img src="images/dark/lock.svg" alt="Lock Icon" class="dark-mode-element value-icon">
                    <h2 class="value-title">Responsible</h2>
                    <p>Guided by ethical principles and focused on fairness, transparency, and safety.</p>
                </div>
            </div>
        </section>

        <section>
            <h2 class="section-heading">Our Products</h2>
            <div class="product-container">
                <div class="product-item">
                    <img src="images/light/programming-pal.svg" alt="Programming Pal Icon" class="light-mode-element product-icon">
                    <img src="images/dark/programming-pal.svg" alt="Programming Pal Icon" class="dark-mode-element product-icon">
                    <h3 class="product-title">Programming Pal</h3>
                    <p class="product-description">Generate and explain code, optimize, refactor, create tests, convert, and
                        more.
                    </p>
                </div>
                <div class="product-item">
                    <img src="images/light/image-generator.svg" alt="Image Generator Icon" class="light-mode-element product-icon">
                    <img src="images/dark/image-generator.svg" alt="Image Generator Icon" class="dark-mode-element product-icon">
                    <h3 class="product-title">Image Generator</h3>
                    <p class="product-description">Bring your imagination to life with realistic images/light based on
                        your prompts.</p>
                </div>
                <div class="product-item">
                    <img src="images/light/personal-chef.svg" alt="Personal Chef Icon" class="light-mode-element product-icon">
                    <img src="images/dark/personal-chef.svg" alt="Personal Chef Icon" class="dark-mode-element product-icon">
                    <h3 class="product-title">Personal Chef</h3>
                    <p class="product-description">Get recipes for tasty and healthy dishes based on
                        your ingredients and preferences.</p>
                </div>
                <div class="product-item">
                    <img src="images/light/research-assistant.svg" alt="Research Assistant Icon" class="light-mode-element product-icon">
                    <img src="images/dark/research-assistant.svg" alt="Research Assistant Icon" class="dark-mode-element product-icon">
                    <h3 class="product-title">Research Assistant</h3>
                    <p class="product-description">Receive accurate and up-to-date information with proper
                        citations for your research.</p>
                </div>
            </div>
        </section>

        <section class="quote-section">
            <div class="double-quotes-container">
                <img src="images/light/double-quotes-start.svg" alt="Double Quotes Start Icon" class="light-mode-element quote-icon start-quote">
                <img src="images/dark/double-quotes-start.svg" alt="Double Quotes Start Icon" class="dark-mode-element quote-icon start-quote">
                <p class="text-in-double-quotes">
                    I've always thought of AI as the most profound technology humanity is working on—<span class="red-bold-italic">more profound than fire or electricity</span> or anything that we've
                    done in
                    the past.
                </p>
                <img src="images/light/double-quotes-end.svg" alt="Double Quotes End Icon" class="light-mode-element quote-icon end-quote">
                <img src="images/dark/double-quotes-end.svg" alt="Double Quotes End Icon" class="dark-mode-element quote-icon end-quote">
                <div class="quote-section-background"></div>
            </div>
            <div class="quote-image-area">
                <img src="images/sundar-pichai.png" alt="Sundar Pichai" class="quote-author-image">
                <div class="quote-author-info">
                    <p class="quote-author-name">Sundar Pichai</p>
                    <p class="quote-author-company-position">CEO of Google</p>
                </div>
            </div>
        </section>

        <section class="hiring-section">
            <div class="hiring-text-content">
                <h2 class="hiring-heading">We're hiring.<br> Let's change the world together.</h2>
                <p class="hiring-paragraph">
                    Have a passion for artificial intelligence? Join our mission to develop and provide everyone with
                    transformative AI technologies. Work in a positive environment alongside professionals who share your
                    vision. Apply now and be at the forefront of transformation.
                </p>
            </div>
            <a href="jobs.html" class="button discover-jobs-button">
                <span>DISCOVER JOBS
                    <img src="images/light/right-arrow.svg" alt="Right Arrow Icon" class="light-mode-element arrow-icon">
                    <img src="images/dark/right-arrow.svg" alt="Right Arrow Icon" class="dark-mode-element arrow-icon">
                </span>
            </a>
        </section>

        <section>
            <h2 class="video-demonstration-heading">
                <img src="images/light/video.svg" alt="Video Icon" class="light-mode-element video-icon">
                <img src="images/dark/video.svg" alt="Video Icon" class="dark-mode-element video-icon">
                Video Demonstration
            </h2>
            <a href="https://bit.ly/web-demo-vid" target="_blank" class="button watch-video-button">
                <span>WATCH VIDEO
                    <img src="images/light/right-arrow.svg" alt="Right Arrow Icon" class="light-mode-element arrow-icon">
                    <img src="images/dark/right-arrow.svg" alt="Right Arrow Icon" class="dark-mode-element arrow-icon">
                </span>
            </a>
        </section>
    </main>
    <?php
    include("footer.inc");
    ?>

</body>

</html>