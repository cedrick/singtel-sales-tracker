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
		
		.logout {
			text-align: right; 
			
		}
		
		a {
			font-size: 12px;
			text-decoration: none;
			color: #992D09;
			font-weight: 900;
		}
	</style>
</head>
<body>
	<div class="content">
		<div class="logout"><a href="<?php echo base_url(); ?>login/logout">LOGOUT</a></div>
		<div class="header">SingTel Sales Tracker <span>{Manager} - {Team Stats}</span></div>
		<div class="body">
			<div class="section">
				<h3>Team Stats</h3>
				<table width="300">
					<tr>
						<td width="100">Date:</td>
						<td><?php echo $data['date'];?></td>
					</tr>
					<tr>
						<td>Total Sales:</td>
						<td><?php echo $data['team_stats']->num_rows();?></td>
					</tr>
				</table>
			</div>
			<div class="section">
				<form action="" method="post">
				<h3>Change Date:</h3>
				<table>
					<tr>
						<td></td>
						<td><input type="text" name="mdate" id="mdate" onclick="fPopCalendar('mdate');" value="<?php echo $data['date'];?>" /><input type="submit" name="go" id="go" value="GO" " /></td>
					</tr>
				</table>
				</form>
			</div>
			<div class="section">
				<h3>Agent Stats</h3>
				<table width="50%" cellpadding="4" border="1" cellspacing="0">
					<thead>
						<tr>
							<td>Agent ID</td>
							<td>Total Sales</td>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($data['agent_stats']->result() as $row): ?>
						<tr>
							<td><a href="<?php echo base_url(); ?>manager/view_sales/<?php echo $row->username;?>/<?php echo $data['date_unix'];?>" target="_blank"><?php echo $row->username;?></a></td>
							<td><?php echo $row->total;?></td>
						</tr>
						<?php endforeach;?>
					</tbody>
				</table>
			</div>
			<div class="section">
				<h3>Campaign Stats</h3>
				<table width="50%" cellpadding="4" border="1" cellspacing="0">
					<thead>
						<tr>
							<td>Campaign</td>
							<td>Total Sales</td>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($data['campaign_stats']->result() as $row): ?>
						<tr>
							<td><?php echo $row->campaign;?></td>
							<td><?php echo $this->Manager_model->get_campaign_breakdown($data['date_unix'], $row->campaign); ?>
							</td>
						</tr>
						<?php endforeach;?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>