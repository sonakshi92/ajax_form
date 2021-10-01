<?php
class Crud_model extends CI_Model 
{
	function saverecords($name,$email,$password)
	{
		$query="INSERT INTO `user`( `name`, `email`, `password`) 
		VALUES ('$name','$email','$password')";
		$addRecord = $this->db->query($query);

		if($addRecord){
			return 'added record';
		}else{
			return 'failed';
		}
	}
    function islogin($email, $password){  
		$this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get('user');

        //$query=$this->db->get_where('user',array('email'=>$data['uemail'],'password'=>$data['password']));  
        return $query->num_rows();  
    }  
}