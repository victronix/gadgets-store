<?php
include("./db_connect.php");

$sql = "SELECT * FROM technologies";
$result = $conn->query($sql);

$_index = 0;
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    // Print out technologies
    if($_index < 2){
      echo '
      <div class="col-md-6 product-item">
        <div class="d-flex flex-row product-card">
          <div class="p-2" style="width: 50%; background-color: rgb(5, 5, 45); padding: 0 !important">
            <div class="card-body">
              <h5 class="card-title">'.date("F jS, Y", strtotime($row["registered_date"])).'</h5>
              <h4 class="card-subtitle mb-2 text-muted">'.$row["name"].'</h4>
              <p class="card-text">'.$row["description"].'</p>
              <a href="#" class="card-link">VIEW MORE</a>
            </div>
          </div>
          <div class="p-2" style="width: 50%; padding: 0 !important">
            <img src="./images/'.$row["image"].'" style="width: 100%; height: 310px" alt="">
          </div>
        </div>
      </div>
      ';
    
      $_index = $_index + 1;

    }else{
      if($_index > 2){
        $_index = 0;
      }else{
        $_index = $_index + 1;
      }
      echo '
      <div class="col-md-6 product-item">
        <div class="d-flex flex-row product-card">
          <div class="p-2" style="width: 50%; padding: 0 !important">
            <img src="./images/'.$row["image"].'" style="width: 100%; height: 310px" alt="">
          </div>
          <div class="p-2" style="width: 50%; background-color: rgb(5, 5, 45); padding: 0 !important">
          <div class="card-body">
            <h5 class="card-title">18th January 2020</h5>
            <h4 class="card-subtitle mb-2 text-muted">'.$row["name"].'</h4>
            <p class="card-text">'.$row["description"].'</p>
            <a href="#" class="card-link">VIEW MORE</a>
          </div>
        </div>
        </div>
      </div>
      ';
    };
  }
} else {
  echo "0 results";
}
$conn->close();
