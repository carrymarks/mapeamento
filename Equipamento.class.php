<?php 
include "conexao.php";

class Equipamento{
	
	
	function Equipamento(){
	}
	function Inserir($etec,$equipamento,$modelo,$especificacaoorgao,$atualizacaotecnologica,$baixapatrimonial,$orgaoclasse,$aquisicao,$anoaquisicao,$outraunidade,$especificacao,$nome_imagem,$ociosidade,$ambiente,$usabilidade,$historico,$ocorrencia,$detalheaquisicao,$quantidade,$descricao,$justificativa,$transferencia,$potencia,$dimensaoaltura,$dimensaolargura,$dimensaocomprimento,$tipotomada,$peso){
		$sql="insert into  tbl_material (`FK_Instituicao`,`FK_Equipamento`,`Modelo`,`Especificacao_Orgao`,`FK_AtualizacaoTecnologia`,`Baixa_Patrimonial`,`Orgao_Classe`,`FK_FormaAquisicao`,`Ano_Aquisicao`,`Outra_Unidade`,`Especificacao`,`Imagem`,`Ociosidade`,`FK_EspacoFisico`,`Usabilidade`,`Historico`,`Ocorrencia`,`Detalhe_Aquisicao`,`Quantidade`,`Descricao`,`justificativa`,`Transferencia`,`Potencia`,`DimensaoAltura`,`DimensaoLargura`,`DimensaoComprimento`,`TipoTomada`,`Peso`) values ('$etec','$equipamento','$modelo','$especificacaoorgao','$atualizacaotecnologica','$baixapatrimonial','$orgaoclasse','$aquisicao','$anoaquisicao','$outraunidade','$especificacao','$nome_imagem','$ociosidade','$ambiente','$usabilidade','$historico','$ocorrencia','$detalheaquisicao','$quantidade','$descricao','$justificativa','$transferencia','$potencia','$dimensaoaltura','$dimensaolargura','$dimensaocomprimento','$tipotomada','$peso')";
		$comando=mysql_query($sql);
		if($comando){
			return mysql_insert_id();
	}
	}	
	
	function Editar($etec,$equipamento,$modelo,$especificacaoorgao,$atualizacaotecnologica,$baixapatrimonial,$orgaoclasse,$aquisicao,$anoaquisicao,$outraunidade,$especificacao,$nome_imagem,$ociosidade,$ambiente,$usabilidade,$historico,$ocorrencia,$detalheaquisicao,$quantidade,$descricao,$justificativa,$transferencia,$potencia,$dimensaoaltura,$dimensaolargura,$dimensaocomprimento,$tipotomada,$peso,$cod){
		$sql="update  tbl_material set  `FK_Instituicao`='$etec',`FK_Equipamento`='$equipamento',`Modelo`='$modelo',`Especificacao_Orgao`='$especificacaoorgao',`FK_AtualizacaoTecnologia`='$atualizacaotecnologica',`Baixa_Patrimonial`='$baixapatrimonial',`Orgao_Classe`='$orgaoclasse',`FK_FormaAquisicao`='$aquisicao',`Ano_Aquisicao`='$anoaquisicao',`Outra_Unidade`='$outraunidade',`Especificacao`='$especificacao',`Imagem`='$nome_imagem',`Ociosidade`='$ociosidade',`FK_EspacoFisico`='$ambiente',`Usabilidade`='$usabilidade',`Historico`='$historico',`Ocorrencia`='$ocorrencia',`Detalhe_Aquisicao`='$detalheaquisicao',`Quantidade`='$quantidade',`Descricao`='$descricao',`justificativa`='$justificativa',`Transferencia`='$transferencia',`Potencia`='$potencia',`DimensaoAltura`='$dimensaoaltura',`DimensaoLargura`='$dimensaolargura',`DimensaoComprimento`='$dimensaocomprimento',`TipoTomada`='$tipotomada',`Peso`='$peso' where `PK_CodMaterial`='$cod'";
		$comando=mysql_query($sql);
		if($comando){			
			return mysql_insert_id();
			}
		
	}	
	
	function Excluir($cod){
		$sql="delete from tbl_material where `PK_CodMaterial`='$cod'";
		$comando=mysql_query($sql);
		if($comando){
			return mysql_insert_id();
			}
		}
		
		
	
	}
?>