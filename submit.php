<?php include 'connect.php' ?>

<?php
session_start();
if(!isset($_SESSION['reg'])){
  header('Location:index.php');
  die;
}
$user = $_SESSION['reg'];

header("Cache-Control:no-cache,private,must-revalidate");
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
$selected_checkboxes = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (isset($_POST['selected_checkboxes'])) {

    // $user = $_POST["user"];


    $sql = "SELECT * FROM details WHERE user_id = '$user'";
    $selectedCheckboxes = $_POST['selected_checkboxes'];
    $result = mysqli_query($conn, $sql);
    $selectedCheckboxesString = implode(', ', $selectedCheckboxes);
    if ($result->num_rows == 0) {

      $sql = "INSERT INTO details (user_id, exam) VALUES ('$user', '$selectedCheckboxesString')";


    } else {

      $sql = "UPDATE details SET exam = '$selectedCheckboxesString' WHERE user_id = '$user'";
      $reso = mysqli_query($conn, $sql);


    }
  } else {
    $sql = "UPDATE details SET exam = '' WHERE user_id = '$user'";
    mysqli_query($conn, $sql);
  }




  $name = $_POST["name"];
  $program = $_POST["program"];
  $mobile = $_POST["mobileNumber"];
  $course = $_POST["course"];
  $nickname = $_POST["nickname"];
  $extra = $_POST["extraActivity"];
  // $exam = $_POST["examQualified"];
  $year = $_POST["graduationYear"];
  $dob = $_POST["dob"];
  $branch = $_POST["branch"];
  $fav = $_POST["favouriteFood"];
  $company = $_POST["companyName"];








$sql = "SELECT * FROM details WHERE user_id = '$user'";
$result = mysqli_query($conn, $sql);

if ($result->num_rows == 0) {



  $sql = "INSERT INTO details ( user_id,name, mobile ,course, nickname,extra,year,dob,branch,fav,company,program ) VALUES ('$user','$name', '$mobile','$course','$nickname','$extra','$year','$dob','$branch','$fav','$company','$program')";
  mysqli_query($conn, $sql);
  echo '<script type="text/JavaScript">';
  echo "alert('Data inserted Successfully')";
  echo '</script>';
} else {

  $sql = "UPDATE details  SET name='$name', mobile= '$mobile',course='$course', nickname='$nickname',extra='$extra',year='$year',dob='$dob',branch='$branch',fav='$fav',company='$company',program='$program'   where user_id='$user'";
  //$conn->query($sql);
  mysqli_query($conn, $sql);
  echo '<script type="text/JavaScript">';
  echo "alert('Data updated Successfully')";
  echo '</script>';


}

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
echo '<script>setTimeout(function() { window.location = "checkdetails.php"; });</script>';
//header("Location: index.php");

}
?>