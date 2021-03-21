<?php 
	require_once ('process/database.php');
	$sql3 = "SELECT * FROM `transactionhistroey`";
	$result3 = mysqli_query($conn, $sql3);

?>


<html>
<head>
	<title>Basic Banking System</title>
	<link rel="stylesheet" type="text/css" href="styleemplogin.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster|Montserrat" rel="stylesheet">
</head>
<body>
	
	<header>
		<nav>
			<h1>Prijith Ayure</h1>
			<ul id="navli">
				<li><a class="homeblack" href="index.php">HOME</a></li>
				<li><a class="homeblack" href="viewcus.php">VIEW CUSTOMERS</a></li>
				<li><a class="homered" href="transaction.php">TRANSACTION</a></li>
			</ul>
		</nav>
	</header>
	 
	<div class="divider"></div>
	<div id="divimg">
	<h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Transaction History</h2>

	<div>
		
    	<table>
			<tr>
			<th align = "center">Transaction ID.</th>
				<th align = "center">Sender Name</th>
				<th align = "center">Receiver Name</th>
				<th align = "center">Transaction Amount</th>
				
			</tr>

			<?php
				while ($customers = mysqli_fetch_assoc($result3)) 
				{
					
					echo "<tr>";
					
					echo "<td>".$customers['transactionid']."</td>";
					echo "<td>".$customers['sender']."</td>";
					echo "<td>".$customers['receiver']."</td>";
					echo "<td>".$customers['amount']." Rs</td>";
					
					echo "</tr>";
				}

			?>

		</table>
  
<br>
<br>
<br>
<br>
<br>


</div>
</div>
</body>
</html>