<?php
if(isset($_GET['us'])){?>

<?php 
include "conexao.php";
include "Equipamento.class.php";


if(isset($_GET['us'])){
$us=$_GET['us'];}

if (isset($_GET['ex'])){
	
if(isset($_GET["cod"]))
$cod=$_GET["cod"];
$eqp = new Equipamento();

$eqp->Excluir($cod);
		header("Location:listaEquipamento.php?us=$us");
}else{
		  
		  
if(isset($_GET["cod"])){
$cod=$_GET["cod"];}

if (isset($_POST["cod"])){
$cod=$_POST["cod"];}

if(isset($_POST["teste"])){
$acao=$_POST["teste"];
	}
	
if (isset($_POST["txt_etec"])){
$etec=$_POST["txt_etec"];}

if (isset($_POST["txt_Equipamento"])){
$equipamento=$_POST["txt_Equipamento"];}
	
if (isset($_POST["txt_modelo"])){
$modelo=$_POST["txt_modelo"];}

if (isset($_POST["txt_especificacaoorgao"])){
$especificacaoorgao=$_POST["txt_especificacaoorgao"];}

if (isset($_POST["txt_atualizacaotecnologica"])){
$atualizacaotecnologica=$_POST["txt_atualizacaotecnologica"];}

if(isset($_POST["txt_baixapatrimonial"])){
$baixapatrimonial=$_POST["txt_baixapatrimonial"];}
	
if(isset($_POST["txt_orgaoclasse"])){
$orgaoclasse=$_POST["txt_orgaoclasse"];}
	
if(isset($_POST["txt_outroequipamento"])){
$outroequipamento=$_POST["txt_outroequipamento"];}

if(isset($_POST["txt_aquisicao"])){
$aquisicao=$_POST["txt_aquisicao"];}
	
if(isset($_POST["txt_anoaquisicao"])){
$anoaquisicao=$_POST["txt_anoaquisicao"];}
	
if(isset($_POST["txt_outraunidade"])){
$outraunidade=$_POST["txt_outraunidade"];}	
	
if(isset($_POST["txt_especificacao"])){
$especificacao=$_POST["txt_especificacao"];}	
	
if(isset($_POST["txt_orgao"])){
$orgao=$_POST["txt_orgao"];}		
	
if(isset($_POST["txt_patrimonio"])){
$patrimonio=$_POST["txt_patrimonio"];}		
	
if(isset($_POST["txt_ociosidade"])){
$ociosidade=$_POST["txt_ociosidade"];}	
	
if(isset($_POST["txt_ambiente"])){
$ambiente=$_POST["txt_ambiente"];}	


if(isset($_POST["txt_usabilidade"])){
$usabilidade=$_POST["txt_usabilidade"];}
	
if(isset($_POST["txt_historico"])){
$historico=$_POST["txt_historico"];}

if(isset($_POST["txt_ocorrencia"])){
$ocorrencia=$_POST["txt_ocorrencia"];
	}

if(isset($_POST["txt_detalheaquisicao"])){
$detalheaquisicao=$_POST["txt_detalheaquisicao"];
	}

if(isset($_POST["acao"])){
$acao=$_POST["acao"];}

echo $acao;


if ($_POST['Salvar']) {
	
$foto = $_FILES["txt_imagemeqp"];

// Se a foto estiver sido selecionada
	if (!empty($foto["name"])) {
 
		
 
    	// Verifica se o arquivo é uma imagem
    	if(!eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $foto["type"])){
     	   $error[1] = "Isso não é uma imagem.";
   	 	} 
		
			// Pega extensão da imagem
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
 
        	// Gera um nome único para a imagem
        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
 
        	// Caminho de onde ficará a imagem
        	$caminho_imagem = "Fotos_Equipamento/" . $nome_imagem;
 
			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($foto["tmp_name"], $caminho_imagem);
 
		
	}
}



$eqp = new Equipamento();
echo $acao;


if($acao == "adc"){
	 $us= base64_encode($us);
		$eqp->Inserir($etec,$equipamento,$modelo,$especificacaoorgao,$atualizacaotecnologica,$baixapatrimonial,$orgaoclasse,$outroequipamento,$aquisicao,$anoaquisicao,$outraunidade,$especificacao,$orgao,$nome_imagem,$patrimonio,$ociosidade,$ambiente,$usabilidade,$historico,$ocorrencia,$detalheaquisicao);
		header("Location:listaEquipamento.php?us=$us");
		}
		
		if($acao == "edt"){
			 $us= base64_encode($us);
		$eqp->Editar($etec,$equipamento,$modelo,$especificacaoorgao,$atualizacaotecnologica,$baixapatrimonial,$orgaoclasse,$outroequipamento,$aquisicao,$anoaquisicao,$outraunidade,$especificacao,$orgao,$nome_imagem,$patrimonio,$ociosidade,$ambiente,$usabilidade,$historico,$ocorrencia,$detalheaquisicao,$cod);
		header("Location:listaEquipamento.php?us=$us");
		}
		
	if($acao == "del"){
		 $us= base64_encode($us);
		$eqp->Excluir($cod);
		header("Location:listaEquipamento.php?us=$us");
		}
}
	
?>
<?php }else{ header ("Location: index.php");} ?>