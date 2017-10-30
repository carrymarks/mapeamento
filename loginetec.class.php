<?php 

class Cadastrologin{
	
	function Cadastrologin(){
		}
	function Inserir($cod,$login,$senha,$eteclogin,$nivel,$supervisor){
		$sql="insert into tbl_usuario (`PK_Login`,`Login`,`Senha`,`FK_Etec`,`Nivel_Acesso`,Supervisor) values ('$cod','$login','$senha','$eteclogin','$nivel','$supervisor')";
			$comando=mysql_query($sql);
	if($comando){
			return mysql_insert_id();
	}
		}
	function Editar($login,$senha,$eteclogin,$nivel,$cod,$supervisor){
		$sql="update tbl_usuario set `Login`='$login',`Senha`='$senha',`FK_Etec`='$eteclogin',`Nivel_Acesso`='$nivel',Supervisor='$supervisor' where `PK_Login`='$cod'";
			$comando=mysql_query($sql);
	if($comando){
			return mysql_insert_id();
	}
		}	
		function Excluir($cod){
			$sql="delete from tbl_usuario where `PK_Login`='$cod' ";
				$comando=mysql_query($sql);
	if($comando){
			return mysql_insert_id();
	}
			}
}

?>