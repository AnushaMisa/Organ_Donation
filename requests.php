<?php
	require('db.php');
	include("admin_auth.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Organ Requests</title>
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
	
	<form action="" method="get">
				<div class="container">    
					<center><br />
					<h2 style="color: #660099"><b>Organ Requests Registered :</b></h2><br />
					<div class="MainTable">  
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Id</th>
								<th>Organ</th>
								<th>Blood Type</th>
								<th>Name</th>						
								<th>MobileNo</th>
							</tr>
							</thead>
							<tbody>
								
									<?php 
										
										$username =$_SESSION['username'];				
											//$username=$user;
										require('db.php');
										$sql="SELECT * FROM `request`";
										$result = mysqli_query($con,$sql) or die(mysql_error());
										$rows = mysqli_num_rows($result);
										
										if($rows>0)
										{	
											$x=0;
											while ($row=mysqli_fetch_row($result))
											{
											$i=0;
											echo "<tr>";
											while ($i<5)
											{
												echo "<td>$row[$i]</td>";
												$i++;
											}
											echo "<td><div class='form-check'><input type='checkbox' class='form-check-input' id='check$x'			 													name='check_list[]' value='$row[0]'></div></td>";
											$x++;
											echo "</tr>";
											}	
										}											
									?>
								</tr>
							</tbody>
					</table>
				</div>
					</center>
					<br>
					<center>				
					<input type='submit' class='btn btn-danger' name='delete' value='Delete' style='margin:10px'>			
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
<?php	
	if(isset($_GET['delete']))
	{
		//to run PHP script on submit
		if(!empty($_GET['check_list']))
		{
			// Loop to store and display values of individual checked checkbox.
			foreach($_GET['check_list'] as $selected)
			{
				//echo $selected."</br>";
				$sql="DELETE FROM `request` WHERE id='$selected'";
		
				if(mysqli_query($con,$sql))
				{
					//echo "deleted $username data";
					echo "<div class='alert alert-success'>
							<strong>Deleted!</strong> Successfully..!!.
							</div>";
				}
				else
				{
					echo (mysqli_error($con));
				}
			}
		}
		else
		{
			echo "<div class='alert alert-warning'>
				<strong>Warning!</strong> No data selected. Pleas select any.
				</div>";
			
		}

		exit();
	}
?>
