
<?php include 'connect.php' ?>
<?php
session_start();
$regno = $_SESSION['reg'];
header("Cache-Control:no-cache,private,must-revalidate");
?>
<?php 

$selectedCheckboxes=[];
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
  
//if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $regno;
    $user= $regno;
   

    // SQL query to retrieve user information based on user ID
    $sql = "SELECT * FROM details WHERE user_id = '$user_id'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        // User information found
        $row = $result->fetch_assoc();
        
        $name = $row["name"];
        
        $mobile = $row["mobile"];
        $course = $row["course"];
        $nickname = $row["nickname"];
        $extra = $row["extra"];
        $exam = $row["exam"];
        $year = $row["year"];
        $dob = $row["dob"];
        $branch = $row["branch"];
        $fav = $row["fav"];
        $company = $row["company"];
        $program=$row["program"];
        
    } else {
        // User information not found, set empty values
        
        $name = '';
        
        $mobile = '';
        $course = '';
        $nickname = '';
        $course = '';
        $extra = '';
        $exam = '';
        $year = '';
        $dob = '';
        $branch = '';
        $fav = '';
        $company = '';
        $program='';
    }

    // Close the database connection
    // $conn->close();
//}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vignan University::Vadlamudi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script>
      var subjectObject = {
          "UG": {
            "B.TECH": ["ME", "CSE", "ACSE", "ECE","EEE","IT","Chem.Eng","CSBS"],
            "B.SC": ["Stats",  "MATH", "CS"],
            "B.PHARMA": ["B.PHARMA"],
            "BCA": ["BCA"]

          },
          "PG": {
            "M.TECH": ["CSE","BIGDATA", "ML", "AI","Farming Machinery"],
            "M.SC": ["PHYSICS", "CHEMISTRY", "MATHEMATICS"],
            "MCA": ["MCA"]
          },
          "PHD": {
            "PHD": ["PHD"]
          }
        }
        window.onload = function() {
          var subjectSel = document.getElementById("subject");
          var topicSel = document.getElementById("topic");
          var chapterSel = document.getElementById("chapter");
          for (var x in subjectObject) {
            subjectSel.options[subjectSel.options.length] = new Option(x, x);
          }
          subjectSel.onchange = function() {
            //empty Chapters- and Topics- dropdowns
            chapterSel.length = 1;
            topicSel.length = 1;
            //display correct values
            for (var y in subjectObject[this.value]) {
              topicSel.options[topicSel.options.length] = new Option(y, y);
            }
          }
          topicSel.onchange = function() {
            //empty Chapters dropdown
            chapterSel.length = 1;
            //display correct values
            var z = subjectObject[subjectSel.value][this.value];
            for (var i = 0; i < z.length; i++) {
              chapterSel.options[chapterSel.options.length] = new Option(z[i], z[i]);
            }
          }
        }
  </script>
  </head>
  <body>
    <?php 
    
    $selected_checkboxes = [];
    
    
    
     $sql = "SELECT exam FROM details WHERE user_id = '$user'";
     $result = mysqli_query($conn, $sql);
 
     $selectedCheckboxes = [];
     if ($result && mysqli_num_rows($result) > 0) {
         $row = mysqli_fetch_assoc($result);
         $selectedCheckboxes = explode(', ', $row['exam']);
     }
    ?>
  <form action="submit.php" method="post">
     <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3 text-center">
                    <h2 class="bg-primary">Personal Details</h2>
                  </div>
            </div>  
        </div>
        <hr>
        <div class="row justify-content-evenly">
            <div class="col-md-5">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Registration no</label>
                    <input type="text" class="form-control" id="user" name="user" value="<?php echo $user_id; ?>" readonly>
                  </div>
            </div>
            <div class="col-md-5">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" >
                  </div>
            </div>
           
        </div>
        <div class="row justify-content-evenly">
            <div class="col-md-5">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Mobile</label>
                    <input type="tel" class="form-control" id="mobileNumber" name="mobileNumber" value="<?php echo $mobile; ?>">
                    <span id="mobileError" style="color: red;"></span>

<script>
  
  document.getElementById("mobileNumber").addEventListener("input", function () {
    var mobileNumber = this.value;
    var errorSpan = document.getElementById("mobileError");
    var a=mobileNumber.substring(0,1);
   //alert(a);
    if (mobileNumber.length != 10 || a<6) {
      errorSpan.textContent = "write correct format and length should not exceed 10 characters.";
    } else {
      errorSpan.textContent = ""; 
    }
  });
</script>
                  </div>
            </div>
            <div class="col-md-5">
                <div class="mb-3">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="exampleFormControlInput1" class="form-label">DOB</label>
                            <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $dob; ?>">
                       </div>
                       <div class="col-md-5">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Year</label>
                    <select class="form-select" aria-label="Default select example" name="graduationYear" id="graduationYears">
                        <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                        <option value="2024">2024</option>
                        
                </select>
                  </div>
            </div>
                    </div>
                  </div>
            </div>
        </div>
        
        <div class="row justify-content-evenly">
            <div class="col-md-5">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nickname</label>
                    <input type="text" class="form-control" id="nickname" name="nickname" value="<?php echo $nickname; ?>">
                  </div>
            </div>
            <div class="col-md-5">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Favourite Food</label>
                    <input type="text" class="form-control" id="favouriteFood" name="favouriteFood" value="<?php echo $fav; ?>">
                  </div>
            </div>
        </div>
        <div class="row justify-content-evenly">
            <div class="col-md-5">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Extra Activity</label>
                    <input type="text" class="form-control" id="extraActivity" name="extraActivity" value="<?php echo $extra; ?>">
                  </div>
            </div>
            <div class="col-md-5">
                <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Got Placed in Company</label>
                <input type="text" class="form-control" id="companyName" name="companyName" value="<?php echo $company; ?>">  
            </div>
        </div>
        <div class="row justify-content-evenly">
            <div class="col-md-5">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label" name="program"  id="Program">Program</label>
                    <select name="program" id="subject" class="form-select" aria-label="Default select example">
                        <option value="<?php echo $program; ?>" ><?php echo $program; ?></option> 
                    </select>
                </div>
            </div>
            <div class="col-md-5">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label" >Course</label>
                        <select name="course" id="topic" class="form-select"  aria-label="Default select example" >
                            <option   ><?php echo $course; ?></option> 
                        </select>
                    </div>
                
            </div>
            <div class="col-md-5">
                
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label" >Department</label>
                        <select name="branch" id="chapter" class="form-select"  aria-label="Default select example" >
                            <option value="<?php echo $branch; ?>"><?php echo $branch; ?></option> 
                        </select>
                    </div>
                
            </div>
            <div class="col-md-5">
                <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label" >Exam Qualified:</label><br>
                        <div class="form-check form-switch">
                        <input type="checkbox" class="form-check-input" id="TOELF" name="selected_checkboxes[]" value="TOELF" <?php if(in_array('TOELF',$selectedCheckboxes)) echo "checked";?>>
                        <label for="TOELF" class="form-check-label"> TOELF</label><br>
                        <input type="checkbox" class="form-check-input" id="JRE" name="selected_checkboxes[]" value="JRE" <?php if(in_array('JRE',$selectedCheckboxes)) echo "checked";?>>
                        <label for="JRE"class="form-check-label">JRE</label><br>
                        <input type="checkbox" class="form-check-input" id="GATE" name="selected_checkboxes[]" value="GATE" <?php if(in_array('GATE',$selectedCheckboxes)) echo "checked";?>>
                        <label for="GATE" class="form-check-label">GATE</label><br>
                        <input type="checkbox" class="form-check-input" id="ILETS" name="selected_checkboxes[]" value="ILETS" <?php if(in_array('ILETS',$selectedCheckboxes)) echo "checked";?>>
                        <label for="GATE" class="form-check-label">ILETS</label><br>
                        </div>
                      </div>
                </div>
            </div>
        </div>
       
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-3">
          <div class="col-sm-2">
                <button type="submit" class="btn btn-primary btn-sm-12" id="submit">Submit</button>
            </div>
          </div>
          <div class="col-md-3">
          <div class="col-sm-2">
            <button type="button" class="btn btn-primary btn-sm-12" id="submit" onclick="window.location.href='checkdetails.php'">Back </button>
          </div>
          </div>
          <div class="col-md-3"></div>
        </div>
     </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">

    </script>
  </form>
  <?php




 
  ?>



  </body>
</html>