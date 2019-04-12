<?php
class Login_model extends CI_Model
{
    
    /*
     *Purpose : Constructor function 
     */
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->database();
    }
	/*
	*purpose : get the username and password from table login
	*/
	function getUser($username,$password)
    {
     
		$this->db->select("ecn , password");
		$this->db->from("login");
		$this->db->where('ecn',$username);
		$this->db->where('password',$password);
		$result = $this->db->get();
		//echo $this->db->last_query();
		return  $result->num_rows();
	}
	// Check user mailid and username for reset password
	function checkuser($user,$mailid)
    {
     
		$this->db->select("ecn , mailid");
		$this->db->from("user");
		$this->db->where('ecn',$user);
		$this->db->where('mailid',$mailid);
		$result = $this->db->get();
		//echo $this->db->last_query();
		return  $result->num_rows();
	}

	// Update password
	function changepassword($user,$data)
    {
     
		$this->db->where('ecn',$user);
	   	$this->db->update('user',$data);
        return $this->db->affected_rows();
	}
	
	
}
?>