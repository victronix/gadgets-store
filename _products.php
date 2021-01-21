<?php
include("./db_connect.php");


$sql = "SELECT * FROM products";
$result = $conn->query($sql);

$currentItems = $_SESSION["cart_item"] ? $_SESSION["cart_item"]  : [];

$_index = 0;
$action = '';
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        if (find_key_value($currentItems, "id", $row["id"])) {
            $action = 'remove';
        } else {
            $action = 'add';
        }
        // Print out products
        echo '
            <div class="col-md-3">
                <form method="POST" action="./products.php?action=add&code=' . $row["price"] . '&product_id=' . $row["id"] . '&action=' . $action . '">
                    <div class="buss-product-card ">
                        <div class="buss-product-card-content">
                            <div class="buss-product-top-bar">
                                <span>
                                    €' . $row["price"] . '
                                </span>
                                <span class="float-right lnr lnr-heart"></span>
                            </div>
                            <div class="img">
                                <img src="./images/products/' . $row["image"] . '">
                            </div>
                        </div>
                        <div class="buss-product-card-description">
                            <div class="buss-product-title">
                                ' . $row["name"] . '
                            </div>
                            <div class="buss-product-cart">
                                <span class="lnr lnr-cart"></span>
                            </div>
                        </div>
                        <div class="buss-product-card-footer">
                            <input type="submit"  class="btn btn-sm sbuss-product-span" value="' . $action . '"/>
                            <input type="hidden" name="action" value="add" />
                        </div>
                    </div>
                        <input type="hidden" class="product-quantity" name="quantity" value="1" size="2" />
                        <input type="hidden" class="product-quantity" name="code" value="' . $row["id"] . '" size="2" />
                        <input type="hidden" class="product-id" name="product_id" value="' . $row["id"] . '" size="2" />
                </form>
            </div>
        ';
    }
} else {
    echo "0 results";
}
$conn->close();
