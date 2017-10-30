<?php 
class Lab{
	
	function Lab(){
		}
	function Inserir($cod,$lab,$cadastro){
		$sql="insert into tbl_cadastrolaboratorio (`Nome_Laboratorio`,`Cadastro`) values ('$lab','$cadastro')";
		$comando=mysql_query($sql);
		if($comando){
			return mysql_insert_id();
	}
		}	
	function Editar($lab,$cadastro,$cod){
		$sql="update  tbl_cadastrolaboratorio set `Nome_Laboratorio`='$lab',`Cadastro`='$cadastro' where `PK_CodLaboratorio`='$cod'";
		$comando=mysql_query($sql);
		if($comando){
			return mysql_insert_id();
	}
		}	
	function Excluir($cod){
		$sql="delet from  tbl_cadastrolaboratorio where `PK_CodLaboratorio`='$cod'";
		$comando=mysql_query($sql);
		if($comando){
			return mysql_insert_id();
	}
		}	
	
	}


?>