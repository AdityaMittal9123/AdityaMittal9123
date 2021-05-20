<?php

use function PHPSTORM_META\type;

class Users extends QueryBuilder{
	protected  $table='users';
	protected  $names=['email_id'];
	protected $values=[];
	public  function fetchUser($values){
		$values=explode(',',$values);
		return parent::fetchOne($this->table,$this->names,$values);
	}
	public  function fetchUser1($values){
		$values=explode(',',$values);
		return parent::fetchOne($this->table,['uid'],$values);
	}
	public function fetchUsers(){
		return parent::fetchList($this->table);
	}
	public function fetchUsersLimit($limit,$offset){
		return parent::fetchList2($this->table,$limit,$offset);
	}
	public function flashError($msg,$dir){
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		$i=1;
		foreach ($msg as $values) {
			$param='error'.$i++;
			$_SESSION[$param]=$values;
		}
		header("location:{$dir}");
	}
	public function verify($row,$pass){
		if(isset($row)){
			if(password_verify($pass, $row['password'])){
				if($row['verified_id']=="0"){
					session_destroy();
					header('location:/splashmsg?msgtype=unverified');
				}
				else {
					$type=$row['type'];    			
					$uid=$row['uid'];
					$name=$row['user_name'];
					require __dir__.'/'.'../../Controllers/common/setUserSession.php';
					header('location:/login');
				}
			}
			else
				$this->flashError([NULL,'Invalid Password'],'/');
		}
		else	
			$this->flashError(['Invalid Email Address','Invalid Password'],'/');
	}
	public function freshUser($emailid){
		$row=$this->fetchUser($emailid);
		if(isset($row))
			return FALSE;
		else
			return TRUE;
	}
	public function deleteUser($emailid){
		return parent::delete($this->table,$this->names[1],$emailid);
	}
	public function registerUser($name,$emailid,$pass,$id){
		$pass=password_hash($pass, PASSWORD_DEFAULT);
		$this->names=['user_name','email_id','password','provider_id','verified_id'];
		$this->values=["'{$name}'","'{$emailid}'","'{$pass}'","'{$id}'","'0'"];
		if(parent::insert($this->table,$this->names,$this->values)){
			if($id!=NULL){
				header('location:/login');
			}
			else{
				   $lnk=APP_URL.'/verify?id='.$emailid.'&secret='.$pass;
				   
				   if(Mail::sendVerificationMail($lnk,$emailid,$name)){
					header("location:/splashmsg?msgtype=unverified");
				   }
				   else{
				   	$this->deleteUser($emailid);
				   	$this->flashError(['Internal Error, Try Again'],'/index?register=1');
				   }	
			}
		}
	}
	public function activate($emailid){
		if(!parent::update($this->table,['verified_id'=>'1'],'email_id',$emailid))	
			$this->flashError(['Problem in Verification'],'/');	
	}
	public function passwordUpdate($emailid,$password){
		$password=password_hash($password, PASSWORD_DEFAULT);
		if(!parent::update($this->table,['password'=>$password],'email_id',$emailid))	
			$this->flashError(['Problem in Updation'],'/passwordreset');	
		else
		$this->flashError([null,null,null,'Your Password has been updated successfully'],'/');
		
	}
	public function readBook($uid,$bid){
		$this->names=['uid','bid', 'type'];
		$this->values=["'{$uid}'","'{$bid}'", "'read_shelf'"];
		$book = new Books();
		$book->updateBookCount($bid);
		parent::insert('has_book',$this->names,$this->values);	
	}
	public function readHistoryBook($uid,$bid){
		$update=[ [ 'uid'  => "'{$uid}'",
					'bid'  => "'{$bid}'",
					'type' => "'history_read'"
				],[
						'type' => "history_read"
					]
				];
		parent::updateOrCreate('has_book', $update);	
	}
	public function unreadBook($uid,$bid){
		$book = new Books();
		$book->updateBookCount($bid, "increment");
		parent::delete2('has_book','uid',$uid,'bid',$bid, 'type', 'read_shelf');	
	}
	public function finishBook($uid,$bid){
		$this->names=['uid','bid', 'type'];
		$this->values=["'{$uid}'","'{$bid}'", "'finish'"];
		parent::insert('has_book',$this->names,$this->values);	
	}
	public function unfinishBook($uid,$bid){
		parent::delete2('has_book','uid',$uid,'bid',$bid, 'type', 'finish');	
	}
	public function likeBook($uid,$bid){
		$this->names=['uid','bid', 'type'];
		$this->values=["'{$uid}'","'{$bid}'", "'like'"];
		parent::insert('has_book',$this->names,$this->values);	
	}
	public function unlikeBook($uid,$bid){
		parent::delete2('has_book','uid',$uid,'bid',$bid, 'type', 'like');	
	}
	public function fetchBooks($uid, $type='read_shelf'){
		$check=" uid='".$uid."' AND type='".$type."'";
		return (parent::fetchList1('has_book',$check));
	}
	
	
	
	public function deleteAllBooks($uid){
		return parent::delete('has_book','uid',$uid);
	}
	public function deleteUserById($uid){
		return parent::delete('users','uid',$uid);
	}

	public function createAdmin($user_name,$email,$password){
		$pass=password_hash($password, PASSWORD_DEFAULT);
		$this->names=['user_name','email_id','password','verified_id','type' ];
		$this->values=["'{$user_name}'","'{$email}'","'{$password}'","'1'" ,"'0'"];
		return parent::insert($this->table,$this->names,$this->values);
	}
}

?>