<?php
namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model{
	
	protected $table      = 'users';
	protected $primaryKey = 'id';
	protected $allowedFields = ['first_name', 'last_name', 'email', 'vcode', 'password', 'profile_pic', 'created_at', 'provider' ];
	
	protected $useTimestamps = false;
    protected $createdField  = 'activation_time';
    protected $updatedField  = 'last_modified';
    protected $deletedField  = 'deleted_at';


	public function verifyEmail($email){
		$builder = $this->db->table('users');
		$builder->select('*');
		$builder->where('email', $email);
		$result = $builder->get();
		 if(count($result->getResultArray())==1){
			return $result->getRowArray();
		}
		else
		{
			return false;
		}
		 
	}

	public function twitter_user_exists($email)
	{
	    $builder = $this->db->table('users');
		$builder->where('email', $email);
		if($builder->countAllResults()==1){
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function updateTwitterUser($data, $email)
	{
	   $builder = $this->db->table('users');
	   $builder->where('email', $email); 
	   $builder->update($data);
	   if($this->db->affectedRows()==1){
			 
			 return true;
			 
		 }else{
			 return false;
		 }
	}
	
	public function createTwitterUser($data)
	{
	   $builder = $this->db->table('users');
	   $builder->insert($data);
	   if($this->db->affectedRows()==1){
			 
			 return true;
			 
		 }else{
			 return false;
		 }
	}
	
}