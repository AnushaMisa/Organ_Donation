<?php
	require('db.php');
	include("admin_auth.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Donors</title>
<link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style type="text/css">
	body {
		background-image: url('img/bg5.jpeg');										
		background-position: midle;
		background-repeat: no-repeat;
		background-size: 100%;
		font-family: 'times', sans-serif;
		background-color: #CCFFCC;
	}
</style>
</head>

<body>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
		<!-- Brand/logo height: 100%; -->
		<a class="navbar-brand" href="index.html"><img src="img/blood3.jpeg" alt="logo" style="height:70px;"></a>
  
		<!-- Links -->
		<ul class="navbar-nav">
			<li class='nav-item'>
				<a class='nav-link' href='index.html'>Home</a>
			</li>
			<li class='nav-item'>
				<a class='nav-link' href='donors.php'>Donors</a>
			</li>
			
			<li class='nav-item'>
				<a class='nav-link' href='org_bank.php'>Organ Bank</a>
			</li>
			<li class='nav-item'>
				<a class='nav-link' href='hospitals_list.php'>Hospitals</a>
			</li>
			<li class='nav-item'>
				<a class='nav-link' href='requests.php'>Organ Requests</a>
			</li>
			<li class='nav-item'>
				<a class='nav-link' href='transactions.php'>Organ Transaction</a>
			</li>
			<li class='nav-item'>
				<a class='nav-link' href='register.php'>Goto Registration</a>
			</li>
			<li class='nav-item'>
				<a class='nav-link' href='admin_logout.php'>LogOut</a>
			</li>
		</ul>
	</nav>
	
	
	<form action="" method="GET">
				<div class="container">    
					<center><br />
					<h2 style="color: #660099"><b>Organ Donors :</b></h2><br />
					<table class="table">
						<thead>
							<tr>
								<th>Id</th>
								<th>Name</th>						
								<th>MobileNo</th>
								<th>Email</th>	
								<th>Address</th>
								<th>Blood Type</th>	
								<th>Gender</th>
								<th>Organ</th>
								<th>Family</th>	
								<th>Family_Phno</th>		
								<th>Donated</th>
							</tr>
							</thead>
							<tbody>
								
									<?php 
										
										$username =$_SESSION['username'];
											
											//$username=$user;
										require('db.php');
										$sql="CALL `get_donors`();";
										$result = mysqli_query($con,$sql) or die(mysql_error());
										$rows = mysqli_num_rows($result);
										
										if($rows>0)
										{	
											$x=0;
											while ($row=mysqli_fetch_row($result))
											{
											$i=0;
											echo "<tr>";
											while ($i<11)
											{
												
													echo "<td>$row[$i]</td>";
												
												$i++;
											}
											echo "<td><div class='form-check'><input type='checkbox' class='form-check-input' id='check$x'			 													name='check_list' value='$row[0]'></div></td>";
											$x++;
											echo "</tr>";
											}	
										}
									
									
									
							echo"</tr>
   
							</tbody>
					</table>
					</center>
					<br>
					<center>";
					echo "<input type='submit' name='select' class='btn btn-formal' value='Select' style='margin:10px' />";
					if(isset($_REQUEST['select']))
					{
						$did = $_GET['check_list'];				
					echo "<a href='transport.php?did=$did'><input type='button' class='btn btn-success' name='receive' value='Receive' style='margin:10px' />	</a>";}	?>
					<button class='btn btn-info' onClick="myFunction()">Print this page</button>

					<script>
						function myFunction() 
						{
							window.print();
						}
					</script>
					
					</center>
				</div>
			</form>

</body>
</html>