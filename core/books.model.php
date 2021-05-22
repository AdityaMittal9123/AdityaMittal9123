<?php

class Books extends QueryBuilder {
    public function __construct($pdo)
	{
	  parent::__construct($pdo);
	  $this->table = 'books';
	  $this->column = array('b_id','name', 'author_name', 'cover_image','description', 'pdf','total_count');
	  $this->values = array('b_id','name','author_name');
	}

    public function bookDetails($b_id){
        $column=array('b_id');
        $values=[
            ':b_id'=>"'".$b_id."'"];
        $select_stmt = parent::select($this->table,$column, $values);
        $select_stmt->execute();
        $bdata=$select_stmt->fetch(PDO::FETCH_OBJ);
        return $bdata;

    }
    public function addBook($name,$auth_name,$description,$image,$pdf,$total_count){
        $column = array('name', 'author_name', 'description','cover_image','pdf', 'total_count');
		$values = [
			':name' => "'".$name."'",
			':author_name' => "'".$auth_name."'",
			':description' => "'".$description."'",
			':cover_image' => "'".$image."'",
			':pdf' => "'".$pdf."'",
            ':total_count' => "'".$total_count."'"
		];
        $add = parent::insert($this->table, $column, $values);
        return $add->execute();

    }
    public function SearchBook($str){
        $column = array('b_id','name', 'auth_name', 'description', 'pdf','total_count');
        $values=[
          ':name'=>"'".$str."'",
          ':auth_name'=>"'".$str."'"];
          $s=parent::search($this->table,$column, $values);
          //$data=$s->fetch(PDO::FETCH_OBJ);
          return $s;
    
    }
    public function DeleteBook($b_id){
        //$column=array('b_id');
        $values=[
            ':b_id'=>"'".$b_id."'"];
        $stmt=parent::deleteAll($this->table,'b_id', $values); 
        // $del=$stmt->execute();
        //return  $stmt;  

        
    }
    public function UpdateBook($name,$author_name,$cover_image,$description,$pdf,$totalcount,$b_id){
        $values=[
         ':name'=>"'".$name."'",
          ':author_name'=>"'".$author_name."'",
          ':cover_image'=>"'".$cover_image."'",
          ':description'=>"'".$description."'",
          ':pdf'=>"'".$pdf."'",
          ':total_count'=>"'".$totalcount."'"
      ];
      $target = [
        ':b_id'=>"'".$b_id."'"
      ];
      $column = ['name', 'author_name','cover_image' ,'description', 'pdf','total_count'];
       $i = 0;
      $upda = [];
    $queryArray = array_keys($values);
      while (isset($column[$i])) {
        $upda += [$column[$i] => $queryArray[$i]];
        $i++;
    }
       return parent::update($this->table,$upda,'b_id',$target);
      
      }

}

?>