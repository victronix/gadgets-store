<?php session_start() ?>
<!DOCTYPE html>
<link rel='stylesheet' href='../styles/_login.css'>
<body>
    <section>
        <div class="d-flex justify-content-center">
            <?php
            if (isset($_SESSION['errors'])) {
                echo '<ul id="error_msg_el">';
                foreach ($_SESSION['errors'] as $error) {
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
</body>
<script>
    const error_msg_el = document.getElementById("error_msg_el");
    if (error_msg_el) {
        setTimeout(() => {
            error_msg_el.style.visibility = "hidden";
        }, 5000);
    }
</script>
</html>