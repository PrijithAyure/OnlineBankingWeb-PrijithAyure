<?php

require_once ('process/database.php');

$sql = "SELECT * FROM `customers` WHERE 1";


$result = mysqli_query($conn, $sql);


if(isset($_POST['update']))
{
  $credit="";
  $id = $_POST['id'];
  $cname = $_POST['cname'];
  $balance = $_POST['balance'];
  $dbalance = $_POST['dbalance'];
  $id1 = $_POST['id1'];

      if($balance>=$dbalance && $dbalance > 0)
      {

        
          //Credit Account
          $result3 = mysqli_query($conn,"select customers.balance from customers WHERE id = $id1");
            if($result3){
              while($res = mysqli_fetch_assoc($result3)){
              $balancet = $res['balance'];
            }
            }
              $newcbalance = $balancet + $dbalance;
                $sql2 = "UPDATE `customers` SET `balance`='$newcbalance' WHERE id = $id1";
                mysqli_query($conn, $sql2);
        

          //Debit Account
        

          $result = mysqli_query($conn,"select customers.balance from customers WHERE id = $id");
          $customers = mysqli_fetch_assoc($result);

          if($balance == $customers['balance']){
            $newbalance = $balance - $dbalance;
            $sql = "UPDATE `customers` SET `balance`='$newbalance' WHERE id = $id";
            mysqli_query($conn, $sql);
             echo ("<SCRIPT LANGUAGE='JavaScript'>
                  window.alert('Succesfully Transfered')
                window.location.href='viewcus.php';</SCRIPT>"); 
          }

          else{
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                      window.alert('Failed to Transfer')
                      window.location.href='javascript:history.go(-1)';
                      </SCRIPT>");
              }

          //Transaction history
            $sql4 = "SELECT * FROM `transactionhistroey`";
            $result4 = mysqli_query($conn, $sql4);
            $result5 = mysqli_query($conn,"SELECT `firstName`,`lastName` from `customers` WHERE id = $id");
            if($result5){
              while($res = mysqli_fetch_assoc($result5)){
              $firstName = $res['firstName'];
              $lastName = $res['lastName'];
            }
          }
            $result6 = mysqli_query($conn,"SELECT `firstName`,`lastName` from `customers` WHERE id = $id1");
            if($result6){
              while($res = mysqli_fetch_assoc($result6)){
                $firstName1 = $res['firstName'];
                $lastName1 = $res['lastName'];
            }
          }
            $sqlS = "INSERT INTO `transactionhistroey`(`sender`, `receiver`, `amount`) VALUES ('$firstName $lastName','$firstName1 $lastName1','$dbalance')";
            $result7 = mysqli_query($conn, $sqlS);


      }



      else{
              echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Insufficient/Incorrect Amount ')
                    window.location.href='javascript:history.go(-1)';
                    </SCRIPT>");
      }
      
      
}
?>
<?php
  $id = (isset($_GET['id']) ? $_GET['id'] : '');
  $sql = "SELECT * from `customers` WHERE id=$id";
  $result = mysqli_query($conn, $sql);
  if($result){
  while($res = mysqli_fetch_assoc($result)){
  $balance = $res['balance'];
  // echo "$balance";
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
                    <h2 class="title">Transfer Amount</h2>
                    <form id = "registration" action="transfer.php" method="POST">
                            <div class="col-2">
                              <div class="input-group">
                                <div class="rs-select2 js-select-simple select--no-search">
                                <p>Select Beneficiary Account</p>
                                <select name='cname'>
                                <option disabled="disabled" selected="selected">Select Account</option>
                                <?php
                                $sql1 = "SELECT `firstName`, `lastName` , `id` FROM customers WHERE id!=$id";
                                $result1 = mysqli_query($conn,$sql1);
                                while ($row = mysqli_fetch_array($result1)) { 
                                    echo "<option value='" . $row['firstName'] . " " . $row['lastName'] . " - " . $row['id'] . "'>" . $row['firstName'] . " " . $row['lastName'] . " - Cus.Id No." . $row['id'] . "</option>";
                                }
                                ?>
                                </select>
                                <div class="select-dropdown"></div>
                                </div>
                            </div>
                            </div>

                              <div class="col-2">
                                <div class="input-group">
                                  <p>Beneficiary Account Number</p>
                                     <input class="input--style-1" type="number" name="id1" placeholder="Enter Cus.Id No." required >
                                </div>
                            </div>
                            
                            <div class="col-2">
                                <div class="input-group">
                                  <p>Current Balance(Your A/c)</p>
                                     <input class="input--style-1" type="text" name="balance"  value="<?php echo $balance;?>" readonly >
                                </div>
                            </div>

                             <div class="col-2">
                                <div class="input-group">
                                  <p>Amount</p>
                                     <input class="input--style-1" type="number" name = "dbalance" required >
                                </div>
                            </div>

                            
                        

                        <input type="hidden" name="id" id="textField" value="<?php echo $id;?>" required="required"><br><br>
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit" name="update">Transfer</button>
                        </div>
                        
                    </form>
                    <br>
                      <button class="btn btn--radius btn--green" type="submit" name="back" onClick="javascript:history.go(-1)">Go Back</button>
                    
            </div>
        </div>
    </div>


</body>
</html>
