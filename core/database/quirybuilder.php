
<?php

class QueryBuilder {

	protected $pdo;


	public function __construct($pdo) {
		$this->pdo = $pdo;

	}
	public $column = [];
    public $values = [];
	public function selectLimit($table,$offset,$limit) {
		$statement = $this->pdo->prepare("select * from {$table}  limit {$offset},{$limit}");
		$statement->execute();
		return $statement->fetchAll(PDO::FETCH_OBJ);
	}
	public function selectAll($table) {
		$statement = $this->pdo->prepare("select * from {$table}");
		$statement->execute();
		return $statement->fetchAll(PDO::FETCH_OBJ);
	}
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
	public function search($table,$column,$column2,$values){
		$column = implode(',', $column);
    	$column2 = implode(',', $column2);
		$s = $this->pdo->prepare("SELECT * FROM ${table} WHERE (${column}) LIKE '%".$values."%' OR (${column2}) LIKE '%".$values."%' ");
		return $s;

	}
	
}
