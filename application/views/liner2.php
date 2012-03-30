<style type="text/css">
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
</style>
<div class="liner">&nbsp;&nbsp;&nbsp;<?php echo '<a href="'.base_url().'login/logout">'."<font color=#fffff face=Arial size=4>"."Logout"."</font>".'</a>' ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php  echo "<font color=#FFE711 face=Arial size=4>"."<b>". $this->session->userdata('username')."</b>"."</font>" ?>&nbsp;&nbsp;&nbsp;<?php  echo "<font color=#EDEBEB face=Arial size=4>"."<b>"."Stats".'-'. $data['stats']->num_rows()."</b>"."</font>"; ?></div>