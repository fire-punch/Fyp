<?php
require_once('conn.php');
$conn = getDBconnection();
session_start();
if(!isset($_SESSION['staffID']))

{
    echo "<script type='text/javascript'>alert('please login');parent.location.href='Stafflogin.php';</script>";
}

    $CheckID=$_SESSION['staffID'];
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

     <script src="js/cs.js"></script>
     <script src="js/show.js"></script>

    
  <title>Account Page</title>
  <link rel="stylesheet" href="css/loading.css">
  <style>
body {
  background-image: url('img/team1.jpeg');
  background-repeat:no-repeat;
  background-size: 100% 100%;

}
 #MID {
  padding: 50px;
  display: none;
}
 #SID {
  padding: 50px;
  display: none;
}
</style>

</head>

<body onload="startTime()">

    <nav class="navbar navbar-dark bg-dark">
      <div class="container-fluid">
        <!--user information button-->
        <a class="navbar-brand" id=name style="align-content: center" href="#" data-bs-toggle="modal" data-bs-target="#userinfo">
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
          </svg>

          <?php
        $sql1 = "select * from staffaccount SA,positionstatus PS where  SA.StaffID=$CheckID and PS.positionID = SA.Position";

        $rs1 = mysqli_query($conn,$sql1) or die('<div class="error">SQL command fails'.mysqli_error($conn)."</div>");
        $rc1 = mysqli_fetch_assoc($rs1);
        extract($rc1);
        echo "
          <label for=\"customer\" class=\"col-form-label\" style=\"color: white;\" name=\"StaffName\">hi!$Name</label>
          
        </a>
        <!--user information button end-->


        <!--user information-->
        <div class=\"modal fade\" id=\"userinfo\" tabindex=\"-1\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
          <div class=\"modal-dialog\">
            <div class=\"modal-content\">
              <div class=\"modal-header\">
                <h5 class=\"modal-title\" id=\"exampleModalLabel\">User information</h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
              </div>




              <div class=\"row m-l-0 m-r-0\">
                <div class=\"col-sm-4  user-profile\">
                  <div class=\"card-block text-center\">
                 
                    <h6 class=\"f-w-600\">$Name</h6>
                    <p>$positionName</p> <i class=\" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16\"></i>
                  </div>
                </div>
                <div class=\"col-sm-8\">
                  <div class=\"card-block\">
                    <h6 class=\"m-b-20 p-b-5 b-b-default f-w-600\">Information</h6>
                    <div class=\"row\">
                       <div class=\"col-sm-6\">
                        <p class=\"m-b-10 f-w-600\">StaffID</p>
                        <h6 class=\"text-muted f-w-400\" Name=\"StaffID\">$StaffID</h6>
                      </div>
                      <div class=\"col-sm-6\">
                        <p class=\"m-b-10 f-w-600\">Phone</p>
                        <h6 class=\"text-muted f-w-400\">$Tel</h6>
                      </div>
                    </div>
                    <div class=\"row\">

                    <div class=\"col-sm-7\">
                        <p class=\"m-b-10 f-w-600\">Email</p>
                        <h6 class=\"text-muted f-w-400\">$Email</h6>
                      </div>
                      <div class=\"col-sm-6\">
                        <p class=\"m-b-10 f-w-600\">branch</p>
                        <h6 class=\"text-muted f-w-400\">$branch</h6>
                      </div>
                     
                    </div>
                   
                  </div>
                </div>



              </div>


            </div>
          </div>

           ";
        ?>
        </div>


        <!--user information end -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link " aria-current="page" href="MainPage.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="checkposition.php?movieinfo">Movie info</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="checkposition.php?houseinfo">House info</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="checkposition.php?account">Account management</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ScanPage.php">Sell mode</a>
            </li>
            <li class="nav-item">
              <form>
                <a href="Stafflogout.php?logout">
                  <button type="button" class="btn btn-outline-danger">Log out
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                      <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                    </svg>

                  </button>
                </a>
              </form>
            </li>

          </ul>
        </div>
      </div>
    </nav>
    <br>

                 <div class="col-6"  style="margin-left:auto" ;> 
    <div class="card"style="width: 23rem;" >
 
  <div class="card-body">
   
   <div class="d-grid gap-2">
       <h2> Staff Account:</h2>
            
            <button class="btn btn-primary" type="button" onclick="Staff()">Staff Account
            </button>
    
           
           
       <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#PModal"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
                      <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z" />
                      <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z" />
                      <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z" />
                  </svg>  Punch in Record</button>

</div>
      <!--Punch in Modal -->
<div class="modal fade" id="PModal" tabindex="-1" aria-labelledby="PModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Punch in Record</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="row g-4" method="post">
  <div class="col-8">
                  <label  class="form-label">Please input Staff ID:</label>
                 <input type="text" class="form-control" name="staff">              
                 <br>
                 <label  class="form-label">Please  input Start Date:</label>
                 <input type="date" class="form-control" name="txtStartDate">
                 <br>
                  <label  class="form-label">Please  input End Date:</label>
                 <input type="date"  class="form-control" name="txtEndDate">
                <br>
                 <button class="btn btn-primary"  name="search" type="submit" >Search</button>  
                 <hr>         
                 <table class="table table-striped">
                        <thead >
                        <tr>
                            <th scope="col">StaffID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Date</th>
                            <th scope="col">Check In time</th>
                            <th scope="col">Check Out time</th>
                           
                          
                        </tr>
                        </thead>
                

                
                      <?php
                  
                if (isset($_POST['search'])){
                    $staff=$_POST['staff'];
                    $txtStartDate=$_POST['txtStartDate'];
                    $txtEndDate=$_POST['txtEndDate'];
                    
                    $conn = getDBconnection();

                    $SQL = $sql = "Select  * from punchin PI , staffaccount SA where  PI.StaffID='$staff'  and PI.StaffID= SA.StaffID and PI.PunchDate Between '$txtStartDate' and '$txtEndDate' order by PI.PunchDate";
                    $rs1 = mysqli_query($conn, $sql) or die('<div class="error">SQL command fails' . mysqli_error($conn) . "</div>");

                    while ($rc1 = mysqli_fetch_assoc($rs1)) {
                        extract($rc1);
                
                    echo "
            
                    <tr>
                        <td>$StaffID</td>
                        <td>$Name</td>
                        <td>$PunchDate</td>
                        <td>$CheckIntime</td>
                        <td>$CheckOuttime</td>   
                        </tr>
                      
                  ";
                                
                        
                        
                    }
                    mysqli_free_result($rs1);
                    mysqli_close($conn);
                }
                ?>    
                    </table>
                
            
                

  </div>
 </form>

   

  

        
      </div>
    
    </div>
  </div>
</div>
  </div>
</div>
                     </div>
    <br>
             

        <br>
  <!--loading -->
  <div class="loader-wrapper">
    <span class="loader"><span class="loader-inner"></span></span>
  </div>
  <script src="js/loading.js"></script>
  <!--loading end-->

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>
