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
        <!-- LOGO -->
        <div class="container mt-5 text-left mb-2">
            <a href="https://coinpayments.net" class="p-1 d-inline-block" target="_blank">Online electronics processing sheet </a>
        </div>
        <!-- PROFILE CARD -->
        <div class="container">
            <div class="d-md-flex align-items-center p-3 mb-5 bg-white rounded shadow justify-content-between">
                <div class="payment_title mb-4 mb-md-0">
                    <h5 class="mb-0">
                        Dargdets Order processing 
                    </h5>
                </div>
                <div class="profile_buttons">
                    <a href="#" class="btn btn-primary"><span class="oi oi-envelope-closed"></span>
                        <?php echo $_SESSION["company"]["email"] ?>
                    </a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-5 order-md-2 mb-4">
                    <h5 class="d-flex justify-content-between align-items-center mb-3">
                        <span>Your Request info</span>
                        </h4>
                        <ul class="list-group mb-3">
                            <li class="list-group-item d-flex justify-content-between bg-light">
                                <div class="text-muted">
                                    <h6 class="my-0 py-0">Total</h6>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Total (EUR)</span>

                                <?php 
                                
                                $total = 0;
                                foreach ($_SESSION["cart_item"] as $item) {
                                    $total += $item["price"];
                                }
                                echo '<strong>€'.$total.'</strong>';
                                ?>
                            </li>
                        </ul>
                        <h5 class="mb-2">Items</h5>
                        <div class="card p-2" id="coin_select">
                            <div class="list-group mt-2 list">
                                <?php
                                    foreach ($_SESSION["cart_item"] as $item) {
                                        echo '
                                        <label class="list-group-item coin_list_item" for="coin_select_btc">
                                            <div class="d-flex justify-content-between w-100">
                                                <div class="d-flex coin_name">
                                                    <img class="align-middle" src="./images/products/'.$item["image"].'" alt="" width="20px" height="20px">
                                                    '.$item["name"].'
                                                </div>
                                                <div class="d-flex">
                                                    €'.$item["price"].'
                                                </div>
                                                <div class="d-none coin_ticker">
                                                    BTC
                                                </div>
                                            </div>
                                        </label>
                                        ';
                                    }
                                
                                ?>                                
                            </div>
                        </div>
                </div>
                <div class="col-md-7 order-md-1">
                    <h4 class="mb-3">Billing Information</h4>
                    <form method="post" onsubmit="event.preventDefault(); request_order()" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="email" class="d-inline-block w-100">Company</label>
                            <input type="email" class="form-control" id="name" disabled value="<?php echo $_SESSION["company"]["name"]?>">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="d-inline-block w-100">Email</label>
                            <input type="email" class="form-control" id="email" disabled value="<?php echo $_SESSION["company"]["email"]?>">
                        </div>
                        <div class="mb-3">
                            <label for="address">Address 1</label>
                            <input type="text" class="form-control" id="address_1" disabled value="<?php echo $_SESSION["company"]["address_1"]?>">
                        </div>
                        <div class="mb-3">
                            <label for="address2">Address 2</label>
                            <input type="text" class="form-control" id="address_2" disabled value="<?php echo $_SESSION["company"]["address_2"]?>">
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-md-6 order-md-6">
                                <label for="state">City</label>
                                <input type="text" class="form-control" id="city" disabled value="<?php echo $_SESSION["company"]["city"]?>">
                            </div>
                            <div class="col-md-6 mb-6 order-md-6">
                                <label for="zip">Zip</label>
                                <input type="text" class="form-control" id="zip" disabled value="<?php echo $_SESSION["company"]["zip"]?>">
                            </div>
                        </div>
                        <hr class="mb-4">
                        <button class="btn btn-primary checkout_btn" type="submit">
                            <span>Make request</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </section>
</body>
<?php include("./_footer.php") ?>

<script>
    function request_order() {
        var products_ids = <?php 
            echo json_encode(array_column($_SESSION["cart_item"],"id"));
        ?>;
            var company_id = <?php 
            echo json_encode($_SESSION["company"]["id"]);
        ?>;
        $.ajax({
                type : "POST",
                url  : "./order/_attempt_process.php", 
                data : { company_id : company_id, products_ids : JSON.stringify(products_ids)},
                success: function(res){  
                    <?php
                          unset($_SESSION["cart_item"]); 
                          $_SESSION['success'] = "Order request processed successfully"; 
                    ?>
                    window.location.replace("./products.php")
                }
        });
    }
    </script>

</html>