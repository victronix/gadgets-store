<header id="header" class="u-header u-header--abs-top-md u-header--bg-transparent u-header--show-hide-md" data-header-fix-moment="500" data-header-fix-effect="slide">
    <!-- Navigation Start -->
    <nav class="u-header__section">
        <div id="logoAndNav" class="container">
            <!-- Nav -->
            <nav class="js-mega-menu navbar navbar-expand-md u-header__navbar u-header__navbar--no-space hs-menu-initialized hs-menu-horizontal">
                <!-- Logo -->
                <a class="navbar-brand u-header__navbar-brand u-header__navbar-brand-center" href="./index.php" aria-label="Front">
                    <span class="u-header__navbar-brand-text">Dargdets</span>
                </a>
                <!-- End Logo -->

                <!-- Responsive Toggle Button -->
                <button type="button" class="navbar-toggler btn u-hamburger" aria-label="Toggle navigation" aria-controls="navBar" data-toggle="collapse" data-target="#navBar">
                    <span id="hamburgerTrigger" class="u-hamburger__box">
                        <span class="u-hamburger__inner"></span>
                    </span>
                </button>
                <!-- End Responsive Toggle Button -->

                <!-- Navigation -->
                <div id="navBar" class="collapse navbar-collapse u-header__navbar-collapse">
                    <ul class="navbar-nav u-header__navbar-nav">
                        <!-- Home -->
                        <li class="nav-item hs-has-mega-menu u-header__nav-item" data-event="hover" data-animation-in="slideInUp" data-animation-out="fadeOut" data-position="left">
                            <a id="homeMegaMenu" class="nav-link u-header__nav-link" href="./index.php">Home</a>
                        </li>
                        <!-- End Home -->

                        <!-- Resources -->
                        <li class="nav-item hs-has-mega-menu u-header__nav-item" data-event="hover" data-animation-in="slideInUp" data-animation-out="fadeOut" data-max-width="440px" data-position="right">
                            <a id="ResourcesMegaMenu" class="nav-link u-header__nav-link" href="./services.php">Resources</a>
                        </li>
                        <!-- End Resources -->

                        <!-- Product -->
                        <li class="nav-item hs-has-sub-menu u-header__nav-item" data-event="hover" data-animation-in="slideInUp" data-animation-out="fadeOut">
                            <a id="ProductMegaMenu" class="nav-link u-header__nav-link" href="./products.php" aria-labelledby="ProductSubMenu">Products</a>
                        </li>
                        <!-- End Product -->

                        <!-- About -->
                        <li class="nav-item hs-has-mega-menu u-header__nav-item" data-event="hover" data-animation-in="slideInUp" data-animation-out="fadeOut" data-max-width="600px" data-position="right">
                            <a id="AboutMegaMenu" class="nav-link u-header__nav-link" href="./about_us.php">About Us</a>
                        </li>
                        <!-- End About -->

                        <!-- Contact -->
                        <li class="nav-item hs-has-mega-menu u-header__nav-item" data-event="hover" data-animation-in="slideInUp" data-animation-out="fadeOut" data-max-width="260px" data-position="right">
                            <a id="ContactMegaMenu" class="nav-link u-header__nav-link" href="./contact_us.php">Contact Us</a>
                        </li>
                        <?php 
                        if(isset($_SESSION["company"])){
                            echo '
                            <li class="nav-item hs-has-mega-menu u-header__nav-item" data-event="hover" data-animation-in="slideInUp" data-animation-out="fadeOut" data-max-width="260px" data-position="right">
                                <a id="ContactMegaMenu" class="user-logout btn-primary btn btn-sm nav-link u-header__nav-link" href="./_attempt_logout.php">Logout <i class="fas fa-sign-out-alt"></i></a>
                            </li>
                            ';
                        }
                        ?>
                        <!-- End Contact -->
                    </ul>
                </div>
                <!-- End Navigation -->
            </nav>
            <!-- End Nav -->
        </div>
    </nav>
    <!-- Navigation End -->
</header>