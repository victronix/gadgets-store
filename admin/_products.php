<div class="row">
    <div class="col-md-12">
        <br>
        <h4>Latest Product</h4>
        <hr>
    </div>
</div>
<div class="col-md-4">
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
        echo '<div id="transaction_message" class="alert alert-info alert-sm custom-error-alert">' . $_SESSION['message'] . '</div>';
        unset($_SESSION['message']);
    }
    if (isset($_GET["action"])) {
        switch ($_GET["action"]) {
            case 'edit':
                $sql = 'SELECT * FROM products where id = ' . $_GET["id"] . '';
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $product = $result->fetch_assoc();
                }
                break;

            default:
                # code...
                break;
        }
    }
    ?>
</div>
<div class="container container-table">
    <div class="row vertical-center-row">
        <div class="text-center col-md-12">
            <div class="row">
                <div class="col-md-10">
                    <form method="post" enctype="multipart/form-data" action="_attempt_add_product.php">
                        <?php if (isset($_GET["action"])) {
                            if ($_GET["action"] == "edit") {
                                echo '<input type="hidden" name="action" value="edit"/>';
                                echo '<input type="hidden" name="record_id" value="' . $product["id"] . '"/>';
                            }
                        } else {
                            echo '<input type="hidden" name="action" value="add"/>';
                        }
                        ?>
                        <div class="multisteps-form__content">
                            <div class="form-row">
                                <div class="col-12 col-sm-12">
                                    <div class="form-group text-left">
                                        <label for="email">Name:</label>
                                        <input type="text" name="name" value="<?php echo $product["name"] ?>" class="form-control" id="name">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-sm-12">
                                    <div class="form-group text-left">
                                        <label for="email">Description:</label>
                                        <textarea name="description" class="form-control" id="" cols="30" rows="3"><?php echo $product["description"] ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group text-left">
                                        <label for="email">Image:</label>
                                        <input type="file" name="image" id="image">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group text-left">
                                        <label for="Price">Price:</label>
                                        <input type="number" value="<?php echo $product["price"] ?>" name="price" class="form-control" id="email">
                                    </div>
                                </div>
                            </div>
                            <div class="button-row d-flex">
                                <button type="submit" class="btn btn-primary ml-auto">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <hr>
            <br>
            <div class="row">
                <?php include("./_products_list.php") ?>
            </div>
        </div>
    </div>
</div>
<script>
    const transaction_message = document.getElementById("transaction_message");
    if (transaction_message) {
        setTimeout(() => {
            transaction_message.style.visibility = "hidden";
        }, 3000);
    }
</script>