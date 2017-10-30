<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<?php
include "conexao.php";
include "Espacofisico.class.php";

session_start();
if(isset($_GET['us'])){
$us=$_GET['us'];}


if(isset($_POST["acao"])){
$acao=$_POST["acao"];	}



if (isset($_POST["cod"])){
	$cod=$_POST["cod"];}
	
if (isset($_GET['ex'])){	
if(isset($_GET["cod"]))
$cod=$_GET["cod"];
$EspacoFisico = new EspacoFisico();

$EspacoFisico->Excluir($cod);
		header("Location:listaespacofisico.php?us=$us");
}else{	


if (isset($_POST["acao"])){
$acao=$_POST["acao"];}

if (isset($_POST["txt_etec"])){
$nome=$_POST["txt_etec"];}
$dados_efisico['nome'] = $nome;


if (isset($_POST["manha"])){
$manha=$_POST["manha"];}
$dados_efisico['manha'] = $manha;



if (isset($_POST["manha2"])){
$manha2=$_POST["manha2"];}
$dados_efisico['manha2'] = $manha2;

if (isset($_POST["manha3"])){
$manha3=$_POST["manha3"];}
$dados_efisico['manha'] = $manha3;

if (isset($_POST["manha4"])){
$manha4=$_POST["manha4"];}
$dados_efisico['manha4'] = $manha4;

if (isset($_POST["manha5"])){
$manha5=$_POST["manha5"];}
$dados_efisico['manha5'] = $manha5;


if (isset($_POST["manha6"])){
$manha6=$_POST["manha6"];}
$dados_efisico['manha6'] = $manha6;

if (isset($_POST["tarde"])){
$tarde=$_POST["tarde"];}
$dados_efisico['tarde'] = $tarde;



if (isset($_POST["tarde2"])){
$tarde2=$_POST["tarde2"];}
$dados_efisico['tarde2'] = $tarde2;

if (isset($_POST["tarde3"])){
$tarde3=$_POST["tarde3"];}
$dados_efisico['tarde3'] = $tarde3;

if (isset($_POST["tarde4"])){
$tarde4=$_POST["tarde4"];}
$dados_efisico['tarde4'] = $tarde4;

if (isset($_POST["tarde5"])){
$tarde5=$_POST["tarde5"];}
$dados_efisico['tarde5'] = $tarde5;

if (isset($_POST["tarde6"])){
$tarde6=$_POST["tarde6"];}
$dados_efisico['tarde6'] = $tarde6;


if (isset($_POST["noite"])){
$noite=$_POST["noite"];}
$dados_efisico['noite'] = $noite;

if (isset($_POST["noite2"])){
$noite2=$_POST["noite2"];}
$dados_efisico['noite2'] = $noite2;

if (isset($_POST["noite3"])){
$noite3=$_POST["noite3"];}
$dados_efisico['noite3'] = $noite3;

if (isset($_POST["noite4"])){
$noite4=$_POST["noite4"];}
$dados_efisico['noite4'] = $noite4;

if (isset($_POST["noite5"])){
$noite5=$_POST["noite5"];}
$dados_efisico['noite5'] = $noite5;

if (isset($_POST["noite6"])){
$noite6=$_POST["noite6"];}
$dados_efisico['noite6'] = $noite6;




if (isset($_POST["txt_Laboratorio"])){
$laboratorio=$_POST["txt_Laboratorio"];
$dados_efisico['laboratorio'] = $laboratorio;
}

if(isset($_POST["txt_descricao"])){
$descricao=$_POST["txt_descricao"];	
$dados_efisico['descricao'] = $descricao;	
}
if (isset($_POST["txt_Area"])){
$area=$_POST["txt_Area"];
$dados_efisico['area'] = $area;
}


if (isset($_POST["txt_CapacidadeAluno"])){
$capacidade=$_POST["txt_CapacidadeAluno"];
$dados_efisico['capacidade']=$capacidade;
}
if (isset($_POST["txt_QuantidadeBancadas"])){
$quantidadebancadas=$_POST["txt_QuantidadeBancadas"];
$dados_efisico['quantidadebancadas'] = $quantidadebancadas;
}

if (isset($_POST["txt_justificativa"])){
$justificativa=$_POST["txt_justificativa"];
$dados_efisico['justificativa'] = $justificativa;
}

if (isset($_POST["txt_motivo"])){
$motivo=$_POST["txt_motivo"];
$dados_efisico['motivo'] = $motivo;
}


if (isset($_POST["txt_TipoConstrucao"])){
$construcao=$_POST["txt_TipoConstrucao"];
$dados_efisico['construcao'] = $construcao;
}


if (isset($_POST["PK_CodLaboratorio"])){
$acao=$_POST["PK_CodLaboratorio"];	
$dados_efisico['PK_CodLaboratorio'] = $acao;
}


if(isset($_POST['txt_quantidade'])){
	$quantidade = $_POST['txt_quantidade'];
	$dados_efisico['quantidade']=$quantidade;
	}
	
if(isset($_POST['manha'])){
$Mseg=$_POST['manha'];
	}	
	
if(isset($_POST['manha2'])){
$Mter=$_POST['manha2'];
	}	

if(isset($_POST['manha3'])){
$Mqua=$_POST['manha3'];
	}
	
if(isset($_POST['manha4'])){
$Mqui=$_POST['manha4'];
	}
	
if(isset($_POST['manha5'])){
$Msex=$_POST['manha5'];
	}
	
if(isset($_POST['manha6'])){
$Msab=$_POST['manha6'];
	}
	
if(isset($_POST['tarde'])){
$Tseg=$_POST['tarde'];
	}
	
if(isset($_POST['tarde2'])){
$Tter=$_POST['tarde2'];
	}
	
if(isset($_POST['tarde3'])){
$Tqua=$_POST['tarde3'];
	}
	
if(isset($_POST['tarde4'])){
$Tqui=$_POST['tarde4'];
	}
	
if(isset($_POST['tarde5'])){
$Tsex=$_POST['tarde5'];
	}
	
if(isset($_POST['tarde6'])){
$Tsab=$_POST['tarde6'];
	}
	
if(isset($_POST['noite'])){
$Nseg=$_POST['noite'];
	}
	
if(isset($_POST['noite2'])){
$Nter=$_POST['noite2'];
	}	
	
if(isset($_POST['noite3'])){
$Nqua=$_POST['noite3'];
	}
	
if(isset($_POST['noite4'])){
$Nqui=$_POST['noite4'];
	}
	
if(isset($_POST['noite5'])){
$Nsex=$_POST['noite5'];
	}	

if(isset($_POST['noite6'])){
$Nsab=$_POST['noite6'];
	}	
	
	
if(isset($_POST['seg10'])){
$seg10=$_POST['seg10'];
}	

if(isset($_POST['seg11'])){
$seg11=$_POST['seg11'];
}

if(isset($_POST['seg12'])){
$seg12=$_POST['seg12'];
}

if(isset($_POST['seg13'])){
$seg13=$_POST['seg13'];
}	

if(isset($_POST['seg14'])){
$seg14=$_POST['seg14'];
}

if(isset($_POST['seg15'])){
$seg15=$_POST['seg15'];
} 

if(isset($_POST['seg16'])){
$seg16=$_POST['seg16'];
}	

if(isset($_POST['seg17'])){
$seg17=$_POST['seg17'];
}

if(isset($_POST['seg18'])){
$seg18=$_POST['seg18'];
} 

if(isset($_POST['seg19'])){
$seg19=$_POST['seg19'];	}

if(isset($_POST['seg20'])){
$seg20=$_POST['seg20'];
}	

if(isset($_POST['seg21'])){
$seg21=$_POST['seg21'];
}

if(isset($_POST['seg22'])){
$seg22=$_POST['seg22'];
}

if(isset($_POST['ter10'])){
$ter10=$_POST['ter10'];	
	}
	
if(isset($_POST['ter11'])){
$ter11=$_POST['ter11'];	
	}
	
if(isset($_POST['ter12'])){
$ter12=$_POST['ter12'];	
	}	

if(isset($_POST['ter13'])){
$ter13=$_POST['ter13'];	
	}
	
if(isset($_POST['ter14'])){
$ter14=$_POST['ter14'];	
	}
	
if(isset($_POST['ter15'])){
$ter15=$_POST['ter15'];	
	}	


if(isset($_POST['ter16'])){
$ter16=$_POST['ter16'];	
	}
	
if(isset($_POST['ter17'])){
$ter17=$_POST['ter17'];	
	}
	
if(isset($_POST['ter18'])){
$ter18=$_POST['ter18'];	
	}	


if(isset($_POST['ter19'])){
$ter19=$_POST['ter19'];	
	}
	
if(isset($_POST['ter20'])){
$ter20=$_POST['ter20'];	
	}
	
if(isset($_POST['ter21'])){
$ter21=$_POST['ter21'];	
	}	

if(isset($_POST['ter22'])){
$ter22=$_POST['ter22'];	
	}	
	

if(isset($_POST['quar10'])){
$quar10=$_POST['quar10'];
}

if(isset($_POST['quar11'])){
$quar11=$_POST['quar11'];
}

if(isset($_POST['quar12'])){
$quar12=$_POST['quar12'];
}

if(isset($_POST['quar13'])){
$quar13=$_POST['quar13'];
}

if(isset($_POST['quar14'])){
$quar14=$_POST['quar14'];
}

if(isset($_POST['quar15'])){
$quar15=$_POST['quar15'];
}

if(isset($_POST['quar16'])){
$quar16=$_POST['quar16'];
}

if(isset($_POST['quar17'])){
$quar17=$_POST['quar17'];
}

if(isset($_POST['quar18'])){
$quar18=$_POST['quar18'];
}

if(isset($_POST['quar19'])){
$quar19=$_POST['quar19'];
}
if(isset($_POST['quar20'])){
$quar20=$_POST['quar20'];
}

if(isset($_POST['quar21'])){
$quar21=$_POST['quar21'];
}

if(isset($_POST['quar22'])){
$quar22=$_POST['quar22'];
}

if(isset($_POST['quin10'])){
$quin10=$_POST['quin10'];	}

if(isset($_POST['quin11'])){
$quin11=$_POST['quin11'];	}

if(isset($_POST['quin12'])){
$quin12=$_POST['quin12'];	}

if(isset($_POST['quin13'])){
$quin13=$_POST['quin13'];	}

if(isset($_POST['quin14'])){
$quin14=$_POST['quin14'];	}

if(isset($_POST['quin15'])){
$quin15=$_POST['quin15'];	}

if(isset($_POST['quin16'])){
$quin16=$_POST['quin16'];	}

if(isset($_POST['quin17'])){
$quin17=$_POST['quin17'];	}

if(isset($_POST['quin18'])){
$quin18=$_POST['quin18'];	}

if(isset($_POST['quin19'])){
$quin19=$_POST['quin19'];	}

if(isset($_POST['quin20'])){
$quin20=$_POST['quin20'];	}

if(isset($_POST['quin21'])){
$quin21=$_POST['quin21'];	}

if(isset($_POST['quin22'])){
$quin22=$_POST['quin22'];	}


if(isset($_POST['sex10'])){
$sex10=$_POST['sex10'];	}

if(isset($_POST['sex11'])){
$sex11=$_POST['sex11'];	}

if(isset($_POST['sex12'])){
$sex12=$_POST['sex12'];	}

if(isset($_POST['sex13'])){
$sex13=$_POST['sex13'];	}

if(isset($_POST['sex14'])){
$sex14=$_POST['sex14'];	}


if(isset($_POST['sex15'])){
$sex15=$_POST['sex15'];	}

if(isset($_POST['sex16'])){
$sex16=$_POST['sex16'];	}

if(isset($_POST['sex17'])){
$sex17=$_POST['sex17'];	}

if(isset($_POST['sex18'])){
$sex18=$_POST['sex18'];	}

if(isset($_POST['sex19'])){
$sex19=$_POST['sex19'];	}


if(isset($_POST['sex20'])){
$sex20=$_POST['sex20'];	}

if(isset($_POST['sex21'])){
$sex21=$_POST['sex21'];	}

if(isset($_POST['sex22'])){
$sex22=$_POST['sex22'];	}

if(isset($_POST['sab10'])){
$sab10=$_POST['sab10'];	}

if(isset($_POST['sab11'])){
$sab11=$_POST['sab11'];	}

if(isset($_POST['sab12'])){
$sab12=$_POST['sab12'];	}

if(isset($_POST['sab13'])){
$sab13=$_POST['sab13'];	}

if(isset($_POST['sab14'])){
$sab14=$_POST['sab14'];	}

if(isset($_POST['sab15'])){
$sab15=$_POST['sab15'];	}

if(isset($_POST['sab16'])){
$sab16=$_POST['sab16'];	}

if(isset($_POST['sab17'])){
$sab17=$_POST['sab17'];	}

if(isset($_POST['sab18'])){
$sab18=$_POST['sab18'];	}

if(isset($_POST['sab19'])){
$sab19=$_POST['sab19'];	}

if(isset($_POST['sab20'])){
$sab20=$_POST['sab20'];	}

if(isset($_POST['sab21'])){
$sab21=$_POST['sab21'];	}

if(isset($_POST['sab22'])){
$sab22=$_POST['sab22'];	}


if(isset($_GET["cod"])){
$cod=$_GET["cod"];}

if (isset($_POST["cod"])){
$cod=$_POST["cod"];}	

if(isset($_POST["acao"])){
$acao=$_POST["acao"];}

if(isset($_POST["radio"])){
$radio=$_POST["radio"];	}

if(isset($_POST["txt_curso"])){
$curso=$_POST["txt_curso"];	
	}
	
if (isset($_POST['txt_etec'])) 
{
	$codetec=$_POST['txt_etec'];
	
	}
	
if(isset($_POST['txt_revestimento'])){
$revestimento=$_POST['txt_revestimento'];	
	}	
	
if(isset($_POST['txt_quadroenergia'])){
$quadroenergia=$_POST['txt_quadroenergia'];
}	

if(isset($_POST['txt_tomada110'])){
$tomanda110=$_POST['txt_tomada110'];
}

if(isset($_POST['txt_tomada220'])){
$tomada220=$_POST['txt_tomada220'];				
				}
				
if(isset($_POST['txt_tomada200'])){
$tomada200=$_POST['txt_tomada200'];	
	}	
	
if(isset($_POST['txt_seguranca'])){
$seguranca=$_POST['txt_seguranca'];	}	


if(isset($_POST['txt_exaustor'])){
$exaustor=$_POST['txt_exaustor'];
}

if(isset($_POST['txt_tipoiluminacao'])){
$tipoiluminacao=$_POST['txt_tipoiluminacao'];
}

if(isset($_POST['txt_pedireito'])){
$pedireito=$_POST['txt_pedireito'];	}

if(isset($_POST['txt_qntdportas'])){
$qntportas=$_POST['txt_qntdportas'];	}
	
if(isset($_POST['txt_portalargura'])){
$portalargura=$_POST['txt_portalargura'];
}

if(isset($_POST['txt_portaaltura'])){
$portaaltura=$_POST['txt_portaaltura'];
}

if(isset($_POST['txt_qntluminarias'])){
$qntluminarias=$_POST['txt_qntluminarias'];
}

if(isset($_POST['txt_obsgeral'])){
$obsgeral=$_POST['txt_obsgeral'];	}

if(isset($_POST['txt_ambientedescricao'])){
$ambientedescricao=$_POST['txt_ambientedescricao'];	}

	
 
if(isset($_POST['validacao'])){
$val=$_POST['validacao'];	
	}



if($val==1){	
	$us=base64_encode($us);
header("Location:frm_espacoFisico.php?us=$us&acao=$acao&codetec=$codetec&cod=$cod");
	}else{


if (isset($_POST['Salvar'])) {
	
	if($radio=="Sim"){
	
$foto = $_FILES["txt_imagem"];

// Se a foto estiver sido selecionada
	if (!empty($foto["name"])) {
 
    	// Verifica se o arquivo é uma imagem
    	//if(!eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $foto["type"])){
     	//   $error[1] = "Isso não é uma imagem.";
   	 	//} 
 
			// Pega extensão da imagem
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
 
        	// Gera um nome único para a imagem
        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
 
        	// Caminho de onde ficará a imagem
        	$caminho_imagem = "fotos_espacofisico/" . $nome_imagem;
 
			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($foto["tmp_name"], $caminho_imagem);
 $nome_imagem='fotos_espacofisico/'.$nome_imagem;
 	
	
	
	}
	
	}else{
		$sqlespaco="select * from tbl_espaco_fisico where `PK_CodLaboratorio`='$cod'";
		$comandoespacofoto=mysql_query($sqlespaco);
		$linhafoto=mysql_fetch_array($comandoespacofoto);
		$nome_imagem=$linhafoto['Imagem'];
		
		
		
		}
		
}

$EspacoFisico = new EspacoFisico();
if(!isset($nome_imagem)){
	$nome_imagem = "";
	}

if($acao == "adc"){
		$us= base64_encode($us);
		$ultimoID = $EspacoFisico->Inserir($cod,$nome,$laboratorio,$descricao,$capacidade,$area,$nome_imagem,$construcao,$quantidadebancadas,$justificativa,$motivo,$quantidade,$Mseg,$Mter,$Mqua,$Mqui,$Msex,$Msab,$Tseg,$Tter,$Tqua,$Tqui,$Tsex,$Tsab,$Nseg,$Nter,$Nqua,$Nqui,$Nsex,$Nsab,$quadroenergia,$tomanda110,$tomada220,$tomada200,$tipoiluminacao,$qntluminarias,$pedireito,$revestimento,$qntportas,$portalargura,$portaaltura,$seguranca,$exaustor,$seg10,$seg11,$seg12,$seg13,$seg14,$seg15,$seg16,$seg17,$seg18,$seg19,$seg20,$seg21,$seg22,$ter10,$ter11,$ter12,$ter13,$ter14,$ter15,$ter16,$ter17,$ter18,$ter19,$ter20,$ter21,$ter22,$quar10,$quar11,$quar12,$quar13,$quar14,$quar15,$quar16,$quar17,$quar18,$quar19,$quar20,$quar21,$quar22,$quin10,$quin11,$quin12,$quin13,$quin14,$quin15,$quin16,$quin17,$quin18,$quin19,$quin20,$quin21,$quin22,$sex10,$sex11,$sex12,$sex13,$sex14,$sex15,$sex16,$sex17,$sex18,$sex19,$sex20,$sex21,$sex22,$sab10,$sab11,$sab12,$sab13,$sab14,$sab15,$sab16,$sab17,$sab18,$sab19,$sab20,$sab21,$sab22,$obsgeral,$ambientedescricao) or die ($mysql_error());
		
		$i = $quantidade;
		while($i>0){
		$vet_curso[$i] = $_POST['txt_curso'.$i];
		$sql = "INSERT INTO tbl_espaco_curso(FK_espaco,FK_curso) VALUES ('$ultimoID','$vet_curso[$i]')";
		mysql_query($sql) or die (mysql_error());
		$i--;
		echo("<script type='text/javascript'> alert('Cadastro efetuado com sucesso.'); location.href='listaespacofisico.php?us=$us';</script>");
		
		//header("Location:listaespacofisico.php?us=$us");	
		}
		 
		}
		
if($acao == "edt"){		
		
		$sql = "SELECT*FROM tbl_espaco_fisico WHERE PK_CodLaboratorio = '$cod'";
		$qry = mysql_query($sql) or die (mysql_error());
		
		if(@mysql_result($qry,0,'quantidade_curso')!=$quantidade){
			$sql = "UPDATE tbl_espaco_fisico SET quantidade_curso = '$quantidade' where PK_CodLaboratorio='$cod'";
			mysql_query($sql) or die(mysql_error());
			$us=base64_encode($us);
		header("Location:frm_espacoFisico.php?us=$us&acao=edt&cod=$cod");
	
		}else{
					$EspacoFisico->Editar($nome,$laboratorio,$descricao,$capacidade,$area,$nome_imagem,$construcao,$quantidadebancadas,$justificativa,$motivo,$quantidade,$cod,$Mseg,$Mter,$Mqua,$Mqui,$Msex,$Msab,$Tseg,$Tter,$Tqua,$Tqui,$Tsex,$Tsab,$Nseg,$Nter,$Nqua,$Nqui,$Nsex,$Nsab,$quadroenergia,$tomanda110,$tomada220,$tomada200,$tipoiluminacao,$qntluminarias,$pedireito,$revestimento,$qntportas,$portalargura,$portaaltura,$seguranca,$exaustor,$seg10,$seg11,$seg12,$seg13,$seg14,$seg15,$seg16,$seg17,$seg18,$seg19,$seg20,$seg21,$seg22,$ter10,$ter11,$ter12,$ter13,$ter14,$ter15,$ter16,$ter17,$ter18,$ter19,$ter20,$ter21,$ter22,$quar10,$quar11,$quar12,$quar13,$quar14,$quar15,$quar16,$quar17,$quar18,$quar19,$quar20,$quar21,$quar22,$quin10,$quin11,$quin12,$quin13,$quin14,$quin15,$quin16,$quin17,$quin18,$quin19,$quin20,$quin21,$quin22,$sex10,$sex11,$sex12,$sex13,$sex14,$sex15,$sex16,$sex17,$sex18,$sex19,$sex20,$sex21,$sex22,$sab10,$sab11,$sab12,$sab13,$sab14,$sab15,$sab16,$sab17,$sab18,$sab19,$sab20,$sab21,$sab22,$obsgeral,$ambientedescricao);
					
					
					$us=base64_encode($us);
echo("<script type='text/javascript'> alert('Alteraçao efetuada com sucesso.'); location.href='listaespacofisico.php?us=$us';</script>");					
			//header("Location:listaespacofisico.php?us=$us");
			$sql = "DELETE FROM tbl_espaco_curso WHERE FK_espaco = '$cod'";
			mysql_query($sql) or die(mysql_error());
			$i = $quantidade;
			
			while($i>0){
				$vet_efisico[$i] = $_POST['txt_curso'.$i];
				$sql = "INSERT INTO tbl_espaco_curso(FK_espaco,FK_curso) VALUES('$cod','$vet_efisico[$i]')";
				mysql_query($sql)or die(mysql_error());
				$i--;}
				
	
				
		}
		
				
			
			
			
			
			
			
			
			
			
			
			$us= base64_encode($us);

			}
		
		
		}
		
if ($acao == "del"){
	$us= base64_encode($us);
	echo $cod;
		$EspacoFisico->Excluir($cod) or die(mysql_error());	
		header("Location:listaespacofisico.php?us=$us");
		
			}
}





$_SESSION['dados_efisico'] = $dados_efisico;
if(isset($nome_imagem)){
		$_SESSION['dados_efisico']['nome_imagem'] = $nome_imagem;
		}else{
			$_SESSION['dados_efisico']['nome_imagem'] = "";
			}
		
			
?>
  

