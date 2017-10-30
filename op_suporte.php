<?php 
include "conexao.php";
include "suporte.class.php";


if(isset($_GET['us'])){
$us=$_GET['us'];	}

if(isset($_POST["txt_erro"])){
$ocorrencia=$_POST["txt_erro"];	
	}
	
if(isset($_POST['txt_email'])){
$email=$_POST['txt_email'];	
}

if (isset($_POST["cod"])){
	$cod=$_POST["cod"];}	
	
if(isset($_POST["txt_assunto"])){
$assunto=$_POST["txt_assunto"];	
	}
	
if(isset($_POST["txt_mensagem"])){
$mensagem=$_POST["txt_mensagem"];	
	}

if(isset($_POST["txt_situacao"])){
$situacao=$_POST["txt_situacao"];	
	}


$data=date("Y-m-d");

	
//excluindo ocorrencia
if (isset($_GET['ex'])){	
if(isset($_GET["cod"]))
$cod=$_GET["cod"];
$us=base64_decode($us);
$sql="delete from tbl_suporte where PK_CodSuporte='$cod'";
		$comando=mysql_query($sql)or die(mysql_error());
		$us=base64_encode($us);
		header("Location:listasuporte.php?us=$us");
}
//ocorrencia exluida


if(isset($_GET['acao'])){
$acao=$_GET['acao'];	}

if(isset($_POST["acao"])){
$acao=$_POST["acao"];	}


	$sql="select * from tbl_usuario where `PK_Login`='$us'";
	$comando=mysql_query($sql);
	$linha=mysql_fetch_array($comando);
	$etec =$linha['FK_Etec'];
	$medio=$linha['Nivel_Acesso'];



$sqlusuario="select * from tbl_usuario where PK_Login='$us'";
$queryusuario=mysql_query($sqlusuario);
$linhausuario=mysql_fetch_array($queryusuario);
$fketec=$linhausuario['FK_Etec'];





if($medio=="Comum"){
	//COMUM
// $Suporte = new Suporte();
if($acao=="adc"){
$situacao="Enviado";

if($situacao=='0'){

$sql="insert into tbl_suporte (Erro,Assunto,Mensagem,FK_Usuario,FK_Etec,Situacao,Email,Data_Analise) values ('$ocorrencia','$assunto','$mensagem','$us','$fketec','$situacao','$email','$data')";	
		
			$comando=mysql_query($sql)or die(mysql_error());


}else if($situacao=='1'){

$sql="insert into tbl_suporte (Erro,Assunto,Mensagem,FK_Usuario,FK_Etec,Situacao,Email,Data_Respondido) values ('$ocorrencia','$assunto','$mensagem','$us','$fketec','$situacao','$email','$data')";	
		
			$comando=mysql_query($sql)or die(mysql_error());	


}else{
$sql="insert into tbl_suporte (Erro,Assunto,Mensagem,FK_Usuario,FK_Etec,Situacao,Email,Data_Enviado) values ('$ocorrencia','$assunto','$mensagem','$us','$fketec','$situacao','$email','$data')";	
		
			$comando=mysql_query($sql)or die(mysql_error());
}

$us=base64_encode($us);

header ("Location:listasuporte.php?us=$us");}

if($acao=="edt"){

if($situacao=='0'){

$sql="update tbl_suporte set Erro='$ocorrencia',Assunto='$assunto',Mensagem='$mensagem',Email='$email',Situacao='$situacao',Data_Analise='$data' where PK_CodSuporte='$cod'";		
			$comando=mysql_query($sql)or die(mysql_error());

}else if($situacao=='1'){

$sql="update tbl_suporte set Erro='$ocorrencia',Assunto='$assunto',Mensagem='$mensagem',Email='$email',Situacao='$situacao',Data_Respondido='$data' where PK_CodSuporte='$cod'";		
			$comando=mysql_query($sql)or die(mysql_error());

}else{
$sql="update tbl_suporte set Erro='$ocorrencia',Assunto='$assunto',Mensagem='$mensagem',Email='$email',Situacao='$situacao',Data_Enviado='$data' where PK_CodSuporte='$cod'";		
			$comando=mysql_query($sql)or die(mysql_error());
}


$us=base64_encode($us);
header ("Location:listasuporte.php?us=$us");
}
}else{
	//ADM
// $Suporte = new Suporte();
if($acao=="adc"){
$situacao="Enviado";	
if($situacao=='0'){

$sql="insert into tbl_suporte (Erro,Assunto,Mensagem,FK_Usuario,FK_Etec,Situacao,Email,Data_Analise) values ('$ocorrencia','$assunto','$mensagem','$us','$fketec','$situacao','$email','$data')";	
		
			$comando=mysql_query($sql)or die(mysql_error());


}else if($situacao=='1'){

$sql="insert into tbl_suporte (Erro,Assunto,Mensagem,FK_Usuario,FK_Etec,Situacao,Email,Data_Respondido) values ('$ocorrencia','$assunto','$mensagem','$us','$fketec','$situacao','$email','$data')";	
		
			$comando=mysql_query($sql)or die(mysql_error());	


}else{
$sql="insert into tbl_suporte (Erro,Assunto,Mensagem,FK_Usuario,FK_Etec,Situacao,Email,Data_Enviado) values ('$ocorrencia','$assunto','$mensagem','$us','$fketec','$situacao','$email','$data')";	
		
			$comando=mysql_query($sql)or die(mysql_error());
}
header ("Location:listasuporteadm.php?us=$us");
}

if($acao=="edt"){

if($situacao=='0'){

$sql="update tbl_suporte set Erro='$ocorrencia',Assunto='$assunto',Mensagem='$mensagem',Email='$email',Situacao='$situacao',Data_Analise='$data' where PK_CodSuporte='$cod'";		
			$comando=mysql_query($sql)or die(mysql_error());

}else if($situacao=='1'){

$sql="update tbl_suporte set Erro='$ocorrencia',Assunto='$assunto',Mensagem='$mensagem',Email='$email',Situacao='$situacao',Data_Respondido='$data' where PK_CodSuporte='$cod'";		
			$comando=mysql_query($sql)or die(mysql_error());

}else{
$sql="update tbl_suporte set Erro='$ocorrencia',Assunto='$assunto',Mensagem='$mensagem',Email='$email',Situacao='$situacao',Data_Enviado='$data' where PK_CodSuporte='$cod'";		
			$comando=mysql_query($sql)or die(mysql_error());
}

$us=base64_encode($us);	
header ("Location:listasuporteadm.php?us=$us");
}	
	
	}
	
$sqletec="select * from tbl_etec where PK_CodEtec=$fketec";
$qryetec=mysql_query($sqletec);
$linhaetec=mysql_fetch_array($qryetec);	


//-----------Enviando E-mail -------------//
$para='kaique@consultoriasi.com.br';
$de=$linhaetec['Etec'];


// Inclui o arquivo class.phpmailer.php localizado na pasta phpmailer

require("phpmailer/class.phpmailer.php");

// Inicia a classe PHPMailer

$mail = new PHPMailer();

// Define os dados do servidor e tipo de conexão

$mail->IsSMTP(); // Define que a mensagem será SMTP
$mail->Host = "smtp.consultoriasi.com.br"; // Endereço do servidor SMTP
//$mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
$mail->Username = 'kaique@consultoriasi.com.br'; // Usuário do servidor SMTP
$mail->Password = 'si2011'; // Senha do servidor SMTP
// Define o remetente
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->From = $de; // Seu e-mail
$mail->FromName = $de; // Seu nome


// Define a mensagem (Texto e Assunto)
if($assunto==0){
$assunto="Funcionamento do Sistema";	
	}
	
if($assunto==1){
$assunto="Suporte para o Sistema";	
	}
	
if($assunto==2){
$assunto="Dúvida sobre Preenchimento";	
	}
	
if($assunto==3){
$assunto="Dúvida sobre o Projeto";	
	}


// Define os destinatário(s)
if(($assunto==0) or ($assunto==1)){
$mail->AddAddress('kaique@consultoriasi.com.br');
}else{
$mail->AddAddress('kaique@consultoriasi.com.br');	
	}
//$mail->AddAddress('maplab.cetec@centropaulasouza.sp.gov.br');
//$mail->AddCC('ciclano@site.net', 'Ciclano'); // Copia
//$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta

// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
$mail->CharSet = 'iso-8859-1'; // Charset da mensagem (opcional)
 
			

$mail->Subject  = $assunto; // Assunto da mensagem

$mail->Body="Local do Ocorrido:".$ocorrencia." ".$mensagem;
$mail->AltBody ="Escola:".$de."\nLocal do Ocorrido:".$ocorrencia."\n".$mensagem;

echo $fketec;

// Define os anexos (opcional)

// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
//$mail->AddAttachment("c:/temp/documento.pdf", "novo_nome.pdf");  // Insere um anexo

// Envia o e-mail

$enviado = $mail->Send();

// Limpa os destinatários e os anexos
$mail->ClearAllRecipients();
$mail->ClearAttachments();


// Exibe uma mensagem de resultado

if ($enviado) {
echo "E-mail enviado com sucesso!";

} else {

echo "Não foi possível enviar o e-mail.<br /><br />";

echo "<b>Informações do erro:</b> <br />" . $mail->ErrorInfo;

}






?>