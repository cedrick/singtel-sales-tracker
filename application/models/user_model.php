<?php
class User_model extends CI_Model
{
	function user_model()
	{
		parent::__construct();
	}


	function insert($phone,$agent_id,$sn,$actv_date,$appt_time,$adsl_no,$mobile_no,$iptv_no,$inst_add,$applcnt_name,$nric,$product,$speed,$ssp,$dealer,$notes,$snd_contact,$prod_officer,$campaign,$date)
	{
		//$query_str =  "INSERT INTO trck_sales (SN,appt_date,actv_date,appt_time,ADSL_NO,mobile_no,phone_no,IPTV_NO,inst_add,app_name,NRIC,product,speed,SSP,dealer,agent_id,notes,snd_contact,prod_officer,campaign) Values (?,NOW(),?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		//if($this->db->query($query_str,array($sn,$actv_date,$appt_time,$adsl_no,$mobile_no,$phone,$iptv_no,$inst_add,$applcnt_name,$nric,$product,$speed,$ssp,$dealer,$agent_id,$notes,$snd_contact,$prod_officer,$campaign))){
			//return TRUE;
		//}
		//else
		//{
			//return FALSE;
		//}
		$data = array(
					   'SN' => $sn ,
					   'appt_date' => $date,
					   'actv_date' => $actv_date,
					   'appt_time' => $appt_time,
					   'ADSL_NO' => $adsl_no,
					   'mobile_no' => $mobile_no,
					   'phone_no' => $phone,
					   'IPTV_NO' => $iptv_no,
					   'inst_add' => $inst_add,
						'app_name' => $applcnt_name,
					   'NRIC' => $nric ,
					   'product' => $product,
					   'speed' => $speed,
					   'SSP' => $ssp,
					   'dealer' => $dealer,
					   'agent_id' => $agent_id,
					   'notes' => $notes,
					   'snd_contact' => $snd_contact,
					    'prod_officer' => $prod_officer,
					   'campaign' => $campaign,
						'last_update' => $date
		
					);

	
	if($this->db->insert('trck_sales', $data)){
			return TRUE;
		}
		else
		{
			return FALSE;
		}

	}

	 function search($phone,$agent_id,$campaign)
		{
		
			$exist = $this->db->query("SELECT * FROM trck_sales where phone_no = '$phone' AND agent_id = '$agent_id' AND campaign = '$campaign' order by appt_date desc LIMIT 0, 1");
			
			if($exist->num_rows() > 0) {
				return $exist;
			}
			
			return FALSE;
		}
	
		function search_valid($phone,$agent_id,$campaign)
		{
			//echo 'PHONE: '.$phone;
			//echo '<br>AGENT: '.$agent_id;
			//echo '<br>CAMP: '.$campaign.'<br>';
			//$exist = $this->db->query("SELECT * FROM trck_sales where phone_no = '$phone'");

			//if($exist->num_rows() > 0) {
			//$exist = $this->db->query("SELECT * FROM trck_sales where campaign = '$campaign'");
			//if($exist->num_rows() > 0) {
			//return FALSE;
			//} else {
			//return $exist;
			//}
			//}

			//return FALSE;
			$exist = $this->db->query("SELECT * FROM trck_sales where phone_no = '$phone'");
			if($exist->num_rows() > 0) {
				$exist = $this->db->query("SELECT * FROM trck_sales where phone_no = '$phone' and agent_id = '$agent_id'");
				if($exist->num_rows() > 0)
				{
					$exist = $this->db->query("SELECT * FROM trck_sales where phone_no = '$phone' and campaign = '$campaign'");
					if($exist->num_rows() > 0)
					{
						// 'Action: EDIT<br>';
						redirect('/user/option/'.$phone.'/'.$campaign.'/'.$agent_id,'refresh');
					}else
					{
						//echo 'Action: NEW<br>';	
						redirect('/user/option/'.$phone.'/'.$campaign.'/'.$agent_id,'refresh');
						$exist = $this->db->query("SELECT * FROM trck_sales where phone_no = '$phone' AND campaign = '$campaign' order by appt_date desc LIMIT 0, 1");
						$exist->row();
						return $exist;
					}
				}else
				{
					$exist = $this->db->query("SELECT * FROM trck_sales where phone_no = '$phone' and campaign = '$campaign'");
					if($exist->num_rows() > 0) {
						
						//echo 'Invalid<br>';	
						$msg = "This Record was already tagged as sale by another agent!";
						$this->load->view('error',array('msg'=>$msg));
						
					} else {
						//echo 'Action: NEW<br>';
						redirect('/user/option/'.$phone.'/'.$campaign.'/'.$agent_id,'refresh');
						
						
					} 
				}
			}else
			{
				//echo 'Action: NEW<br>';
				redirect('/user/option/'.$phone.'/'.$campaign.'/'.$agent_id,'refresh');
				
				
			}


				
		}
			
	function update($phone,$agent_id,$sn,$actv_date,$appt_time,$adsl_no,$mobile_no,$iptv_no,$inst_add,$applcnt_name,$nric,$product,$speed,$ssp,$dealer,$notes,$snd_contact,$prod_officer,$campaign,$date)
		{
			
			
			//$str = array('name' => $name, 'email' => $email, 'url' => $url);

			//$where = "author_id = 1 AND status = 'active'";
			
			//$str = $this->db->update_string('table_name', $data, $where); 
			//return $this->db->query("UPDATE trck_sales SET SN = '$sn',last_update = NOW(),actv_date = '$actv_date',appt_time = '$appt_time',ADSL_NO = '$adsl_no',mobile_no = '$mobile_no',phone_no = '$phone',IPTV_NO = '$iptv_no',inst_add = '$inst_add',app_name = '$applcnt_name',NRIC = '$nric',product = '$product',speed = '$speed',SSP = '$ssp',dealer = '$dealer',agent_id = '$agent_id',notes = \"$notes\",snd_contact = '$snd_contact',prod_officer = '$prod_officer',campaign = '$campaign' WHERE phone_no ='$phone' and agent_id = '$agent_id'");
			
			$data = array(
					   'SN' => $sn ,
					   'last_update' => $date,
					   'actv_date' => $actv_date,
					   'appt_time' => $appt_time,
					   'ADSL_NO' => $adsl_no,
					   'mobile_no' => $mobile_no,
					   'phone_no' => $phone,
					   'IPTV_NO' => $iptv_no,
					   'inst_add' => $inst_add,
						'app_name' => $applcnt_name,
					   'NRIC' => $nric ,
					   'product' => $product,
					   'speed' => $speed,
					   'SSP' => $ssp,
					   'dealer' => $dealer,
					   'agent_id' => $agent_id,
					   'notes' => $notes,
					   'snd_contact' => $snd_contact,
					    'prod_officer' => $prod_officer,
					   'campaign' => $campaign
					);
				
				$this->db->where('phone_no',$phone);
				$this->db->where('agent_id',$agent_id);
				return $this->db->update('trck_sales', $data);
					
		
		}
		
	function update_app($phone,$agent_id,$sn,$actv_date,$appt_time,$adsl_no,$mobile_no,$iptv_no,$inst_add,$applcnt_name,$nric,$product,$speed,$ssp,$dealer,$notes,$snd_contact,$prod_officer,$campaign,$date)
		{
			
			
			//$str = array('name' => $name, 'email' => $email, 'url' => $url);

			//$where = "author_id = 1 AND status = 'active'";
			
			//$str = $this->db->update_string('table_name', $data, $where); 
			//return $this->db->query("UPDATE trck_sales SET SN = '$sn',last_update = NOW(),actv_date = '$actv_date',appt_time = '$appt_time',ADSL_NO = '$adsl_no',mobile_no = '$mobile_no',phone_no = '$phone',IPTV_NO = '$iptv_no',inst_add = '$inst_add',app_name = '$applcnt_name',NRIC = '$nric',product = '$product',speed = '$speed',SSP = '$ssp',dealer = '$dealer',agent_id = '$agent_id',notes = \"$notes\",snd_contact = '$snd_contact',prod_officer = '$prod_officer',campaign = '$campaign' WHERE phone_no ='$phone' and agent_id = '$agent_id'");
			
			$data = array(
					   'SN' => $sn ,
					   'last_update' => $date,
					   'actv_date' => $actv_date,
					   'appt_time' => $appt_time,
					   'ADSL_NO' => $adsl_no,
					   'mobile_no' => $mobile_no,
					   'phone_no' => $phone,
					   'IPTV_NO' => $iptv_no,
					   'inst_add' => $inst_add,
						'app_name' => $applcnt_name,
					   'NRIC' => $nric ,
					   'product' => $product,
					   'speed' => $speed,
					   'SSP' => $ssp,
					   'dealer' => $dealer,
					   'agent_id' => $agent_id,
					   'notes' => $notes,
					   'snd_contact' => $snd_contact,
					    'prod_officer' => $prod_officer,
					   'campaign' => $campaign
					);
			if (isset($_POST['update'])) {
				$data_2 = array('appt_date' => $date);
				$data = array_merge($data, $data_2);
			}
				$this->db->where('phone_no',$phone);
				$this->db->where('agent_id',$agent_id);
				return $this->db->update('trck_sales', $data);
					
		
		}
	
	function stat($agent_id,$sdate_unix = NULL)
	{
		
		$agent_id= $this->session->userdata('username');
		if(NULL == $sdate_unix) {
				//get current date
				$format = 'DATE_RFC1123';
				
				$sdate_unix = time() + 28800;
				
				$sdate_human = unix_to_human($sdate_unix);
				
			}
			$date = mdate("%Y-%m-%d",$sdate_unix);
			$this->session->set_userdata('rdate',$date);
		return $this->db->query("SELECT * FROM trck_sales where agent_id = '$agent_id' and  appt_date  like '$date%'");
	}
	
	function insert_form($phone,$agent_id,$campaign,$app_name,$nric_fin,$b_day,$issue_date,$iptv_no,$telephone_h,$telephone_m,$approval_code,$dealer_id,$sales_man,$sales_name,$date)
	{
		
		$query = $this->db->query("SELECT * FROM trck_sales WHERE phone_no='$phone' AND agent_id='$agent_id' AND campaign='$campaign' ");
		foreach($query->result() as $row)
		{
			$row->id;
		}
		
		$data = array(
					   'sales_id' => $row->id,
					   'agent_id' => $agent_id,
					   'phone_no' => $phone,
					   'campaign' => $campaign,
					   'app_name' => $app_name,
					   'nric_fin' => $nric_fin,
					   'b_day' => $b_day,
					   'issue_date' => $issue_date,
					   'iptv_no' => $iptv_no,
					   'app_name' => $app_name,
					   'telephone_h' => $telephone_h,
					   'telephone_m' => $telephone_m,
					   'approval_code' => $approval_code,
					   'dealer_id' => $dealer_id,
					   'salesman_code' => $sales_man,
					   'salesman_name' => $sales_name,
					   'rdate' => $date
		
					);

	
		if($this->db->insert('trck_form',$data)){
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		
	}

}
?>