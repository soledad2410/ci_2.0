<?php
Class Counter_Model extends Base_model{
    
    
var $timeoutSeconds = 120;

var $numberOfUsers = 0;

var $init_visit=0;
var $max_record=100000;


//Get visit
/**
 * Counter_Model::get_visit()
 * 
 * @return array data=array('online','today','yesterday','week','month');
 */
public function get_visit(){
    $lock_time=600;
    $day=date('d');
    $month=date('m');
    $year=date('Y');
    $day_start=mktime(0,0,0,$month,$day,$year);
    $yesterday_start=$day_start-24*60*60;
    $month_start=mktime(0,0,0,$month,1,$year);
    $week=date('w');
    $week=$week-1;
    if($week<0){$week=7;}
    $week_start=$week*24*60*60;
    $now=time();
    $ip=$_SERVER['REMOTE_ADDR'];
    
    $query=$this->db->select_max('id','total')->from('tblcounter')->get();
    $total=$this->init_visit;
    if($this->get_array($query)){$rs=$this->get_array($query);
    $total=$rs['0']['total'];}
    
    // Delete old record
    $temp=$total-$this->max_record;
    if($temp>0){
        $this->db->delete('tblcounter',array('id < '=>$temp));
    }
    $session=session_id();
    // Check ip new user added 
    $query=$this->db->query("SELECT * FROM vnvic_tblcounter WHERE ip='$ip' AND (time+'$lock_time')>'$now' AND session_id='$session'");

    if($query->num_rows()==0){
    
        $this->db->insert('tblcounter',array('ip'=>$ip,'time'=>$now,'session_id'=>$session));
    }
    $data=array();
    
    // Get today visit
    
    $query =$this->db->query("SELECT COUNT(*) AS todayrecord FROM vnvic_tblcounter WHERE time>'$day_start'");
    $today_visit=0;
    if($query->num_rows()>0){$result=$query->result_array();$today_visit=$result['0']['todayrecord'];}
    $query=$this->db->query("SELECT COUNT(*) AS yesterdayrec FROM vnvic_tblcounter WHERE time>'$yesterday_start' and time<'$day_start'");
    $yesterday_visit=0;
    if($query->num_rows()>0){$result=$query->result_array();$yesterday_visit=$result['0']['yesterdayrec'];}
    $week_visit=0;
    $query=$this->db->query("SELECT COUNT(*) AS weekrec FROM vnvic_tblcounter WHERE time>='$week_start'");
    if($query->num_rows()>0){$result=$query->result_array();$week_visit=$result['0']['weekrec'];}
    $month_visit=0;
    $query=$this->db->query("SELECT COUNT(*) AS monthrec FROM vnvic_tblcounter WHERE time>='$month_start'");
    if($query->num_rows()>0){$result=$query->result_array();$month_visit=$result['0']['monthrec'];}
    
    //GET user current online
    $query=$this->db->query("SELECT DISTINCT(ip) AS current FROM vnvic_tblcounter WHERE (time+'$lock_time')>'$now'");
    $data['online']=$query->num_rows();
    $data['today']=$today_visit;
    $data['week']=$week_visit;
    $data['yesterday']=$yesterday_visit;
    $data['month']=$month_visit;
    $data['total']=$total;
    return $data;
    
        
    
    
    
}


}
?>