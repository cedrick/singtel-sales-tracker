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
		<div class="header">SingTel Sales Tracker <span>{Customer Record}</span></div>
		<div class="body">
			<div class="section">
				<h3>Customer Info</h3>
				<?php $row = $data['info']->row();?>
				<form action="" method="post">
					<table>
						<tr>
							<td>Campaign:</td>
							<td><strong><?php echo $row->campaign;?></strong></td>
						</tr>
						<tr>
							<td width="160">Phone:</td>
							<td><?php echo $row->phone_no;?></td>
						</tr>
						<tr>
							<td>Application Date:</td>
							<td><?php echo $row->appt_date;?></td>
						</tr>
						<tr>
							<td>Applicant Name:</td>
							<td><input type="text" name="app_name" value="<?php echo $row->app_name;?>" /> </td>
						</tr>
						<tr>
							<td>Activation Date:</td>
							<td><input type="text" name="actv_date" value="<?php echo $row->actv_date;?>" /></td>
						</tr>
						<tr>
							<td>Appointment Time:</td>
							<td><input type="text" name="appt_time" value="<?php echo $row->appt_time;?>" /></td>
						</tr>
						<tr>
							<td>DEL Number:</td>
							<td><input type="text" name="ADSL_NO" value="<?php echo $row->ADSL_NO;?>" /></td>
						</tr>
						<tr>
							<td>Mobile Number:</td>
							<td><input type="text" name="mobile_no" value="<?php echo $row->mobile_no;?>" /></td>
						</tr>
						<tr>
							<td>Installation Address:</td>
							<td><input type="text" name="inst_add" value="<?php echo $row->inst_add;?>" /></td>
						</tr>
						<tr>
							<td>NRIC:</td>
							<td><input type="text" name="NRIC" value="<?php echo $row->NRIC;?>" /></td>
						</tr>
						<tr>
							<td>Secondary Contact:</td>
							<td><input type="text" name="NRIC" value="<?php echo $row->snd_contact;?>" /></td>
						</tr>
						<tr>
							<?php 
								echo form_open();
									$prod_officer = array(		'' => '',
									'MioTV with 6 months contract' => 'MioTV with 6 months contract',
									'Astro Pack with 12 months contract; 50% off for 3 months' => 'Astro Pack with 12 months contract; 50% off for 3 months',
									'Bharata Pack with 12 months contract; 50% off for 3 months' => 'Bharata Pack with 12 months contract; 50% off for 3 months',
									'Sports Pack with 12 months contract; 50% off for 6 months' => 'Sports Pack with 12 months contract; 50% off for 6 months',
									'Ultimate Pack with 12 months contract; 50% off for 3 months' => 'Ultimate Pack with 12 months contract; 50% off for 3 months'
									);
									$action_prod_officer = isset($_POST['prod_officer']) ? $_POST['prod_officer'] : (isset($row->prod_officer ) ? $row->prod_officer  : '');//retain the value of the dropdown after submitting
						
								echo form_close();
							?>
							<td>Product Officer:</td>
							<td><?php echo form_dropdown('prod_officer',$prod_officer,$action_prod_officer); ?></td>
						</tr>
						<tr>
							<td>Additional Notes:</td>
							<td><textarea name="remarks" rows="6" cols="45"><?php echo $row->notes;?></textarea></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" name="update" value="Update" /> </td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
