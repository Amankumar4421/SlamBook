<?php include 'connect.php' ?>
<?php

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $roll = $_POST["roll"];
      $frn = $_POST["frndroll"];
    
    $opi = $_POST["opi"];
   
}
      $sql = "SELECT * FROM fry WHERE user_id = '$roll' and frnd = '$frn' ";
      $result =mysqli_query($conn, $sql);
  
      if ($result->num_rows != 0) {
    
         $sql = "UPDATE fry  SET frnd='$frn', opinion= '$opi'  where user_id='$roll' and frnd = '$frn' ";
         mysqli_query($conn, $sql);
    
      }
      else 
      {

      
        $sql = "INSERT INTO fry ( user_id,frnd,opinion ) VALUES ('$roll','$frn', '$opi')";
        mysqli_query($conn, $sql);
      

    }
      
      header("Location: review.php");

?>