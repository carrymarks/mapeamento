<?php
if(isset($_GET['us'])){?><?php 
include "conexao.php";

class TipoEquipamento{
	
	
	function Tipoequipamento(){
		}
		
		function Inserir($eqp,$cadastro){
		$sql="insert into tbl_cadastro_equipamento(`Tipo_Equipamento`,`Cadastro`) values ('$eqp','$cadastro')";
		$comando=mysql_query($sql);
		if($comando){
			return mysql_insert_id();
	}
	}	
		function Editar($eqp,$cadastro,$cod){
			$sql="update  tbl_cadastro_equipamento set `Tipo_Equipamento`='$eqp',`Cadastro`='$cadastro' where `PK_CadastroEquipamento`='$cod'";
				$comando=mysql_query($sql);
		if($comando){			
			return mysql_insert_id();
			}		
			}	
}
			
			?>
			<?php }else{ header ("Location: index.php");} ?>