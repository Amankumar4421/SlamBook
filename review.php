<!DOCTYPE html>
<?php include 'connect.php' ?>
<?php
session_start();
if(!isset($_SESSION['reg'])){
    header('Location:index.php');
    die;
  }
$regno = $_SESSION['reg'];
header("Cache-Control:no-cache,private,must-revalidate");
?>
<html>

<head>
    <title>Vignan University::Vadlamudi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        @media screen(max-width:500px) {
            .opinion-box {
                width: 200%;

            }

        }

        body {
            animation: joy 8s linear infinite;
            /* background-image: linear-gradient(135deg, #fceabb 10%, #f8b500 100%); */
            background-image: linear-gradient(to left, #FFFF33, lightblue);
            background-size: 200% 200%;
        }

        @keyframes joy {
            0% {
                background-position: 0% 20%;
            }

            50% {
                background-position: 50% 25%;
            }

            100% {
                background-position: 100% 50%;
            }
        }

        h1 {
            text-align: center;
            color: #333;
        }


        .opinion-box p {
            margin-bottom: 10px;
            opacity: 0;
            animation: fade 1s ease forwards;
        }


        @keyframes fade {
            to {
                opacity: 1;
            }
        }



        .opinion-form {
            position: absolute;
            margin-left: 6%;
            justify-content: center;
            position: relative;

            left: -2%;
            margin-top: 30px;
            max-width: 500px;
            margin: 0 auto;
            background-image: linear-gradient(to right, lightblue, light);
            background-color: lightcyan;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 6px lightblue;
        }

        .opinion-form label,
        .opinion-form textarea,
        .opinion-form button {
            display: block;
            margin-bottom: 10px;
        }

        label {
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        textarea {
            width: 70%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            /* transition: border-color 0.3s; */

        }

        #rollNumber,
        #rollNumber1 {
            width: 50%;
            transition: width 1.5s;
            transition-timing-function: linear;

        }

        #rollNumber:hover,
        #rollNumber1:hover {
            width: 100%;
        }

        textarea {
            resize: vertical;
            min-height: 10px;
        }

        input[type="text"]:hover,
        textarea:hover {
            outline: none;
            border-color: #0056b3;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

   

        .opinion-box p {
            font-family: cursive;
        }

        .footer {
            width: 100%;
            position: absolute;
            top: 92%;
            text-emphasis-style: bold;
            font-size: 20px;
        }
        table {
  width: 100%;
  border-collapse: collapse;
  font-family: Arial, sans-serif;
}

/* Table header row */
table th {
  background-color: #333;
  color: white;
  font-weight: bold;
  text-align: left;
  padding: 10px;
}

/* Table data rows */
table td {
  border: 1px solid #ddd;
  padding: 10px;
}

/* Alternating row background colors */
table tr:nth-child(even) {
  background-color: lightblue;
}

/* Hover effect on rows */
table tr:hover {
  background-color:lightcoral;
}
    </style>
</head>

<body>

 
    <div class="contair-fluid p-5">
        <div class="opinion-form">
            <div class="row justify-content-evenly">
                <!-- <div class="col-md-3"></div> -->
                <h1 for="rollNumber" class="form-label">Opinion Page</h1>
                <div class="col-md-12">
                    <div>
                        <form action="submit2.php" method="post">
                            <div class="mb-3">
                                <label for="rollNumber" class="form-label">Enter Your Roll Number:</label>
                                <input type="text" class="form-control" id="rollNumber" name="roll" value=<?php echo $regno; ?> placeholder="Roll Number">
                            </div>
                            <div class="mb-3">
                                <label for="rollNumber1" class="form-label">Enter Your frnd Number:</label>
                                <input type="text" class="form-control" id="rollNumber1" name="frndroll"
                                    placeholder="Roll Number" required>
                            </div>
                            <div class="mb-3">
                                <label for="opinion" class="form-label">Share Your Opinion:</label>
                                <textarea id="opinion" class="form-control" name="opi"
                                    placeholder="Type your opinion here..."></textarea>
                            </div>
                            <div class="d-grid gap-2 btn-primary">
                                <button type="submit" class="btn btn-primary justify-content-center">Submit</button>
                            </div>
                            <div class="d-grid gap-2 btn-primary">
                                <button type="button" class="btn btn-primary justify-content-center" onclick="window.location.href='checkdetails.php'">back</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- <div class="col-md-3"></div> -->
            </div>
        </div>
       

    </div>
    <div id="reviews-container" class="reviews-container">

</div>


    <?php
  
  
      $id=$regno;

      $sql = "SELECT * FROM fry WHERE user_id = '$id'";
      $result = mysqli_query($conn, $sql);
      

      
     
  if ($result->num_rows > 0) {
      echo '<table>';
      echo '<tr>';
      echo '<th>FRIEND</th>';
      echo '<th>OPINION</th>';
      
      echo '</tr>';

      while ($row = $result->fetch_assoc()) {
          echo '<tr>';
          echo '<td>' . $row['frnd'] . '</td>';
          echo '<td>' . $row['opinion'] . '</td>';
          
          echo '</tr>';
      }
          echo '</table>';
      } 
      else {
          echo 'No data found for the selected year.';
      }
 // }
  
 
  ?>





</body>

</html>