<?php session_start() ?>
<!DOCTYPE html>
<!-- Header Scripts -->
<?php include("./_header.php") ?>
<!-- Header Scripts End -->

<!-- Header & Navigation Start -->
<?php include("./_navbar.php") ?>
<!-- Header & Navigation End -->

<!-- Product Cart start -->
<?php include("./_cart.php") ?>
<!-- Product Cart end -->
<link rel='stylesheet' href='./styles/_login.css'>
<body>
<!-- Section start -->
    <section>
        <div class="d-flex justify-content-center">
            <?php
            // Prints outs errors
            if (isset($_SESSION['errors'])) {
                echo '<ul id="error_msg_el">';
                // Iterate errors list
                foreach ($_SESSION['errors'] as $error) {
                    // Display error
                    echo '<li class="alert alert-danger alert-sm custom-error-alert">' . $error . '</li>';
                }
                echo '</ul>';
                unset($_SESSION['errors']);
            }
            ?>
        </div>
        <div class="d-flex justify-content-center">
            <form action='./_attempt_login.php' method='POST'>
                <input type='email' name='email' placeholder='Email'><br>
                <input type='password' name='password' placeholder='Password'><br>
                <input class='log' type='submit' value='Log In'>
                <p class="d-flex justify-content-center">or</p>
                <a class='sign_up' type='submit' href="./register.php">Register</a>
            </form>
        </div>
    </section>
<!-- Section end  -->
</body>
<?php include("./_footer.php") ?>
<!-- Timeout to remove error message -->
<script>
    //Error element 
    const error_msg_el = document.getElementById("error_msg_el");
    if (error_msg_el) {
        // 5 seconds timeout
        setTimeout(() => {
            // Make element hidden
            error_msg_el.style.visibility = "hidden";
        }, 5000);
    }
</script>

</html>