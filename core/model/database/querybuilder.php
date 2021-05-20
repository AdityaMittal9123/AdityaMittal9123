<?php
class QueryBuilder{
	public function fetchOne($table,$names,$values){
		$names=implode(',',$names);
		$values=implode(',',$values);
		$qry="SELECT * FROM {$table} WHERE {$names} = '{$values}'";
		$result=mysqli_query($GLOBALS['conn'],$qry);
		if($result)
			return (mysqli_fetch_assoc($result));
		else
			return NULL;
	}
	public function fetchOne1($table,$where){
		$qry="SELECT * FROM {$table} WHERE {$where}";
		$result=mysqli_query($GLOBALS['conn'],$qry);
		if($result)
			return (mysqli_fetch_assoc($result));
		else
			return NULL;
	}
	public function fetchList($table,$name=1,$value=1){
		$qry="SELECT * FROM {$table} WHERE {$name}={$value}";
		$result=mysqli_query($GLOBALS['conn'],$qry);		
		return $result;
	}
	public function fetchList1($table,$whereClause){
		$qry="SELECT * FROM {$table} WHERE {$whereClause}";
		$result=mysqli_query($GLOBALS['conn'],$qry);		
		return $result;
	}
	public function fetchList2($table,$limit,$offset){
		$limit+=1;
		$limit=abs($limit);
		$offset=abs($offset);
		$qry="SELECT * FROM {$table} LIMIT {$offset},{$limit}";
		$result=mysqli_query($GLOBALS['conn'],$qry);		
		return $result;
	}		
	public function fetchList3($table,$limit,$offset,$order,$q){
		$limit+=1;
		$limit=abs($limit);
		$offset=abs($offset);
		$qry="SELECT * FROM {$table} ";
		$qry.=!empty($q)?"WHERE {$q}":'';
		$qry.=" ORDER BY {$order} LIMIT {$offset},{$limit}";
		$result=mysqli_query($GLOBALS['conn'],$qry);		
		return $result;
	}		
	public function insert($table,$names,$values){	
		$names=implode(',',$names);
		$values=implode(',',$values);
		$qry="INSERT INTO {$table} ({$names}) VALUES ({$values})";
		$result=mysqli_query($GLOBALS['conn'],$qry);
		return ($GLOBALS['conn']->insert_id);
	}	
	public function delete($table,$name,$value){	
		$qry="DELETE FROM {$table} WHERE {$name}= '{$value}'";
		$result=mysqli_query($GLOBALS['conn'],$qry);
		return ($result);
	}
	public function delete2($table,$name1,$value1,$name2,$value2, $name3=null, $value3=null){
		$qry="DELETE FROM {$table} WHERE {$name1}= '{$value1}' and {$name2}= '{$value2}'";
		if ($name3 !=null && $value3 !=null) {
			$qry.="and {$name3}= '{$value3}'";
		}
		$result=mysqli_query($GLOBALS['conn'],$qry);
		return ($result);
	}	
	public function update($table,$update,$check,$id){	
		$str=',';
		foreach ($update as $key => $value) {
			$str=$str.$key."='{$value}',";
		}
		$str=trim($str,',');
		$qry="UPDATE {$table} SET {$str} WHERE {$check}='{$id}'";
		$result=mysqli_query($GLOBALS['conn'],$qry);
		return ($result);
	}	
	public function updateOrCreate($table,$update){	
		$str=',';
		$str1='AND';
		foreach ($update[1] as $key => $value) {
			$str=$str.$key."='{$value}',";
		}
		$str=trim($str,',');
		foreach ($update[0] as $key => $value) {
			$str1=$str1.$key."={$value} AND ";
		}
		$str1=trim($str1,' AND ');
		$result = self::fetchOne1($table,$str1);
		if ( is_null( $result ) ) {
			return self::insert($table, array_keys($update[0]), array_values($update[0]));
		} 
		$qry="UPDATE {$table} SET {$str} WHERE {$str1}";
		return mysqli_query($GLOBALS['conn'],$qry);
	}
}
?>	