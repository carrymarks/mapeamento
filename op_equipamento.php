<?php 
session_start();
include "conexao.php";
include "Equipamento.class.php";


if(isset($_POST['i'])){
$i=$_POST['i'];
}

if(isset($_GET['us'])){
$us=$_GET['us'];}

if (isset($_GET['ex'])){
	
if(isset($_GET["cod"]))
$cod=$_GET["cod"];


$eqp = new Equipamento();

$eqp->Excluir($cod);
		header("Location:listaequipamento.php?us=$us");
}else{
		  
		  


if(isset($_POST["teste"])){
$acao=$_POST["teste"];
	}
	
if (isset($_POST["txt_etec"])){
$etec=$_POST["txt_etec"];}

if (isset($_POST["txt_Equipamento"])){
$equipamento=$_POST["txt_Equipamento"];
$dados_equipamento['equipamento'] = $equipamento;
}
	
if (isset($_POST["txt_modelo"])){
$modelo=$_POST["txt_modelo"];
$dados_equipamento['modelo'] = $modelo;
}

if (isset($_POST["txt_especificacaoorgao"])){
$especificacaoorgao=$_POST["txt_especificacaoorgao"];
$dados_equipamento['especificacaoorgao'] = $especificacaoorgao;
}

if (isset($_POST["txt_atualizacaotecnologica"])){
$atualizacaotecnologica=$_POST["txt_atualizacaotecnologica"];
$dados_equipamento['atualizacaotecnologica'] = $atualizacaotecnologica;
}

if(isset($_POST["txt_baixapatrimonial"])){
$baixapatrimonial=$_POST["txt_baixapatrimonial"];
$dados_equipamento['baixapatrimonial'] = $baixapatrimonial;
}
	
if(isset($_POST["txt_orgaoclasse"])){
$orgaoclasse=$_POST["txt_orgaoclasse"];
$dados_equipamento['orgaoclasse'] = $orgaoclasse;
}
	

if(isset($_POST["txt_aquisicao"])){
$aquisicao=$_POST["txt_aquisicao"];
$dados_equipamento['aquisicao'] = $aquisicao;
}
	
if(isset($_POST["txt_anoaquisicao"])){
$anoaquisicao=$_POST["txt_anoaquisicao"];
$dados_equipamento['anoaquisicao'] = $anoaquisicao;
}
	
if(isset($_POST["txt_outraunidade"])){
$outraunidade=$_POST["txt_outraunidade"];
$dados_equipamento['outraunidade'] = $outraunidade;
}	
	
if(isset($_POST["txt_especificacao"])){
$especificacao=$_POST["txt_especificacao"];
$dados_equipamento['especificacao'] = $especificacao;
}	
			
	
if(isset($_POST["txt_patrimonio0"])){
$patrimonio=$_POST["txt_patrimonio0"];
$dados_equipamento['patrimonio'] = $patrimonio;
}else{
	$dados_equipamento['patrimonio'] = "";
	}

if(isset($_POST["txt_justificativa"])){
$justificativa=$_POST["txt_justificativa"];
$dados_equipamento['justificativa'] = $justificativa;
}

	
if(isset($_POST["txt_ociosidade"])){
$ociosidade=$_POST["txt_ociosidade"];
$dados_equipamento['ociosidade'] = $ociosidade;
}	
	
if(isset($_POST["txt_ambiente"])){
$ambiente=$_POST["txt_ambiente"];
$dados_equipamento['ambiente'] = $ambiente;
}	


if(isset($_POST["txt_usabilidade"])){
$usabilidade=$_POST["txt_usabilidade"];
$dados_equipamento['usabilidade'] = $usabilidade;
}
	
if(isset($_POST["txt_historico"])){
$historico=$_POST["txt_historico"];
$dados_equipamento['historico'] = $historico;
}

if(isset($_POST["txt_ocorrencia"])){
$ocorrencia=$_POST["txt_ocorrencia"];
$dados_equipamento['ocorrencia'] = $ocorrencia;
	}

if(isset($_POST["txt_detalheaquisicao"])){
$detalheaquisicao=$_POST["txt_detalheaquisicao"];
	$dados_equipamento['detalheaquisicao'] = $detalheaquisicao;
	}

if(isset($_POST["txt_quantidade"])){
$quantidade=$_POST["txt_quantidade"];
$dados_equipamento['quantidade'] = $quantidade;
}	

if(isset($_POST["txt_descricao"])){
$descricao=$_POST["txt_descricao"];
$dados_equipamento['descricao'] = $descricao;

}

if(isset($_POST["txt_justificativa"])){
$justificativa=$_POST["txt_justificativa"];
$dados_equipamento['justificativa'] = $justificativa;

}
if(isset($_POST["txt_motivo"])){
$motivo=$_POST["txt_motivo"];
$dados_equipamento['motivo'] = $motivo;

}

if(isset($_POST["txt_potencia"])){
$potencia=$_POST["txt_potencia"];

	}
	
if(isset($_POST["txt_tipotomada"])){
$tipotomada=$_POST["txt_tipotomada"];	

	}	
	
if(isset($_POST["txt_pesokg"])){
$peso=$_POST["txt_pesokg"];

}	

if(isset($_POST["txt_dimensaoaltura"])){
$dimensaoaltura=$_POST["txt_dimensaoaltura"];	

	}
	
if(isset($_POST["txt_dimensaolargura"])){
$dimensaolargura=$_POST["txt_dimensaolargura"];	

	}	
	
if(isset($_POST["txt_dimensaocomprimento"])){
$dimensaocomprimento=$_POST["txt_dimensaocomprimento"];

	}	

if (isset($_POST["cod"])){
$cod=$_POST["cod"];}	

if(isset($_GET["cod"])){
$cod=$_GET["cod"];}

if(isset($_POST["acao"])){
$acao=$_POST["acao"];}

if(isset($_POST["radio"])){
$radio=$_POST["radio"];	}

if(isset($_POST["txt_optransferencia"])){
$transferencia=$_POST["txt_optransferencia"];}



if(isset($_POST['validacao'])){
$val=$_POST['validacao'];	
	}



if($val==1){
$us=base64_encode($us);
header("Location:Frm_Equipamento.php?us=$us&acao=$acao&codetec=$etec&cod=$cod");
		
	}else{
	
if (isset($_POST['Salvar'])) {
	
	if($radio=="Sim"){
	
$foto = $_FILES["txt_imagemeqp"];

// Se a foto estiver sido selecionada
	if (!empty($foto["name"])) {
 
    	// Verifica se o arquivo é uma imagem
    	//if(!eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $foto["type"])){
     	  // $error[1] = "Isso não é uma imagem.";
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

$eqp = new Equipamento();


if($acao == "adc"){
	
	 $us= base64_encode($us);
	$FK_equipamento=	$eqp->Inserir($etec,$equipamento,$modelo,$especificacaoorgao,$atualizacaotecnologica,$baixapatrimonial,$orgaoclasse,$aquisicao,$anoaquisicao,$outraunidade,$especificacao,$nome_imagem,$ociosidade,$ambiente,$usabilidade,$historico,$ocorrencia,$detalheaquisicao,$quantidade,$descricao,$justificativa,$modelo,$transferencia,$potencia,$dimensaoaltura,$dimensaolargura,$dimensaocomprimento,$tipotomada,$peso);
	
		
		$i=$_POST['txt_quantidade'];
		while($i>0){
			$vet_patrimonio[$i] = $_POST['txt_patrimonio'.$i];
			
			$sql = "INSERT INTO tbl_patrimonio(FK_equipamento,patrimonio) VALUES ('$FK_equipamento','$vet_patrimonio[$i]')";
		mysql_query($sql);
		$i=$i-1;
		}
		
		echo("<script type='text/javascript'> alert('Cadastro efetuado com sucesso.'); location.href='listaequipamento.php?us=$us';</script>");
		//header("Location:listaequipamento.php?us=$us");
}


		if($acao == "edt"){
			
			if (isset($_FILES['campo_file'])){

	}
     		 $sql = "SELECT * FROM tbl_material WHERE PK_CodMaterial = '$cod'";
			 $qry = mysql_query($sql);
			 $linha = mysql_fetch_array($qry);
			 $quantidade = $_POST['txt_quantidade'];
			 $_SESSION['dados_equipamento']['quantidade'] = $quantidade;
			 
			 
			 if($quantidade != $linha['Quantidade']){
				 
				 mysql_query("UPDATE tbl_material SET Quantidade = '$quantidade' WHERE PK_CodMaterial='$cod'");
				 $us=base64_encode($us);
			       header("Location:Frm_Equipamento.php?us=$us=&acao=edt&cod=$cod&codetec=$etec");
			 }else{
			 $us= base64_encode($us);
			 
			 
			 
			 
		$eqp->Editar($etec,$equipamento,$modelo,$especificacaoorgao,$atualizacaotecnologica,$baixapatrimonial,$orgaoclasse,$aquisicao,$anoaquisicao,$outraunidade,$especificacao,$nome_imagem,$ociosidade,$ambiente,$usabilidade,$historico,$ocorrencia,$detalheaquisicao,$quantidade,$descricao,$justificativa,$motivo,$transferencia,$potencia,$dimensaoaltura,$dimensaolargura,$dimensaocomprimento,$tipotomada,$peso,$cod);
		$i=1;
		
		$sql_delete = "DELETE FROM tbl_patrimonio WHERE FK_equipamento = '$cod'";
		$qry_delete = mysql_query($sql_delete);
		
		$i=$_POST['txt_quantidade'];
		while($i>0){
			$vet_patrimonio[$i] = $_POST['txt_patrimonio'.$i];
			
			$sql = "INSERT INTO tbl_patrimonio(FK_equipamento,patrimonio) VALUES ('$cod','$vet_patrimonio[$i]')";
		mysql_query($sql);
		$i=$i-1;
		}
echo("<script type='text/javascript'> alert('Alteração efetuada com sucesso.'); location.href='listaequipamento.php?us=$us';</script>");
			//header("Location:listaequipamento.php?us=$us");
		
			 }
}
		
		
	if($acao == "del"){
		 $us= base64_encode($us);
		$eqp->Excluir($cod);
		header("Location:listaequipamento.php?us=$us");
		}
}
	
?>
<?php }



$_SESSION['dados_equipamento'] = $dados_equipamento;
if(isset($nome_imagem)){
	$_SESSION['dados_equipamento']['nome_imagem']=$nome_imagem;
}else{
	$_SESSION['dados_equipamento']['nome_imagem']="";
	}
	
	
?>