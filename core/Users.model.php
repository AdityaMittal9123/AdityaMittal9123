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
		$select_stmt->execute();
        $bdata=$select_stmt->fetch(PDO::FETCH_OBJ);
        return $bdata;

    }
	public function SelectUser($email){
		
		$column = array('email');
    $values=[
      ':email'=>"'".$email."'"];
        $select_stmt = parent::select($this->table,$column, $values);
		return $select_stmt;
		}

	public function activate($token){
		$column= array('status');
		$values=[
			':token'=>"'".$token."'"];
		parent::update($this->table,['status'=>'active'],'token',$token);	
			
	}
	public function updatePass($token,$password){
		$column= array('password');
		$values=[
			':token'=>"'".$token."'"];
		parent::update($this->table,['password'=>$password],'token',$token);	
			
	}
	public function bookAction($action,$b_id,$u_id) {
		
		$column = array('action','b_id','u_id');
		$values = [
			':u_id' => "'".$u_id."'",
			':b_id' => "'".$b_id."'",
			':action' => "'".$action."'"
		];
		$insert = parent::insert('has_book', $column, $values);
      $insert->execute();

		
	}
	public function userHasBook($u_id){
        $column=array('u_id');
        $values=[
            ':u_id'=>"'".$u_id."'"];
        $select_stmt = parent::select('has_book',$column, $values);
		$select_stmt->execute();
        $bdata=$select_stmt->fetch(PDO::FETCH_OBJ);
        return $bdata;

    }
}
?>