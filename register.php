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

<body>
    <section>
        <link rel="stylesheet" href="./styles/login.css">
        <div class="content">
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
            <!--content inner-->
            <div class="content__inner">
                <div class="container">
                </div>
                <div class="container overflow-hidden">
                    <!--multisteps-form-->
                    <div class="multisteps-form">
                        <!--progress bar-->
                        <div class="row">
                            <div class="col-12 col-lg-8 ml-auto mr-auto mb-4">
                                <div class="multisteps-form__progress">
                                    <button class="multisteps-form__progress-btn js-active" type="button" title="User Info">Company Info</button>
                                    <button class="multisteps-form__progress-btn" type="button" title="Address">Address</button>
                                    <button class="multisteps-form__progress-btn" type="button" title="Comments">Account</button>
                                </div>
                            </div>
                        </div>
                        <!--form panels-->
                        <div class="row">
                            <div class="col-12 col-lg-8 m-auto">
                                <form id="register_form" class="multisteps-form__form" method="post" action="_attempt_register.php">
                                    <!--single form panel-->
                                    <div class="multisteps-form__panel shadow p-4 rounded bg-white js-active" data-animation="scaleIn">
                                        <h4 class="multisteps-form__title">Company Information</h4>
                                        <div class="multisteps-form__content">
                                            <div class="form-row mt-4">
                                                <div class="col-12 col-sm-12">
                                                    <input class="multisteps-form__input form-control" type="text" name="name" placeholder="Company name" />
                                                </div>
                                            </div>
                                            <div class="form-row mt-4">
                                                <div class="col-12 col-sm-12">
                                                    <textarea class="form-control" placeholder="Description" name="description" id="" cols="30" rows="5"></textarea>
                                                </div>
                                            </div>
                                            <div class="button-row d-flex mt-4">
                                                <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!--single form panel-->
                                    <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                                        <h4 class="multisteps-form__title">Company Address</h4>
                                        <div class="multisteps-form__content">
                                            <div class="form-row mt-4">
                                                <div class="col">
                                                    <input class="multisteps-form__input form-control" type="text" name="address_1" placeholder="Address 1" />
                                                </div>
                                            </div>
                                            <div class="form-row mt-4">
                                                <div class="col">
                                                    <input class="multisteps-form__input form-control" type="text" name="address_2" placeholder="Address 2" />
                                                </div>
                                            </div>
                                            <div class="form-row mt-4">
                                                <div class="col-6 col-sm-6">
                                                    <input class="multisteps-form__input form-control" type="text" name="city" placeholder="City" />
                                                </div>
                                                <div class="col-6 col-sm-6">
                                                    <input class="multisteps-form__input form-control" type="text" name="zip" placeholder="Zip" />
                                                </div>
                                            </div>
                                            <div class="button-row d-flex mt-4">
                                                <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                                                <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!--single form panel-->
                                    <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                                        <h4 class="multisteps-form__title">Account</h4>
                                        <div class="multisteps-form__content">
                                            <div class="form-row mt-4">
                                                <div class="col-12 col-sm-12">
                                                    <input class="multisteps-form__input form-control" type="email" name="email" placeholder="Email" />
                                                </div>
                                            </div>
                                            <div class="form-row mt-4">
                                                <div class="col-12 col-sm-6">
                                                    <input class="multisteps-form__input form-control" type="password" name="password_1" placeholder="Password" />
                                                </div>
                                                <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                    <input class="multisteps-form__input form-control" type="password" name="password_2" placeholder="Repeat Password" />
                                                </div>
                                            </div>
                                            <div class="button-row d-flex mt-4">
                                                <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                                                <button type="submit" class="btn btn-success ml-auto">Register</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<script src='./scripts/login.js'></script>
<?php include("./_footer.php") ?>

</html>