<?php 


class Login_model extends CI_Model
{

	function __construct()
	{
		$this->load->database();
	}

	public function insert($table,$data){
		
		$this->db->insert($table,$data);
		
	}

	public function get_registered()
	{
		$this->db->select('*');
		$this->db->from('login');
		$this->db->order_by('login_id','desc');
		$result = $this->db->get();
		return $result->result();
	}

	public function update($table, $where, $data)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function delete($table, $where)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function check_login($uname, $password)
	{
		$this->db->from('login');
		$this->db->where('login_username',$uname);
		$this->db->where('login_password',$password);
		$result = $this->db->get();
		return $result->result();
	}

	public function get_fullname($uname, $password)
	{

	}


}

 ?>