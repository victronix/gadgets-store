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
        <div class='header'>
        </div>
        <div class='body'>
            <div class="container">
                <!-- Button trigger modal -->

                <?php
                if (isset($_SESSION['success'])) {
                    echo '<div id="success_reg_msg" class="alert alert-success col-md-3 custom-error-alert"">' . $_SESSION['success'] . '</div>';
                    unset($_SESSION['success']);
                }
                ?>

                <?php
                if (isset($_SESSION["cart_item"])) {
                    $total_quantity = 0;
                    $total_price = 0;
                    $total_items = count($_SESSION["cart_item"]);
                ?>
                    <div class="row">
                        <!-- $_SESSION["cart_item"][0][] -->
                        <nav class="navbar navbar-default navbar-fixed-top">
                            <div class="container-fluid">
                                <!-- Brand and toggle get grouped for better mobile display -->
                                <div class="navbar-header">
                                    <button type="button" class="btn btn-primary navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                        Your product request <i class="fas fa-cart-plus"></i> (<?php echo $total_items ?>)
                                    </button>
                                </div>


                                <!-- Collect the nav links, forms, and other content for toggling -->
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                    <ul class="nav navbar-nav navbar-right">
                                        <?php
                                        foreach ($_SESSION["cart_item"] as $item) {
                                            $item_price = 100
                                        ?>
                                            <li class="cart-item">
                                                <span class="item">
                                                    <span class="item-left">
                                                        <img class="cart-item-img" src="./images/products/<?php echo $item["image"]; ?>" alt="" />
                                                        <span class="item-info">
                                                            <span><?php echo $item["name"]; ?></span>
                                                        </span>
                                                        <span>€ <?php echo $item["price"]; ?></span>

                                                    </span>
                                                </span>
                                            </li>
                                        <?php
                                        }
                                        ?>
                                        <li class="divider"></li>
                                        <?php if (isset($_SESSION["company"])) { ?>
                                            <li><a class="btn btn-sm text-center pull-right" href="./checkout.php">Check out</a></li>
                                        <?php } else { ?>
                                            <li>
                                                <a type="button" class="btn btn-sm text-center pull-right" href="./register.php">
                                                    Register
                                                </a>
                                                or 
                                                <a type="button" class="btn btn-sm text-center pull-right" href="./login.php">
                                                    Login
                                                </a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div><!-- /.navbar-collapse -->
                            </div><!-- /.container-fluid -->
                        </nav>

                    </div>
                <?php
                } else {
                ?>
                    <div class="no-records">Your Cart is Empty</div>
                <?php
                }
                ?>
                <div class='row'>
                    <?php include("./_products.php") ?>
                </div>
            </div>
        </div>
    </section>

</body>
<?php include("./_footer.php") ?>

<script>
    const success_reg_msg = document.getElementById("success_reg_msg");
    if (success_reg_msg) {
        setTimeout(() => {
            success_reg_msg.style.visibility = "hidden";
        }, 5000);
    }
</script>

</html>