<?php
include("./db_connect.php");

$sql = "SELECT * FROM resources";
$result = $conn->query($sql);

$_index = 0;
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        // Print out resources
        echo '
        <li class="c-services__item">
            <h3>'.$row["name"].'</h3>
            <p>'.$row["description"].'</p>
        </li>
      ';
    }
} else {
    echo "0 results";
}
$conn->close();
