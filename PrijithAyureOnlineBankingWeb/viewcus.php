<?php
require_once ('process/database.php');
$sql = "SELECT * from `customers`";
$result = mysqli_query($conn, $sql);

?>


<html>
<head>
	<link rel="stylesheet" type="text/css" href="styleview.css">
</head>
<body>
	<header>
		<nav>
		<h1>Prijith Ayure</h1>
			<ul id="navli">
				<li><a class="homeblack" href="index.php">HOME</a></li>
				<li><a class="homered" href="viewcus.php">VIEW CUSTOMERS</a></li>
				<li><a class="homeblack" href="transaction.php">TRANSACTION</a></li>
			</ul>
		</nav>
	</header>
	
	<div class="divider"></div>

		<table>
			<tr>

				<th align = "center">Cus. ID</th>
				<th align = "center">Picture</th>
				<th align = "center">Name</th>
				<th align = "center">Email</th>
				<th align = "center">Date of Birth</th>
				<th align = "center">Gender</th>
				<th align = "center">Contact</th>
				<th align = "center">Current Balance</th>

			</tr>

			<?php
				while ($customers = mysqli_fetch_assoc($result)) {
					$cusid = $customers['id'];
					$lg1="<a href='myprofile.php?id=$cusid'>"; 

					echo "<tr>";
					echo "<td>" ; echo "$lg1" ;echo $customers['id']; echo "</td>";
					echo "<td><img src='process/".$customers['pic']."' height = 60px width = 60px></td>";
					echo "<td>";echo $customers['firstName']; echo("\n"); echo $customers['lastName']; echo "</td>";
					echo "<td>"; echo $customers['email']; echo "</td>";
					echo "<td>"; echo $customers['birthday']; echo "</td>";
					echo "<td>"; echo $customers['gender']; echo "</td>";
					echo "<td>"; echo $customers['contact']; echo "</td>";
					echo "<td>"; echo $customers['balance']; echo "/- </td>";

				
				}


			?>

		</table>
		
	
</body>
</html>