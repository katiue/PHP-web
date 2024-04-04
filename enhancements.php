<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <title>Enhancements</title>
</head>

<body>
    <?php
        require_once("settings.php");
        include("header.inc");
    ?>
    <main>
        <section class="enhancements-hero-section">
            <div class="enhancement-icons-container">
                <img src="images/light/sparkles.svg" alt="Sparkles Icon" class="light-mode-element enhancement-icon">
                <img src="images/dark/sparkles.svg" alt="Sparkles Icon" class="dark-mode-element enhancement-icon">

                <img src="images/light/wizard-hat.svg" alt="Wizard Hat Icon"
                    class="light-mode-element enhancement-icon">
                <img src="images/dark/wizard-hat.svg" alt="Wizard Hat Icon" class="dark-mode-element enhancement-icon">
            </div>
            <h1>ENHANCEMENTS</h1>
            <div class="enhancement-icons-container">
                <img src="images/light/magic-wand.svg" alt="Magic Wand Icon"
                    class="light-mode-element enhancement-icon">
                <img src="images/dark/magic-wand.svg" alt="Magic Wand Icon" class="dark-mode-element enhancement-icon">

                <img src="images/light/shooting-star.svg" alt="Shooting Star Icon"
                    class="light-mode-element enhancement-icon">
                <img src="images/dark/shooting-star.svg" alt="Shooting Star Icon"
                    class="dark-mode-element enhancement-icon">
            </div>
        </section>

        <section class="enhancement-section">
            <h2 class="section-heading">🎨 Dynamic themes</h2>

            <h3 class="enhancement-heading">What is it?</h3>
            <p>Our website automatically changes the theme to match your system settings.</p>
            <p>This creates a more personalized user experience.</p>
            <p class="light-mode-element">
                You are using <span class="blue-bold-italic">light mode</span>
                <img src="images/light/sun.svg" alt="Sun Icon" class="theme-icon">
            </p>
            <p class="dark-mode-element">
                You are using <span class="blue-bold-italic">dark mode</span>
                <img src="images/dark/moon.svg" alt="Moon Icon" class="theme-icon">
            </p>
            <div class="theme-demo-container">
                <img src="images/light-mode-demo.png" alt="Light Mode Demo" class="theme-demo-image">
                <img src="images/light/up-down-arrows.svg" alt="Up Down Arrows Icon"
                    class="light-mode-element theme-arrow-icon">
                <img src="images/dark/up-down-arrows.svg" alt="Up Down Arrows Iconn"
                    class="dark-mode-element theme-arrow-icon">
                <img src="images/dark-mode-demo.png" alt="Dark Mode Demo" class="theme-demo-image">
            </div>

            <h3>How is it implemented?</h3>
            <p>Using the <span class="blue-bold-italic">prefers-color-scheme</span> feature in media queries, we set the
                global colors based on the system theme.</p>
            <p>The dark mode's accent colors are slightly muted compared to their light mode counterparts.</p>
            <div class="demo-images-container">
                <img src="images/light-mode-code.png" alt="Light Mode Code" class="code-image">
                <img src="images/dark-mode-code.png" alt="Dark Mode Code" class="code-image">
            </div>
            <p>Additionally, we create 2 folders <span class="blue-bold-italic">images/light</span> and <span
                    class="blue-bold-italic">images/dark</span> to store icons with appropriate colors.</p>
            <p>To change between the icons, we use <span class="blue-bold-italic">light-mode-element</span> and <span
                    class="blue-bold-italic">dark-mode-element</span> classes whose display property is set by the media
                query.</p>
            <div class="demo-images-container">
                <img src="images/theme-icon-folders.png" alt="Theme Icons Folder" class="code-image">
                <img src="images/theme-elements.png" alt="Theme Elements" class="code-image">
            </div>

            <h3>Where did we get the idea?</h3>
            <p>We took the initial inspiration from
                <a href="https://youtube.com/shorts/3EMH9X1OO5s?si=1Jn-uSAgjH4RTKq3" target="_blank">
                    this video
                    <img src="images/light/right-arrow.svg" alt="Arrow Icon" class="light-mode-element arrow-icon">
                    <img src="images/dark/right-arrow.svg" alt="Arrow Icon" class="dark-mode-element arrow-icon">
                </a>
                and continued developing on our own.
            </p>
        </section>

        <section class="enhancement-section">
            <h2 class="section-heading">🍔 Hamburger Menu</h2>

            <h3 class="enhancement-heading">What is it?</h3>
            <p>The horizontal navigation layout switches to a hamburger menu for mobile devices.</p>
            <p>This creates a more responsive design.</p>

            <div class="demo-images-container hamburger-demo">
                <img src="images/light/hamburger-menu-demo.png" alt="Hamburger Menu Demo" class="light-mode-element">
                <img src="images/dark/hamburger-menu-demo.png" alt="Hamburger Menu Demo" class="dark-mode-element">

                <img src="images/light/hamburger-menu-open.png" alt="Hamburger Menu Open" class="light-mode-element">
                <img src="images/dark/hamburger-menu-open.png" alt="Hamburger Menu Open" class="dark-mode-element">
            </div>

            <h3>How is it implemented?</h3>
            <p>First, the hamburger menu icons are hidden by default (desktop) and are shown on mobile using the media
                query.</p>
            <div class="demo-images-container">
                <img src="images/hamburger-menu-desktop.png" alt="Hamburger Menu Desktop" class="code-image">
                <img src="images/hamburger-menu-mobile.png" alt="Hamburger Menu Mobile" class="code-image">
            </div>
            <p>Then, we assign an <span class="blue-bold-italic">id</span> to the nav-list element, and the
                open-hamburger-menu icon has an <span class="blue-bold-italic">href to that id</span>.</p>
            <p>This means when the user clicks on the open-hamburger-menu icon, the nav-list is <span
                    class="blue-bold-italic">targeted</span>, so we can use the pseudo-class <span
                    class="blue-bold-italic">:target</span> selector to expand it.</p>
            <p>To close the menu, the close-hamburger-menu has the <span class="blue-bold-italic">href="#"</span>, which
                means when clicked on, the nav-list is no longer targeted, so the menu closes.</p>
            <img src="images/hamburger-menu-html.png" alt="Hamburger Menu HTML" class="large-code-image">
            <img src="images/hamburger-menu-css.png" alt="Hamburger Menu CSS" class="large-code-image">

            <h3>Where did we get the idea?</h3>
            <p>We learned this implementation from
                <a href="https://dev.to/ljcdev/hamburger-css-no-js-2dfa" target="_blank">
                    this article
                    <img src="images/light/right-arrow.svg" alt="Arrow Icon" class="light-mode-element arrow-icon">
                    <img src="images/dark/right-arrow.svg" alt="Arrow Icon" class="dark-mode-element arrow-icon">
                </a>
                and adjusted it to our preferences.
            </p>
        </section>

        <section class="enhancement-section">
            <h2 class="section-heading">🧑‍💻 Friendly interface</h2>
            
            <h3 class="enhancement-heading">What is it?</h3>
            <p>A system which allows the <span class="blue-bold-italic">admins</span> of the server to view, adjust and delete users.</p>
            <p>This creates a easier way to handle the web data.</p>

            <div class="demo-images-container">
                <img src="images/light/user-management.png" alt="User manage interface" class="management light-mode-element">
                <img src="images/dark/user-management.png" alt="User manage interface" class="management dark-mode-element">
            </div>

            <p>For <span class="blue-bold-italic">users</span>, the interface is easy to understand and use.</p>
            <div class="demo-images-container">
                <img src="images/light/notification-bar.png" alt="User manage interface" class="profile_interface light-mode-element">
                <img src="images/dark/notification-bar.png" alt="User manage interface" class="profile_interface dark-mode-element">

                <img src="images/light/profile-bar.png" alt="User manage interface" class="profile_interface light-mode-element">
                <img src="images/dark/profile-bar.png" alt="User manage interface" class="profile_interface dark-mode-element">
            </div>
            
            <h3>How is it implemented?</h3>
            <p>The datas of every database are <span class="blue-bold-italic">synchronized and linked</span> to the user account throught <span class="blue-bold-italic">user id</span> to ensure data comprehension</p>
            <div class="demo-images-container">
                <img src="images/table-code.png" alt="table Code" class="code-image">
            </div>
            <p>Whenever changes are made on a user's account the website will store and send notificationto that account. Therefore, actions are easy to trace back</p>
            <div class="demo-images-container">
                <img src="images/notification-database.png" alt="table Code" class="code-image">
            </div>
            <p>There is also a differnce on admin's interface and user's interface</p>
            <div class="demo-images-container nav-demo-container">
                <p>Admin:</p>
                <img src="images/light/admin-nav-bar.png" alt="Hamburger Menu Demo" class="light-mode-element nav-demo">
                <img src="images/dark/admin-nav-bar.png" alt="Hamburger Menu Demo" class="dark-mode-element nav-demo">

                <p>User:</p>
                <img src="images/light/user-nav-bar.png" alt="Hamburger Menu Open" class="light-mode-element nav-demo">
                <img src="images/dark/user-nav-bar.png" alt="Hamburger Menu Open" class="dark-mode-element nav-demo">
            </div>
        </section>

        <section class="enhancement-section">
            <h2 class="section-heading">🛡️ Secure account on the website</h2>

            <h3 class="enhancement-heading">What is it?</h3>
            <p>Methods implemented to <span class="blue-bold-italic">encode</span> user's data like <span class="blue-bold-italic">id</span> and <span class="blue-bold-italic">password</span>.</p>
            <p>For password. I implemented password hashing method called <span class="blue-bold-italic">PASSWORD_BCRYPT</span>. This ensures that your users' passwords are stored securely, safeguarding against unauthorized access and common password-based attacks. </p>
            
            <div class="demo-images-container">
                <img src="images/pwd.png" alt="Hamburger Menu Desktop" class="code-image nav-demo">
                <img src="images/user-id.png" alt="Hamburger Menu Mobile" class="code-image nav-demo">
            </div>

            <h3 class="enhancement-heading">How it implemented?</h3>
            <p>Methods implemented to <span class="blue-bold-italic">encode</span> user's data like <span class="blue-bold-italic">id</span> and <span class="blue-bold-italic">password</span></p>
            
            <div class="demo-images-container">
                <img src="images/pwd-hash.png" alt="Hamburger Menu Desktop" class="code-image nav-demo">
                <img src="images/id-code.png" alt="Hamburger Menu Mobile" class="code-image nav-demo">
            </div>
            <img src="images/password_hash_code.png" alt="password hash code" class="large-code-image">
            <h3>Where did we get the idea?</h3>
            <p>We learned this implementation from
                <a href="https://github.com/ircmaxell/password_compat" target="_blank">
                    this project
                    <img src="images/light/right-arrow.svg" alt="Arrow Icon" class="light-mode-element arrow-icon">
                    <img src="images/dark/right-arrow.svg" alt="Arrow Icon" class="dark-mode-element arrow-icon">
                </a>
                and implemented it to our website.
            </p>
        </section>
    </main>
    <?php
        include("footer.inc");
    ?>

</body>

</html>