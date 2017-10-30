<?php
include "conexao.php";

if(isset($_GET['us'])){
$us=$_GET['us'];	
	}

	$us=base64_decode($us);
	$sql="select * from tbl_usuario where `PK_Login`='$us'";
	$comando=mysql_query($sql);
	$linhap=mysql_fetch_array($comando);
	$medio=$linhap['Nivel_Acesso'];
	$usu=$linhap['FK_Etec'];
	$us=base64_encode($us);


		mysql_query("SET NAMES 'latin1'");
        mysql_query('SET character_set_connection=latin1');
        mysql_query('SET character_set_client=latin1');
        mysql_query('SET character_set_results=latin1');
// Definimos o nome do arquivo que será exportado
$arquivo = 'lista_equipamentos.xls';
if($medio=="Administrador"){
   $query = "select * from tbl_material inner join tbl_etec on tbl_material.FK_Instituicao=tbl_etec.PK_CodEtec inner join tbl_cadastro_equipamento on tbl_cadastro_equipamento.PK_CadastroEquipamento=tbl_material.FK_Equipamento inner join tbl_espaco_fisico on tbl_espaco_fisico.PK_CodLaboratorio=tbl_material.FK_EspacoFisico";
   }else{
	$query = "select * from tbl_material inner join tbl_etec on tbl_material.FK_Instituicao=tbl_etec.PK_CodEtec inner join tbl_cadastro_equipamento on tbl_cadastro_equipamento.PK_CadastroEquipamento=tbl_material.FK_Equipamento inner join tbl_espaco_fisico on tbl_espaco_fisico.PK_CodLaboratorio=tbl_material.FK_EspacoFisico where tbl_material.FK_Instituicao=$usu"; 
   }
$resultado = mysql_query ($query);

$html = '';
$html .= '<table border=1>';
$html .= '<tr>';
$html .= '<td colspan=5 align=center><b>Equipamentos</b></tr>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td><b>Etec</b></td>';
$html .= '<td><b>Equipamento</b></td>';
$html .= '<td><b>Ambiente Alocado</b></td>';
$html .= '<td><b>Numero_Patrimonio</b></td>';
$html .= '<td><b>Modelo</b></td>';
$html .= '<td><b>Ano_Aquisicao</b></td>';
$html .= '<td><b>Outro_Equipamento</b></td>';
$html .='<td><b>Quantidade de Curso</b></td>';
$html .='<td><b>Ociosidade</b></td>';
$html .='<td><b>Baixa_Patrimonial</b></td>';
$html .='<td><b>Ocorrencia</b></td>';
$html .='<td><b>Especificacao_Orgao</b></td>';
$html .='<td><b>Orgao_Classe</b></td>';
$html .='<td><b>Outra_Unidade</b></td>';
$html .='<td><b>Especificacao</b></td>';
$html .='<td><b>Historico</b></td>';
$html .='<td><b>Usabilidade</b></td>';
$html .='<td><b>Detalhe_Aquisicao</b></td>';
$html .='<td><b>Quantidade</b></td>';
$html .='<td><b>Descricao</b></td>';
$html .='<td><b>justificativa</b></td>';
$html .='<td><b>Transferencia</b></td>';
$html .='<td><b>Potencia</b></td>';
$html .='<td><b>DimensaoAltura</b></td>';
$html .='<td><b>DimensaoLargura</b></td>';
$html .='<td><b>DimensaoComprimento</b></td>';
$html .='<td><b>TipoTomada</b></td>';
$html .='<td><b>Peso</b></td>';
$html .='<td><b>Atualização Tecnológica</b></td>';
$html .='<td><b>Numero_Patrimonio</b></td>';
$html .= '</tr>';

while($linha = mysql_fetch_array ($resultado)){



$artista_musica  = $linha ['Etec'];
$titulo_musica   = $linha ['Numero_Patrimonio'];
$musica          = $linha ['Modelo'];
$copyright       = $linha ['Ano_Aquisicao'];
$status          = $linha ['Outro_Equipamento'];

if($linha['Ano_Aquisicao']=="anterior 2"){ $linha['Ano_Aquisicao']="Anterior a 2005";}else{$linha['Ano_Aquisicao'];} 


$html .= '<tr>';
$html .= '<td>' . $linha['Etec']. '</td>';
$html .= '<td>' . $linha['Tipo_Equipamento']. '</td>';
$html .= '<td>' . $linha['Descricao']. '</td>';
$html .= '<td>' .$linha['Numero_Patrimonio']. '</td>';
$html .= '<td>' .$linha['Modelo']. '</td>';
$html .= '<td>' .$linha['Ano_Aquisicao']. '</td>';
$html .= '<td>' .$linha['Outro_Equipamento']. '</td>';
$html .= '<td>' .$linha['Ociosidade']. '</td>';
$html .= '<td>' .$linha['Ociosidade']. '</td>';
$html .= '<td>' .$linha['Baixa_Patrimonial']. '</td>';
$html .= '<td>' .$linha['Ocorrencia']. '</td>';
$html .= '<td>' .$linha['Especificacao_Orgao']. '</td>';
$html .= '<td>' .$linha['Orgao_Classe']. '</td>';
$html .= '<td>' .$linha['Outra_Unidade']. '</td>';
$html .= '<td>' .$linha['Especificacao']. '</td>';
$html .= '<td>' .$linha['Historico']. '</td>';
$html .= '<td>' .$linha['Usabilidade']. '</td>';
$html .= '<td>' .$linha['Detalhe_Aquisicao']. '</td>';
$html .= '<td>' .$linha['Quantidade']. '</td>';
$html .= '<td>' .$linha['Descricao']. '</td>';
$html .= '<td>' .$linha['justificativa']. '</td>';
$html .= '<td>' .$linha['Transferencia']. '</td>';
$html .= '<td>' .$linha['Potencia']. '</td>';
$html .= '<td>' .$linha['DimensaoAltura']. '</td>';
$html .= '<td>' .$linha['DimensaoLargura']. '</td>';
$html .= '<td>' .$linha['DimensaoComprimento']. '</td>';
$html .= '<td>' .$linha['TipoTomada']. '</td>';
$html .= '<td>' .$linha['Peso'] . '</td>';

if($linha['FK_AtualizacaoTecnologia']==1){
$atualiza="a) Tecnologia de Ponta";	
	}
if($linha['FK_AtualizacaoTecnologia']==2){
$atualiza="b) Atual";	
	}	
if($linha['FK_AtualizacaoTecnologia']==3){
$atualiza="c) Antigo, mas não obsoleto";	
	}
if($linha['FK_AtualizacaoTecnologia']==4){
$atualiza="d) Obsoleto";	
	}	
	
$html .= '<td>' .$atualiza. '</td>';

$sqlPat="select * from tbl_patrimonio where FK_equipamento=".$linha['PK_CodMaterial'];
$qryPat=mysql_query($sqlPat);
while($linhaPat=mysql_fetch_array($qryPat)){

$html .= '<td>' .$linhaPat['patrimonio']. '</td>';
}
$html .= '</tr>';
}
$html .= '</table>';

// Configurações header para forçar o download
header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/x-msexcel");
header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
header ("Content-Description: PHP Generated Data" );

// Envia o conteúdo do arquivo
echo $html;
?>