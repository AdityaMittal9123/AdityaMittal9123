<?php

class Users extends QueryBuilder {
	public function __construct($pdo)
	{
	  parent::__construct($pdo);
	  $this->table = 'users';
	  $this->column = array('email', 'password', 'usertype', 'status','token');
	  $this->values = array('email', 'password');
	}
	
	public function RegisterUser($email, $password, $usertype, $token, $status) {
		
		$column = array('email', 'password', 'usertype','token', 'status');
		$values = [
			':email' => "'".$email."'",
			':password' => "'".$password."'",
			':usertype' => "'".$usertype."'",
			':token' => "'".$token."'",
			':status' => "'".$status."'",
		];
		$insert = parent::insert($this->table, $column, $values);
      $insert->execute();

		
	}
	public function UserDetails($u_id){
        $column=array('u_id');
        $values=[
            ':u_id'=>"'".$u_id."'"];
        $select_stmt = parent::select($this->table,$column, $values);
        $bdata=$select_stmt->fetch(PDO::FETCH_OBJ);
        return $bdata;

    }
	public function SelectUser($email,$password){
		
		$column = array('email');
    $values=[
      ':email'=>"'".$email."'"];
        $select_stmt = parent::select($this->table,$column, $values);
		return $select_stmt;
		}

	public function activate($email){
		$column= array('status');
		$values=[
			':email'=>"'".$email."'"];
		parent::update($this->table,['status'=>'active'],'email',$email);	
			
	}
}
?>