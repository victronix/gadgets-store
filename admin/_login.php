<!-- partial:index.partial.html -->
<div class="container">
    <div class="row mt-5">
        <div class="spContainer mt-5 mx-auto">
            <div class="card px-4 py-5 border-0 shadow">
                <div class="d-inline text-left mb-3">
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
                        if (isset($_SESSION['message'])) {
                            echo '<div class="alert alert-danger">' . $_SESSION["message"] . '</div>';
                            unset($_SESSION['message']);
                        }
                        ?>
                    </div>
                    <h3 class="font-weight-bold">Dardgets Admin Login</h3>
                    <p>Dardgets administration dashboard, unauthorized access is strongly prohibited!</p>
                </div>
                <form action='./_attempt_login.php' method='POST'>
                    <div class="d-inline text-center mb-0">
                        <div class="form-group mx-auto">
                            <input class="form-control inpSp" name="username" type="text" placeholder="username">
                        </div>
                    </div>
                    <div class="d-inline text-center mb-3">
                        <div class="form-group mx-auto">
                            <input class="form-control inpSp" name="password" type="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="d-inline text-left mb-3">
                        <div class="form-group mx-auto">
                            <button class="btn btn-primary">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- partial -->