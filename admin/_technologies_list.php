<table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Registerd Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM technologies";
        $result = $conn->query($sql);
        $currentItems = $_SESSION["cart_item"] ? $_SESSION["cart_item"]  : [];
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo '
                <tr>
                    <td>' . $row["name"] . '</td>
                    <td>' . $row["description"] . '</td>
                    <td>' . $row["registered_date"] . '</td>
                    <td>
                        <span><a href="./technologies?action=edit&id=' . $row["id"] . '">Edit</a></span> |
                        <span><a href="./_attempt_add_tech?action=delete&id=' . $row["id"] . '">Delete</a></span>
                    </td>
                </tr>
                ';
            }
        }
        $conn->close();
        ?>
</table>