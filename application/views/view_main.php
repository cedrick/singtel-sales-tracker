<br><br>
<center>
<div class=view_main>
<?php

	
echo form_open(base_url().'user/call_phone');								
				
				$phone = array(
										'name' => 'phone',
										'id'	 => 'phone',
										'value'	 =>'',
										'size'   => '25'
									);
									
				$campaign = array(		'' => '',
									'DEL' => 'DEL',
									'MIOHOME' => 'MIOHOME',
									'SNBB' => 'SNBB',
									'ACQ_STM' => 'ACQ_STM',
									'BPL' => 'BPL',
									'ARPU' => 'ARPU',
									'ARPU_GRPC' => 'ARPU_GRPC',
									'ARPU_GRPD' => 'ARPU_GRPD',
									'FTTH' => 'FTTH',
									'NEWBORN1' => 'NEWBORN1',
									'NEWBORN2' => 'NEWBORN2',
									'NEWBORN3' => 'NEWBORN3',
									'JINGXUAN_B2A' => 'JINGXUAN_B2A',
									'JINGXUAN_B3A' => 'JINGXUAN_B3A',
									'JINGXUAN_B3B' => 'JINGXUAN_B3B',
									'ACQ_MIO_PLAN_TM' => 'ACQ_MIO_PLAN_TM',
									'TMO' => 'TMO',
									'UPSELL_MH' => 'UPSELL_MH'
									);
							

?>
<br><br><br>
<table>
		<tr>
			<td>
				<font  face = arial size = "3" >
					<b>
						Enter Phonenumber: 
					</b>
				</font>
			</td>
			<td>
				<?php echo form_input($phone); ?>
			</td>	
		</tr>
		<tr>
			<td>
				<font  face = arial size = "3" > 
					<b>
						Campaign: 
					</b>
				</font>
			</td>
			<td>
				<?php echo form_dropdown('campaign',$campaign); ?>
			</td>
		</tr>
		<tr>
			<td>
			</td>
			<td>
				<?php echo form_submit(array('name' => 'submit_name', 'id' => 'submit_id', ), 'Search'); ?>
			</td>
		</tr>
</table>
		
<?php echo form_close(); ?>
</div>
<div align = center>
	<font color="#AA0000" face="Arial">
		<?php echo validation_errors(); ?>
	</font> 
</div>
</center>
<br><br>