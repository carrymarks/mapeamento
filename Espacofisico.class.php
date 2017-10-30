<?php

class EspacoFisico{
	var $_cod;
	var $_curso;
	var $_capacidade;
	var $_area;
	var $_nome_imagem;
	var $_qntaluno;
	var $construcao;
	var $_quantidadebancadas;
	
	function EspacoFisico(){
	}
	function Inserir($cod,$nome,$laboratorio,$descricao,$capacidade,$area,$nome_imagem,$construcao,$quantidadebancadas,$quantidade,$Mseg,$Mter,$Mqua,$Mqui,$Msex,$Msab,$Tseg,$Tter,$Tqua,$Tqui,$Tsex,$Tsab,$Nseg,$Nter,$Nqua,$Nqui,$Nsex,$Nsab,$quadroenergia,$tomanda110,$tomada220,$tomada200,$tipoiluminacao,$qntluminarias,$pedireito,$revestimento,$qntportas,$portalargura,$portaaltura,$seguranca,$exaustor,$seg10,$seg11,$seg12,$seg13,$seg14,$seg15,$seg16,$seg17,$seg18,$seg19,$seg20,$seg21,$seg22,$ter10,$ter11,$ter12,$ter13,$ter14,$ter15,$ter16,$ter17,$ter18,$ter19,$ter20,$ter21,$ter22,$quar10,$quar11,$quar12,$quar13,$quar14,$quar15,$quar16,$quar17,$quar18,$quar19,$quar20,$quar21,$quar22,$quin10,$quin11,$quin12,$quin13,$quin14,$quin15,$quin16,$quin17,$quin18,$quin19,$quin20,$quin21,$quin22,$sex10,$sex11,$sex12,$sex13,$sex14,$sex15,$sex16,$sex17,$sex18,$sex19,$sex20,$sex21,$sex22,$sab10,$sab11,$sab12,$sab13,$sab14,$sab15,$sab16,$sab17,$sab18,$sab19,$sab20,$sab21,$sab22,$obsgeral,$ambientedescricao){
		$sql="insert into tbl_espaco_fisico (`FK_Instituicao`,`FK_Laboratorio`,`Descricao`,`capacidade`,`area`,`Imagem`,`tipo_construcao`,`quantidade_bancadas`,`quantidade_curso`,`Mseg`,`Mter`,`Mqua`,`Mqui`,`Msex`,`Msab`,`Tseg`,`Tter`,`Tqua`,`Tqui`,`Tsex`,`Tsab`,`Nseg`,`Nter`,`Nqua`,`Nqui`,`Nsex`,`Nsab`,`Quadro_Energia`,`Tomada110v`,`Tomada220v`,`Tomada200v`,`Tipo_Iluminacao`,`Quantidade_Luminarias`,`Pe_Direito`,`Tipo_Revestimento`,`Quantidade_Portas`,`Medida_PortaLargura`,`Medida_PortaAltura`,`Equipamento_Seguranca`,`Exaustor`,`Seg10`,`Seg11`,`Seg12`,`Seg13`,`Seg14`,`Seg15`,`Seg16`,`Seg17`,`Seg18`,`Seg19`,`Seg20`,`Seg21`,`Seg22`,`Ter10`,`Ter11`,`Ter12`,`Ter13`,`Ter14`,`Ter15`,`Ter16`,`Ter17`,`Ter18`,`Ter19`,`Ter20`,`Ter21`,`Ter22`,`Quar10`,`Quar11`,`Quar12`,`Quar13`,`Quar14`,`Quar15`,`Quar16`,`Quar17`,`Quar18`,`Quar19`,`Quar20`,`Quar21`,`Quar22`,`Quin10`,`Quin11`,`Quin12`,`Quin13`,`Quin14`,`Quin15`,`Quin16`,`Quin17`,`Quin18`,`Quin19`,`Quin20`,`Quin21`,`Quin22`,`Sex10`,`Sex11`,`Sex12`,`Sex13`,`Sex14`,`Sex15`,`Sex16`,`Sex17`,`Sex18`,`Sex19`,`Sex20`,`Sex21`,`Sex22`,`Sab10`,`Sab11`,`Sab12`,`Sab13`,`Sab14`,`Sab15`,`Sab16`,`Sab17`,`Sab18`,`Sab19`,`Sab20`,`Sab21`,`Sab22`,`Obs_Geral`,`AmbienteDescricao`) values ('$nome','$laboratorio','$descricao','$capacidade','$area','$nome_imagem','$construcao','$quantidadebancadas','$quantidade','$Mseg','$Mter','$Mqua','$Mqui','$Msex','$Msab','$Tseg','$Tter','$Tqua','$Tqui','$Tsex','$Tsab','$Nseg','$Nter','$Nqua','$Nqui','$Nsex','$Nsab','$quadroenergia','$tomanda110','$tomada220','$tomada200','$tipoiluminacao','$qntluminarias','$pedireito','$revestimento','$qntportas','$portalargura','$portaaltura','$seguranca','$exaustor','$seg10','$seg11','$seg12','$seg13','$seg14','$seg15','$seg16','$seg17','$seg18','$seg19','$seg20','$seg21','$seg22','$ter10','$ter11','$ter12','$ter13','$ter14','$ter15','$ter16','$ter17','$ter18','$ter19','$ter20','$ter21','$ter22','$quar10','$quar11','$quar12','$quar13','$quar14','$quar15','$quar16','$quar17','$quar18','$quar19','$quar20','$quar21','$quar22','$quin10','$quin11','$quin12','$quin13','$quin14','$quin15','$quin16','$quin17','$quin18','$quin19','$quin20','$quin21','$quin22','$sex10','$sex11','$sex12','$sex13','$sex14','$sex15','$sex16','$sex17','$sex18','$sex19','$sex20','$sex21','$sex22','$sab10','$sab11','$sab12','$sab13','$sab14','$sab15','$sab16','$sab17','$sab18','$sab19','$sab20','$sab21','$sab22','$obsgeral','$ambientedescricao')";
		$comando=mysql_query($sql)or die(mysql_error());
	if($comando){
			return mysql_insert_id();
	}
	}
function Editar($nome,$laboratorio,$descricao,$capacidade,$area,$nome_imagem,$construcao,$quantidadebancadas,$quantidade,$cod,$Mseg,$Mter,$Mqua,$Mqui,$Msex,$Msab,$Tseg,$Tter,$Tqua,$Tqui,$Tsex,$Tsab,$Nseg,$Nter,$Nqua,$Nqui,$Nsex,$Nsab,$quadroenergia,$tomanda110,$tomada220,$tomada200,$tipoiluminacao,$qntluminarias,$pedireito,$revestimento,$qntportas,$portalargura,$portaaltura,$seguranca,$exaustor,$seg10,$seg11,$seg12,$seg13,$seg14,$seg15,$seg16,$seg17,$seg18,$seg19,$seg20,$seg21,$seg22,$ter10,$ter11,$ter12,$ter13,$ter14,$ter15,$ter16,$ter17,$ter18,$ter19,$ter20,$ter21,$ter22,$quar10,$quar11,$quar12,$quar13,$quar14,$quar15,$quar16,$quar17,$quar18,$quar19,$quar20,$quar21,$quar22,$quin10,$quin11,$quin12,$quin13,$quin14,$quin15,$quin16,$quin17,$quin18,$quin19,$quin20,$quin21,$quin22,$sex10,$sex11,$sex12,$sex13,$sex14,$sex15,$sex16,$sex17,$sex18,$sex19,$sex20,$sex21,$sex22,$sab10,$sab11,$sab12,$sab13,$sab14,$sab15,$sab16,$sab17,$sab18,$sab19,$sab20,$sab21,$sab22,$obsgeral,$ambientedescricao){
		$sql="update tbl_espaco_fisico set `FK_Instituicao`='$nome',`FK_Laboratorio`='$laboratorio',`Descricao`='$descricao',`Capacidade`='$capacidade',`Area`='$area',`Imagem`='$nome_imagem',`tipo_construcao`='$construcao',`Quantidade_Bancadas`='$quantidadebancadas',`quantidade_curso`='$quantidade' , Mseg = '$Mseg', Mter = '$Mter', Mqua = '$Mqua', Mqui = '$Mqui', Msex = '$Msex', Msab = '$Msab',Tseg = '$Tseg',  Tter = '$Tter',Tqua = '$Tqua', Tqui='$Tqui',Tsex='$Tsex',Tsab='$Tsab',Nseg='$Nseg',Nter='$Nter',Nqua='$Nqua',Nqui = '$Nqui', Nsex='$Nsex',Nsab='$Nsab',`Quadro_Energia`='$quadroenergia',`Tomada110v`='$tomanda110',`Tomada220v`='$tomada220',`Tomada200v`='$tomada200',`Tipo_Iluminacao`='$tipoiluminacao',`Quantidade_Luminarias`='$qntluminarias',`Pe_Direito`='$pedireito',`Tipo_Revestimento`='$revestimento',`Quantidade_Portas`='$qntportas',`Medida_PortaLargura`='$portalargura',`Medida_PortaAltura`='$portaaltura',`Equipamento_Seguranca`='$seguranca',`Exaustor`='$exaustor',`Seg10`='$seg10',`Seg11`='$seg11',`Seg12`='$seg12',`Seg13`='$seg13',`Seg14`='$seg14',`Seg15`='$seg15',`Seg16`='$seg16',`Seg17`='$seg17',`Seg18`='$seg18',`Seg19`='$seg19',`Seg20`='$seg20',`Seg21`='$seg21',`Seg22`='$seg22',`Ter10`='$ter10',`Ter11`='$ter11',`Ter12`='$ter12',`Ter13`='$ter13',`Ter14`='$ter14',`Ter15`='$ter15',`Ter16`='$ter16',`Ter17`='$ter17',`Ter18`='$ter18',`Ter19`='$ter19',`Ter20`='$ter20',`Ter21`='$ter21',`Ter22`='$ter22',`Quar10`='$quar10',`Quar11`='$quar11',`Quar12`='$quar12',`Quar13`='$quar13',`Quar14`='$quar14',`Quar15`='$quar15',`Quar16`='$quar16',`Quar17`='$quar17',`Quar18`='$quar18',`Quar19`='$quar19',`Quar20`='$quar20',`Quar21`='$quar21',`Quar22`='$quar22',`Quin10`='$quin10',`Quin11`='$quin11',`Quin12`='$quin12',`Quin13`='$quin13',`Quin14`='$quin14',`Quin15`='$quin15',`Quin16`='$quin16',`Quin17`='$quin17',`Quin18`='$quin18',`Quin19`='$quin19',`Quin20`='$quin20',`Quin21`='$quin21',`Quin22`='$quin22',`Sex10`='$sex10',`Sex11`='$sex11',`Sex12`='$sex12',`Sex13`='$sex13',`Sex14`='$sex14',`Sex15`='$sex15',`Sex16`='$sex16',`Sex17`='$sex17',`Sex18`='$sex18',`Sex19`='$sex19',`Sex20`='$sex20',`Sex21`='$sex21',`Sex22`='$sex22',`Sab10`='$sab10',`Sab11`='$sab11',`Sab12`='$sab12',`Sab13`='$sab13',`Sab14`='$sab14',`Sab15`='$sab15',`Sab16`='$sab16',`Sab17`='$sab17',`Sab18`='$sab18',`Sab19`='$sab19',`Sab20`='$sab20',`Sab21`='$sab21',`Sab22`='$sab22',`Obs_Geral`='$obsgeral',`AmbienteDescricao`='$ambientedescricao' where `PK_CodLaboratorio`='$cod'";
		$comando=mysql_query($sql)or die(mysql_error($sql));
	if($comando){
			return mysql_insert_id();
	}
	}	
	
function Excluir($cod){
		$sql="delete from tbl_espaco_fisico where PK_CodLaboratorio='$cod'";
		$comando=mysql_query($sql);
	if($comando){
			return mysql_insert_id();
	}
	}	


}

?>