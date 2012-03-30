
<?php 

	echo form_open(base_url().'user/add_form'); 

	$app_name = array(
				'name' => 'app_name',
				'id' => 'app_name',
				'value' => isset($_POST['app_name'])?$_POST['app_name']:'',
				'size'   => '70'
				);
				
	$nric_fin = array(
				'name' => 'nric_fin',
				'id' => 'nric_fin',
				'value' => isset($_POST['nric_fin'])?$_POST['nric_fin']:''
				);
				
				
	$b_day = array(
				'name' => 'b_day',
				'id' => 'b_day',
				'value' =>  isset($_POST['b_day'])?$_POST['b_day']:''
				);
				
	$issue_date = array(
				'name' => 'issue_date',
				'id' => 'issue_date',
				'value' => isset($_POST['issue_date'])?$_POST['issue_date']:''
				);
				
	$iptv_no = array(
				'name' => 'iptv_no',
				'id' => 'iptv_no',
				'value' => isset($_POST['iptv_no'])?$_POST['iptv_no']:''
				);
				
	$telephone_h = array(
				'name' => 'telephone_h',
				'id' => 'telephone_h',
				'value' => isset($_POST['telephone_h'])?$_POST['telephone_h']:''
				);
				
	$telephone_m = array(
				'name' => 'telephone_m',
				'id' => 'telephone_m',
				'value' => isset($_POST['telephone_m'])?$_POST['telephone_m']:''
				);
				
	$approval_code = array(
				'name' => 'approval_code',
				'id' => 'approval_code',
				'value' => isset($_POST['approval_code'])?$_POST['approval_code']:''
				);
				
	$dealer_id = array(
				'name' => 'dealer_id',
				'id' => 'dealer_id',
				'value' => isset($_POST['dealer_id'])?$_POST['dealer_id']:''
				);
	
	$sales_man = array(
				'name' => 'sales_man',
				'id' => 'sales_man',
				'value' => isset($_POST['sales_man'])?$_POST['sales_man']:''
				);
				
	$sales_name = array(
				'name' => 'sales_name',
				'id' => 'sales_name',
				'value' => isset($_POST['sales_name'])?$_POST['sales_name']:''
				);
				
	$e_pack = array(
						    'name'        => 'e_pack',
						    'id'          => 'e_pack',
						    'value'       => 'e_pack ',
						    'checked'     => FALSE,
						    'style'       => 'margin:10px',
						    );
	
	
	
	
	
	
	
	

?>
<center>
	<font size="5">
		mioTV Contents Service(Simplified ACA)
	</font>
	<div class="title"><font color="#FFFFFF"><b><div align="left">Customer's Particulars</div></b></font></div>

<table align="center" class="tbl_design">
	<tr>
		<td>
			Name of Applicant: Mr/Miss/Dr (as in NRIC/FIN)<?php echo form_input($app_name); ?>
		</td>
	</tr>
	<tr>
		<td>
			NRIC/FIN No:<?php echo form_input($nric_fin); ?>&nbsp;Date of Birth:<?php echo form_input($b_day); ?>&nbsp;Issue Date(mm/dd/yy):<?php echo form_input($issue_date); ?>
		</td>
	</tr>
	<tr>
		<td>
			IPTV NO:<?php echo form_input($iptv_no); ?>&nbsp; Telephone:(H)<?php echo form_input($telephone_h ); ?>&nbsp;(Mobile):<?php echo form_input($telephone_m); ?>
		</td>
	</tr>
	<tr>
		<td>
			Approval code:<?php echo form_input($approval_code); ?>
		</td>
	</tr>
	<tr>
		<td>
			Dealer ID:<?php echo form_input($dealer_id); ?>&nbsp;Salesman code:<?php echo form_input($sales_man); ?>&nbsp;Salesman name:<?php echo form_input($sales_name); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php echo form_submit(array('name' => 'save', 'id' => 'save', ),'Save All'); ?>
			
		</td>
		<td>
			<?php echo '<td align="center"><div class = but><a href="'.base_url().'user/call_phone/"><font color = #0C0C0C> Return </font> <a></div></td>'; ?>
		</td>
	</tr>
</table>
<div class="separator"><font color="#FFFFFF"><b><div align="left">mio TV ala-Carte Services</div></b></font></div>
<table align="center" class="tbl_design">
	<tr>
		<td>
			Name of Applicant: Mr/Miss/Dr (as in NRIC/FIN)<?php echo form_input($app_name); ?>
		</td>
	</tr>
</table>
</center>
<div align="center"> 
 <font color="#AA0000" face="Arial">
  <?php echo validation_errors(); ?> 
 </font>   
 <?php echo $msg; ?> 
</div>

<?php echo form_close();  ?>
