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
    <header>
        <img src="images/light/logo-with-text.svg" alt="Future Powered Solutions Logo"
            class="light-mode-element nav-logo">
        <img src="images/dark/logo-with-text.svg" alt="Future Powered Solutions Logo"
            class="dark-mode-element nav-logo">
        <nav>
            <ul class="nav-list" id="nav-list">
                <li><a class="nav-item" href="index.html">HOME</a></li>
                <li><a class="nav-item" href="jobs.html">JOBS</a></li>
                <li><a class="nav-item" href="apply.html">APPLY</a></li>
                <li><a class="nav-item" href="about.html">ABOUT</a></li>
                <li><a class="nav-item" href="enhancements.html">ENHANCEMENTS</a></li>
                <li><a class="nav-item" href="mailto:104486332@student.swin.edu.au">EMAIL</a></li>
                <a class="close-hamburger-menu" href="#">
                    <img src="images/light/close.svg" alt="Close Menu Icon"
                        class="light-mode-element hamburger-menu-icon">
                    <img src="images/dark/close.svg" alt="Close Menu Icon"
                        class="dark-mode-element hamburger-menu-icon">
                </a>
            </ul>
            <a class="open-hamburger-menu" href="#nav-list">
                <img src="images/light/hamburger-menu.svg" alt="Open Menu Icon"
                    class="light-mode-element hamburger-menu-icon">
                <img src="images/dark/hamburger-menu.svg" alt="Open Menu Icon"
                    class="dark-mode-element hamburger-menu-icon">
            </a>
        </nav>
    </header>

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
    </main>

    <footer>
        <a href="https://maps.google.com?q=A35+Bach+Dang+Street,+Tan+Binh+District,+Ho+Chi+Minh+City,+Viet+Nam"
            target="_blank" class="contact-item">
            <img src="images/light/address.svg" alt="Address Icon" class="light-mode-element contact-icon">
            <img src="images/dark/address.svg" alt="Address Icon" class="dark-mode-element contact-icon">
            <p>A35 Bach Dang Street, Tan Binh District, Ho Chi Minh City, Viet Nam.</p>
        </a>
        <a href="tel:+84387148555" class="contact-item">
            <img src="images/light/phone.svg" alt="Phone Icon" class="light-mode-element contact-icon">
            <img src="images/dark/phone.svg" alt="Phone Icon" class="dark-mode-element contact-icon">
            <p>+84387148555</p>
        </a>
        <a href="mailto:104486332@student.swin.edu.au" class="contact-item">
            <img src="images/light/email.svg" alt="Email Icon" class="light-mode-element contact-icon">
            <img src="images/dark/email.svg" alt="Email Icon" class="dark-mode-element contact-icon">
            <p>104486332@student.swin.edu.au</p>
        </a>
        <p>© 2024 Future Powered Solutions</p>
    </footer>

</body>

</html>