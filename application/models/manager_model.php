<?php
Class Manager_model extends CI_Model
{
	function Manager_model()
	{
		parent::__construct();
	}
	
	function get_team_stats($sdate_unix)
	{
		//extract date
		$date = mdate("%Y-%m-%d", $sdate_unix);
		
		$stats = $this->db->get_where('trck_sales', array('appt_date >=' => $date.' 00:00:00', 'appt_date <=' => $date.' 59:59:59'));
		
		return $stats;
	}	
	
	function get_agent_stats($sdate_unix)
	{
		//extract date
		$date = mdate("%Y-%m-%d", $sdate_unix);
		
		$stats = $this->db->query("
			select a.username, count(b.id) as total from trck_users a right outer join trck_sales b on a.username = b.agent_id and 
			b.appt_date >= '".$date." 00:00:00'
			AND b.appt_date <= '".$date." 59:59:59'
			WHERE  a.user_type = 2
			GROUP BY a.username
			ORDER BY a.username asc"
		);
		
		return $stats;
	}
	
	function get_campaign_stats($sdate_unix)
	{
		//extract date
		$date = mdate("%Y-%m-%d", $sdate_unix);
		
		$stats = $this->db->query("
			SELECT campaign, count(*) AS total 
			FROM trck_sales 
			WHERE appt_date >= '".$date." 00:00:00'
				AND appt_date <= '".$date." 59:59:59'
			GROUP BY campaign 
			ORDER BY campaign
		");
		
		return $stats;
	}
	
	function get_campaign_breakdown($sdate_unix, $campaign)
	{
		//extract date
		$date = mdate("%Y-%m-%d", $sdate_unix);
		
		$stats = $this->db->query("
			SELECT a.username, count(b.id) AS total 
			FROM trck_users a RIGHT OUTER JOIN trck_sales b ON a.username = b.agent_id 
			    AND b.appt_date >= '".$date." 00:00:00' AND b.appt_date <= '".$date." 59:59:59'
			WHERE  a.user_type = 2 
			    AND b.campaign = '".$campaign."'
			GROUP BY a.username
			ORDER BY a.username asc
		");
		$total = 0;
		echo '<ul>';
		foreach ($stats->result() as $row)
		{
			$total= $total + $row->total;
			echo '<li>'.$row->username.' - '.$row->total.'</li>';
		}
		echo '<li>--------------------</li>';
		echo '<li><strong>TOTAL - '.$total.'</strong></li>';
		echo '</ul>';
	}
	
	function agent_sales($agent, $sdate_unix)
	{
		//extract date
		$date = mdate("%Y-%m-%d", $sdate_unix);
		
		$stats = $this->db->get_where('trck_sales', array('appt_date >=' => $date.' 00:00:00', 'appt_date <=' => $date.' 59:59:59', 'agent_id' => $agent));
		
		return $stats;
	}
}