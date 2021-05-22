
<?php

class QueryBuilder {

	protected $pdo;


	public function __construct($pdo) {
		$this->pdo = $pdo;

	}
	public $column = [];
    public $values = [];
	public function selectAll($table) {
		$statement = $this->pdo->prepare("select * from {$table}");
		$statement->execute();
		return $statement->fetchAll(PDO::FETCH_OBJ);
	}
	// public function select($table,$values,$email) {
	// 	$select_stmt = $this->pdo->prepare("select * from {$table} where ${values}=$email");
	// 	$select_stmt->execute();
	// 	return $select_stmt;
	// }
	public function select($table, $column, $conditional)
     {
         $column = implode(',', $column);
         $conditional = implode(',', $conditional);
         $select_stmt = $this->pdo->prepare("SELECT * FROM ${table} WHERE (${column}) = (${conditional})");
		 //$select_stmt->execute();
         return $select_stmt;
     }

	 public function update($table, $upda, $bid, $target)
     {
        $tt = implode(',', $target);
        $str=',';
        foreach ($upda as $key => $value){
            $str=$str.$key."=${value},";
        }
        $str=trim($str,',');
        
     return $this->pdo->prepare("UPDATE $table SET $str WHERE (${bid}) = (${tt}) ");
            
            
      }
	public function deleteAll($table, $name, $value) {
		//$name = implode(',', $name);
         $value = implode(',', $value);
		$stmt = $this->pdo->prepare("DELETE FROM ${table} WHERE ${name} = ${value}");
		$stmt->execute();
		
	}
	public function insert($table, $column, $values) {
		$column = implode(',', $column);
    $values = implode(',', $values);
    $sql = $this->pdo->prepare("INSERT INTO $table(${column})  VALUES (${values})");
	return $sql;
	}
	public function search($table,$column,$values){
		$column = implode(',', $column);
    	$values = implode(',', $values);
		$s = $this->pdo->prepare("SELECT * FROM ${table} WHERE ${column}=${values}");
		return $s->execute();

	}
	
}
