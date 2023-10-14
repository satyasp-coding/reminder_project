<?php
	session_start();
	function get_office_attendance_count(){
		$connection = mysqli_connect("localhost", "root", "");
		$db = mysqli_select_db($connection, "tms");
		$office_attendance_count = 0;

		$query = "SELECT COUNT(*) as office_attendance_count FROM attendance WHERE student_id = '$_SESSION[id]'";
		$query_run = mysqli_query($connection, $query);

		while ($row = mysqli_fetch_assoc($query_run)){
			$office_attendance_count = $row['office_attendance_count'];
		}
		return $office_attendance_count;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">Task Reminder System(TMS)</a>
			</div>
            <div class="navbar-header">
				<a class="navbar-brand" href="add.php">Add Task Reminder</a>
			</div>

			<font style="color: white"><span><strong>Welcome: <?php echo $_SESSION['name'];?></strong></span></font>
			<font style="color: white"><span><strong>Email: <?php echo $_SESSION['email'];?></strong></font>
		    <ul class="nav navbar-nav navbar-right">
		      <li class="nav-item dropdown">
	        	<a class="nav-link dropdown-toggle" data-toggle="dropdown">My Profile </a>
	        	<div class="dropdown-menu">
	        		<a class="dropdown-item" href="view_profile.php">View Profile</a>
	        		<div class="dropdown-divider"></div>
	        		<a class a="dropdown-item" href="change_password.php">Change Password</a>
	        	</div>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="logout.php">Logout</a>
		      </li>
		    </ul>
		</div>
	</nav><br>
	<span><marquee>Set up a task reminder system to manage daily tasks</marquee></span><br><br>
	<div class="row">
		<div class="col-md-3" style="margin: 25px">
			<div class="card bg-light" style="width: 300px">
				<div class="card-header">OFFICE ATTENDANCE</div>
				<div class="card-body">
					<p class="card-text">No of attendance <?php echo get_office_attendance_count();?></p>
				</div>
			</div>
		</div>
		<div class="col-md-3"></div>
		<div class="col-md-3"></div>
	</div>
</body>
</html>
