<br>
<font face = arial>
<?php echo form_open(base_url().'user/call_tracker');?>


<?php 
	
	if($data['call_search']) {
		$row = $call_search->row();
	}
		
	
	$sn = array(
				'name' => 'sn',
				'id' => 'sn',
				'value' => isset($_POST['sn']) ? $_POST['sn'] : (isset($row->SN) ? $row->SN : '')
				);
						
	$actv_date = array(
						'name' => 'actv_date',
						'id' => 'actv_date',
						'value' => isset($_POST['actv_date']) ? $_POST['actv_date'] : (isset($row->actv_date) ? $row->actv_date : '')
						);
						
	$appt_time = array(
						'name' => 'appt_time',
						'id' => 'appt_time',
						'value' => isset($_POST['appt_time']) ? $_POST['appt_time'] : (isset($row->appt_time) ? $row->appt_time : '')
						);
						
	$adsl_no = array(
						'name' => 'adsl_no',
						'id' => 'adsl_no',
						'value' => isset($_POST['adsl_no']) ? $_POST['adsl_no'] : (isset($row->ADSL_NO) ? $row->ADSL_NO : '')
						);
						
	$mobile_no = array(
						'name' => 'mobile_no',
						'id' => 'mobile_no',
						'value' => isset($_POST['mobile_no']) ? $_POST['mobile_no'] : (isset($row->mobile_no) ? $row->mobile_no : '')
						);
						
	$iptv_no = array(
						'name' => 'iptv_no',
						'id' => 'iptv_no',
						'value' => isset($_POST['iptv_no']) ? $_POST['iptv_no'] : (isset($row->IPTV_NO) ? $row->IPTV_NO : '')
						);
						
	$inst_add = array(
						'name' => 'inst_add',
						'id' => 'inst_add',
						'value' => isset($_POST['inst_add']) ? $_POST['inst_add'] : (isset($row->inst_add) ? $row->inst_add : '')
						);
		
	$applcnt_name = array(
						'name' => 'applcnt_name',
						'id' => 'applcnt_name',
						'value' => isset($_POST['applcnt_name']) ? $_POST['applcnt_name'] : (isset($row->app_name) ? $row->app_name : '')
						);
						
	$nric = array(
						'name' => 'nric',
						'id' => 'nric',
						'value' => isset($_POST['nric']) ? $_POST['nric'] : (isset($row->NRIC) ? $row->NRIC : '')
						);
	
	$product = array(	'' => '',
						'FOR ACQ DEL = MIOTV' => 'FOR ACQ DEL = MIOTV',
						'FOR SNBB = CONTENT PACKS' => 'FOR SNBB = CONTENT PACKS',
						'UPSELL VARIETY PCK = UPSELL CONTENTS' => 'UPSELL VARIETY PCK = UPSELL CONTENTS'
						);
						
	$action_product = isset($_POST['product']) ? $_POST['product'] : (isset($row->product ) ? $row->product  : '');//retain the value of the dropdown after submitting
						
	$speed = array(		'' => '',
						'MIOHOME 6MBPS' => 'MIOHOME 6MBPS',
						'MIOHOME 10MBPS' => 'MIOHOME 10MBPS',
						'MIOHOME 15 MBPS' => 'MIOHOME 15 MBPS',
						'(MIOTV)' => '(MIOTV)'
						);
						
	$action_speed = isset($_POST['speed']) ? $_POST['speed'] : (isset($row->speed ) ? $row->speed  : '');//retain the value of the dropdown after submitting
 
	
	$ssp = array(		'' => '',
						'NEW' => 'NEW',
						'EXISTING CUSTOMER' => 'EXISTING CUSTOMER',
						);
						
	$action_ssp= isset($_POST['ssp']) ? $_POST['ssp'] : (isset($row->SSP ) ? $row->SSP  : '');//retain the value of the dropdown after submitting
 
						
	$dealer = array(
						'name' => 'dealer',
						'id' => 'dealer',
						'value' => isset($_POST['dealer']) ? $_POST['dealer'] : (isset($row->dealer) ? $row->dealer : '')
						
						);
						
							
	$notes= array(
				              'name'        => 'notes',
				              'id'          => 'notes',
				              'value'       => isset($_POST['notes']) ? $_POST['notes'] : (isset($row->notes) ? $row->notes : ''),
				              'maxlength'   => '',
				              'size'        => '90',
				              'style'       => 'width:90%',

				            );
	$prod_officer = array(		'' => '',
						'MioTV with 6 months contract' => 'MioTV with 6 months contract',
						'Astro Pack with 12 months contract; 50% off for 3 months' => 'Astro Pack with 12 months contract; 50% off for 3 months',
						'Bharata Pack with 12 months contract; 50% off for 3 months' => 'Bharata Pack with 12 months contract; 50% off for 3 months',
						'Sports Pack with 12 months contract; 50% off for 6 months' => 'Sports Pack with 12 months contract; 50% off for 6 months',
						'Ultimate Pack with 12 months contract; 50% off for 3 months' => 'Ultimate Pack with 12 months contract; 50% off for 3 months'
						);
 $action_prod_officer = isset($_POST['prod_officer']) ? $_POST['prod_officer'] : (isset($row->prod_officer ) ? $row->prod_officer  : '');//retain the value of the dropdown after submitting
						
						
//$campaign = array(		'' => '',
						//'DEL' => 'DEL',
						//'MIOHOME' => 'MIOHOME',
						//'SNBB' => 'SNBB',
						//'ACQ_STM' => 'ACQ_STM',
						//'BPL' => 'BPL',
						//'ARPU' => 'ARPU',
						//'ARPU_GRPC' => 'ARPU_GRPC',
						//'ARPU_GRPD' => 'ARPU_GRPD',
						//'FTTH' => 'FTTH',
						//'NEWBORN1' => 'NEWBORN1',
						//'NEWBORN2' => 'NEWBORN2',
						//'NEWBORN3' => 'NEWBORN3'
						//);
 //$action_campaign  = isset($_POST['campaign']) ? $_POST['campaign'] : (isset($row->campaign ) ? $row->campaign  : '');//retain the value of the dropdown after submitting
							
 
 $snd_contact = array(
						'name' => 'snd_contact',
						'id' => 'snd_contact',
						'value' => isset($_POST['snd_contact']) ? $_POST['snd_contact'] : (isset($row->snd_contact) ? $row->snd_contact : '')
						);
	
						
	
	
						
				
				
				

?>
	


<table width=800 border=0 align=center cellspacing=1 bgcolor= #EAE8E7 class = tb_design >
	<tr>
		<td>
			Agent ID:
		</td>
		<td>
			<?php echo $agent_id= $this->session->userdata('username'); ?>
		</td>
		
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		
		<td>
			Phone Number:
		</td>
		<td>
			<?php echo $phone= $this->session->userdata('phone'); ?>
		</td>
		
	</tr>
	<tr>
		<td>
			S/N:
		</td>
		<td>
			<?php echo form_input($sn); ?>
		</td>
		
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		
		<td>
			Application Date:
		</td>
		<td>
			<?php echo substr($row->appt_date,0,10); ?>
		</td>
		
	</tr>
	<tr>
		<td>
			Installation Address:
		</td>
		<td>
			<?php echo form_input($inst_add); ?>
		</td>
		
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>

		<td>
			Applicant Name:
		</td>
		<td>
			<?php echo form_input($applcnt_name); ?>
		</td>
	</tr>
	<tr>
		<td>
			Activation Date:
		</td>
		<td>
			<?php echo form_input($actv_date); ?>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
			NRIC:
		</td>
		<td>
			<?php echo form_input($nric); ?>
		</td>
	</tr>
	<tr>
		<td>
			Appointment Time:
		</td>
		<td>
			<?php echo form_input($appt_time); ?>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
			Product:
		</td>
		<td>
			<?php echo form_dropdown('product',$product,$action_product); ?>
		</td>
	</tr>
	<tr>
		<td>
			ADSL No:
		</td>
		<td>
			<?php echo form_input($adsl_no); ?>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
			Speed:
		</td>
		<td>
			<?php echo form_dropdown('speed',$speed,$action_speed); ?>
		</td>
	</tr>
	<tr>
		<td>
			Mobile No:
		</td>
		<td>
			<?php echo form_input($mobile_no); ?>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
			SSP:
		</td>
		<td>
			<?php echo form_dropdown('ssp',$ssp,$action_ssp); ?>
		</td>
	</tr>
	<tr>
		<td>
			IPTV No:
		</td>
		<td>
			<?php echo form_input($iptv_no); ?>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
			Dealer:
		</td>
		<td>
			<?php echo form_input($dealer); ?>
		</td>
	</tr>
	<tr>
		<td>
			Secondary Contact:
		</td>
		<td>
			<?php echo form_input($snd_contact); ?>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
			Product Officer:
		</td>
		<td>
			<?php echo form_dropdown('prod_officer',$prod_officer,$action_prod_officer); ?>
		</td>
	</tr>
	<tr>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
			Campaign:
		</td>
		<td>
			<?php echo $campaign= $this->session->userdata('campaign'); ?>
		</td>
	
	</tr>
</table>
<br>
<table width=800 border=0 align=center cellspacing=1 bgcolor= #EAE8E7 class = tb_design >
	<tr>
		<td>
			Additional Notes:
		</td>
		<td>
			<?php echo form_textarea($notes); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php echo form_submit(array('name' => 'update', 'id' => 'update', ),'Update'); ?>
		</td>
		<td>
			<?php echo form_submit(array('name' => 'save', 'id' => 'save', ),'Save All'); ?>
		</td>
		<?php echo '<td align="center"><div class = but><a href="'.base_url().'user/add_form/"><font color = #0C0C0C> Form </font> <a></div></td>'; ?>
		<?php echo '<td align="center"><div class = but><a href="'.base_url().'user/call_phone/"><font color = #0C0C0C> Return </font> <a></div></td>'; ?>

	</tr>
</table>

<div align="center"> 
 <font color="#AA0000" face="Arial">
  <?php echo validation_errors(); ?>
  <?php echo $this->session->flashdata('insertdata'); ?>
 </font>    
</div>
<?php echo form_close(); ?>
</font>
<br>
