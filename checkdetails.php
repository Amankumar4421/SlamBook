<?php include 'connect.php'?>
<?php session_start();
header("Cache-Control:no-cache,private,must-revalidate");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Vignan University::Vadlamudi</title>
</head>
<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<meta name="viewport" content="width=device-width, initial-scale=1.0">



<style>
    .stylish-text {
    font-size: 48px; /* Font size */
    color: #ff6600; /* Text color */
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Text shadow */
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* Font family */
    background-color: lightcyan; /* Background color */
    padding: 10px; /* Padding */
    border-radius: 10px; /* Rounded corners */
    width: 160vb;
    margin-left: 12%;
    justify-content: center;
    animation: pulse 2s infinite; /* Apply animation */
}

@keyframes pulse {
    0% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.2); /* Scale up to 1.2x size */
    }
    100% {
        transform: scale(1);
    }
}
    #pieChart{
        margin-left: 25%;
    margin-top: 3%;
    }
    h3{
        text-shadow: #FFFF33;
        size: 60vh;
        
    }
    body {
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
            animation: joy 8s linear infinite;
            /* background-image: linear-gradient(135deg, #fceabb 10%, #f8b500 100%); */
            background-image: linear-gradient(to left,#FFFF33, lightblue );
            background-size: 200% 200%;
        }

        @keyframes joy {
            0% {
                background-position: 0% 20%;
            }
            50% {
                background-position: 50% 25%;
            }
            100%{
                background-position: 100% 50%;
            }
        }
    .box {
          
            top: 35%; 
            margin-left: 25%;
            border: 1px solid #ccc;
            padding: 10px;
            background-color: lightsteelblue;
            border-radius: 5px;
            box-shadow: 15px 10px 10px lightseagreen;
            width: 40%;
            height: 5%;
            

        }
        
        @media  (max-width: 500px) {
            #give   {

            margin-left: 20%;
            margin-top: 5%;
            width:30vb;
            height: 25%;

          }
          .stylish-text{
            width: 40vb;
            height: 10vh;
            font-size: 36px;
          }

  /* #pieChart {

    margin-left:200px;
    height: 20vh;
    width: 20vb;


  } */
   .pie1{
    justify-content: center;
    
    height: 200px;
    width: 40px;

  } 
  h3{
    width: 53vb;
  }

  
}

/* @media only screen and (min-width: 768px) {
    #pieChart {

margin-left: 70%;
margin-top: 15%;
}
.box {


margin-top: 10%;
width: 90%;
}
} */
#give{
    margin-left: 30%;
    margin-top: 2%;
    margin-right: 30%;

}
#image{
    margin-left: 30%;
    margin-top: 2%;
    margin-right: 30%;
}
#pieChart{
    position: relative;
    left:10%;

    height: 50vh;
    width: 50vb;
}
.logout{
    position: absolute;
     text-decoration:none; 

     top:10px;
      right:10px;
}


        </style>

    <h3 class="text-center mt-5 stylish-text">Explore Here</h3>
          
   
    <button type="button" onclick="window.location.href='details2.php'" class="btn btn-primary"  value="give opinion" id="give" style="background-color: orange;"><b>Fill your Details</b></button>
    <button type="button" onclick="window.location.href='review.php'" class="btn btn-white" value="give opinion" id="give" style="background-color: white;color-blue"><div style="color:blue;"><b>Add Attribute</b></div></button>
    <button type="button" onclick="window.location.href='logout.php'" class="btn bg-success" value="give opinion" id="give" style="background-color: white;color-white"><div style="color:white;"><b>Logout</b></div></button><br>

    <!-- <form>
    <div class="bg-primary justify-content-center ml-120px">
                                <button type="button" class="btn btn-primary justify-content-center">Logout</button>
    </div>
</form> -->

    <!-- <button type="button" onclick="window.location.href='form2.php'" class="btn btn-success" value="upload" id="image" >Upload Photo</button> -->

  
    </div>
       
  
    <br><br>
       <div class="pie1"> <canvas  id="pieChart" ></canvas><div>
    

    <script>
        
        
document.addEventListener("DOMContentLoaded", function () {

    fetch('getData.php')
        .then(response => response.json())
        .then(data => {
           
            const partiallySubmittedCount = data.partiallySubmittedCount;
            const fullySubmittedCount = data.fullySubmittedCount;

           
            const ctx = document.getElementById('pieChart').getContext('2d');
            
            const pieChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Partial Submissions', 'Full Submissions'],
                    datasets: [{
                        data: [partiallySubmittedCount, fullySubmittedCount],
                        backgroundColor: ['#FF5733', '#36A2EB'], // You can customize the colors
                    }],
                },
                options: {
                    // pieChart.style.right="300px"
                    responsive: false,
                },
            });
        })
        .catch(error => console.error('Error:', error));
});



</script>
</body>
</html>
