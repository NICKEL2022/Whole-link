<?php 
//Database linkage
function connect($host=DB_HOST,$user=DB_USER,$password=DB_PASSWORD,$database=DB_DATABASE,$port=DB_PORT){
	$link=@mysqli_connect($host, $user, $password, $database, $port);
	if(mysqli_connect_errno()){
		exit(mysqli_connect_error());
	}
	mysqli_set_charset($link,'utf8');
	return $link;
}
//Execute a SQL statement, return a result set object or return a Boolean value
function execute($link,$query){
	$result=mysqli_query($link,$query);
	if(mysqli_errno($link)){
		exit(mysqli_error($link));
	}
	return $result;
}
//Execute a SQL statement and only return boolean values
function execute_bool($link,$query){
	$bool=mysqli_real_query($link,$query);
	if(mysqli_errno($link)){
		exit(mysqli_error($link));
	}
	return $bool;
}
function execute_multi($link,$arr_sqls,&$error){
	$sqls=implode(';',$arr_sqls).';';
	if(mysqli_multi_query($link,$sqls)){
		$data=array();
		$i=0;//count
		do {
			if($result=mysqli_store_result($link)){
				$data[$i]=mysqli_fetch_all($result);
				mysqli_free_result($result);
			}else{
				$data[$i]=null;
			}
			$i++;
			if(!mysqli_more_results($link)) break;
		}while (mysqli_next_result($link));
		if($i==count($arr_sqls)){
			return $data;
		}else{
			$error="sql statement failed to execute:<br />&nbsp;The array subscript is{$i}statement:{$arr_sqls[$i]}execution error<br />&nbsp;wrong reason：".mysqli_error($link);
			return false;
		}
	}else{
		$error='Execution failed! Please check that the first sentence is correct!<br />possible cause of error：'.mysqli_error($link);
		return false;
	}
}
//Get the number of records
function num($link,$sql_count){
	$result=execute($link,$sql_count);
	$count=mysqli_fetch_row($result);
	return $count[0];
}
//Escape data before entering the database to ensure that the data can be stored smoothly
function escape($link,$data){
	if(is_string($data)){
		return mysqli_real_escape_string($link,$data);
	}
	if(is_array($data)){
		foreach ($data as $key=>$val){
			$data[$key]=escape($link,$val);
		}
	}
	return $data;
	//mysqli_real_escape_string($link,$data);
}


//close the connection to the database
function close($link){
	mysqli_close($link);
}
?>