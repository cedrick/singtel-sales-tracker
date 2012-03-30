<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Singtel Sales Tracker</title>
	<link type="text/css" href="<?php echo base_url() ?>calendar/cwcalendar.css" rel="stylesheet" />
	<script type="text/javascript" src="<?php echo base_url() ?>calendar/calendar.js"></script> 
	<link rel="shortcut icon" href="<?php echo base_url(); ?>template/images/favicon.ico" type="image/x-icon">
	<style type="text/css">
		body {
			width: 100%;
			font-family: sans-serif;
			font-size: 14px;
		}
		.content {
			width: 600px;
			margin: 150px auto;
		}
		.header {
			font-size: 24px;
			border-bottom: 1px solid BLACK;
			margin-bottom: 30px;
		}	
		
		.header span{
			float: right;
			font-size: 16px;
		}
		
		.body h3 {
			color: #3399FF;
		}
		
		.section {
			margin-bottom: 20px;
		}
		
		.section h3 {
			color: #3399FF;
			margin: 3px;
		}
		
		.section table {
			margin: 0 0 0 30px;
		}
		
		thead tr {
			background-color: #C8C8C8;
			font-weight: 900;
		}
	</style>
</head>
<body>
	<div class="content">
		<div class="header">SingTel Sales Tracker <span>{Login}</span></div>
		<div class="body">
			<div class="section">
				<form action="" method="post">
				<h3>Username/Agent ID:</h3>
				<table>
					<tr>
						<td><input type="text" name="username"  /><input type="submit" name="login" value="Login" /></td>
					</tr>
					<tr>
						<td><?php echo validation_errors(); ?><?php echo isset($error) ?  $error : ''; ?></td>
					</tr>
				</table>
				</form>
			</div>
		</div>
	</div>
</body>
</html>