<?php

require_once ('process/database.php');
$sql = "SELECT * FROM `customers` WHERE 1";

//echo "$sql";
$result = mysqli_query($conn, $sql);


 $id = (isset($_GET['id']) ? $_GET['id'] : ''); 
  $sql = "SELECT * from `customers` WHERE id=$id";
  $result = mysqli_query($conn, $sql);

 
  if($result){
  while($res = mysqli_fetch_assoc($result)){
  $firstname = $res['firstName'];
  $lastname = $res['lastName'];
  $email = $res['email'];
  $contact = $res['contact'];
  $balance = $res['balance'];
  $gender = $res['gender'];
  $birthday = $res['birthday'];
  $pic = $res['pic'];
}
}

?>


<html>
<head>
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>
<body>
  <header>
    <nav>
      <h1>Prijith Ayure</h1>
      <ul id="navli">
        <li><a class="homeblack" href="index.php">HOME</a></li>
        <li><a class="homered" href="myprofile.php?id=<?php echo $id?>"">My Profile</a></li>
      </ul>
    </nav>
  </header>
  
  <div class="divider"></div>
  
  <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">My Info</h2>
                    <form method="POST" action="myprofileup.php?id=<?php echo $id?>" >

                        <div class="input-group">
                          <img src="process/<?php echo $pic;?>" height = 150px width = 150px>
                        </div>


                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                  <p>First Name</p>
                                     <input class="input--style-1" type="text" name="firstName" value="<?php echo $firstname;?>" readonly >
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                  <p>Last Name</p>
                                    <input class="input--style-1" type="text" name="lastName" value="<?php echo $lastname;?>" readonly>
                                </div>
                            </div>
                        </div>





                        <div class="input-group">
                          <p>Email</p>
                            <input class="input--style-1" type="email"  name="email" value="<?php echo $email;?>" readonly>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                  <p>Date of Birth</p>
                                    <input class="input--style-1" type="text" name="birthday" value="<?php echo $birthday;?>" readonly>
                                   
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                  <p>Gender</p>
                                  <input class="input--style-1" type="text" name="gender" value="<?php echo $gender;?>" readonly>
                                </div>
                            </div>
                        </div>
                        
                        <div class="input-group">
                          <p>Contact Number</p>
                            <input class="input--style-1" type="number" name="contact" value="<?php echo $contact;?>" readonly>
                        </div>

                        
                         <div class="input-group">
                          <p>Balance</p>
                            <input class="input--style-1" type="text"  name="balance" value="<?php echo $balance;?> Rs" readonly>
                        </div>

                        <input type="hidden" name="id" id="textField" value="<?php echo $id;?>" required="required"><br><br>
                       
                    </form>
                    <br>
                    <button class="btn btn--radius btn--green" onclick="window.location.href = 'transfer.php?id=<?php echo $id?>';">Transfer Amount</button>
                    <br><br>
                    <button class="btn btn--radius btn--green" onclick="window.location.href = 'viewcus.php'">Go Back</button>

                </div>
            </div>
        </div>
    </div>

</body>
</html>
