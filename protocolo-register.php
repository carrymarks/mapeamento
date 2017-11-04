<?php

$anoAtual = date("Y");
$existeProtocolo = false;

$queryProtocolo = mysql_query("select * from tbl_protocolo where YEAR(data) = '$anoAtual' and usuario = '$usr' limit 1");
$protocolo = mysql_fetch_array($queryProtocolo);

if (mysql_num_rows($queryProtocolo) > 0) {
    $existeProtocolo = true;
    $date = date_create($protocolo['data']);
    $dataProtocolo =  date_format($date, 'd/m/Y H:i:s');
}

$queryUser = mysql_query("select * from tbl_usuario where Login = '$usr' limit 1");
$user = mysql_fetch_array($queryUser);

$fk_etec = $user["FK_Etec"];
$queryEtec = mysql_query("select * from tbl_etec where PK_CodEtec = '$fk_etec' limit 1");
$etec = mysql_fetch_array($queryEtec);

if (!empty($_GET["gerar"]) && !$existeProtocolo) {
    $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
    $numero_protocolo = '';
    $random_string_length = 12;
    $max = strlen($characters) - 1;
    
    do {
        for ($i = 0; $i < $random_string_length; $i++) {
            $numero_protocolo .= strtoupper($characters[mt_rand(0, $max)]);
        }
        $queryProtocolo = mysql_query("select * from tbl_protocolo where upper(protocolo) = '$numero_protocolo' limit 1");
    } while (mysql_num_rows($queryProtocolo) > 0);
    
    $inserirProtocolo = mysql_query("insert into tbl_protocolo (usuario, protocolo) values ('$usr', '$numero_protocolo')");
    
    if ($inserirProtocolo) {
        $idProtocolo = mysql_insert_id();
        $queryProtocolo = mysql_query("select * from tbl_protocolo where PK_CodProtocolo = '$idProtocolo' limit 1");
        $protocolo = mysql_fetch_array($queryProtocolo);
        $date = date_create($protocolo['data']);
        $dataProtocolo =  date_format($date, 'd/m/Y H:i:s');
        $existeProtocolo = true;
    } else {
        echo "<script>alert('Ocorreu um erro ao gerar o protocolo, tente novamente mais tarde!');</script>";
    }
} else if (!empty($_GET["gerar"]) && $existeProtocolo) {
    echo "<script>alert('Protocolo já gerado para o ano corrente.');</script>";
}

?>
<div class="panel-body">
    <div class="row">
        <div class="col-md-12">
            <div class="well text-center">
                <strong>CONFIRMA QUE REALIZOU TODAS AS ATUALIZAÇÕES?</strong>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 text-center">
            <a href="protocolos.php?us=<?php echo $us; ?>&usr=<?php echo $usr; ?>&gerar=sim" class="btn btn-success">
                GERAR PROTOCOLO
            </a>
        </div>
        <div class="col-md-6 text-center">
            <a href="<?php echo "home.php?us=$us&usr=$usr"; ?>" class="btn btn-danger">NÃO CONCLUIR ATUALIZAÇÃO</a>
        </div>
    </div>

    <div class="row" style="margin-top: 40px;">
        <div class="col-md-6">
            <form class="form-horizontal">
                <div class="form-group form-group-sm">
                    <label for="codigo" class="col-sm-6 control-label">Código</label>
                    <div class="col-sm-6">
                        <input type="text" name="codigo" class="form-control" readonly 
                            value="<?php echo $etec["PK_CodEtec"]; ?>">
                    </div>
                </div>
                <div class="form-group form-group-sm">
                    <label for="codigo" class="col-sm-6 control-label">ETEC</label>
                    <div class="col-sm-6">
                        <input type="text" name="codigo" class="form-control" readonly
                            value="<?php echo $etec["Etec"]; ?>">
                    </div>
                </div>
                <div class="form-group form-group-sm">
                    <label for="codigo" class="col-sm-6 control-label">Município</label>
                    <div class="col-sm-6">
                        <input type="text" name="codigo" class="form-control" readonly
                            value="<?php echo $etec["Municipio"]; ?>">
                    </div>
                </div>
                <?php 
                    if ($existeProtocolo) {
                ?>
                <hr>
                <div class="form-group form-group-sm">
                    <label for="codigo" class="col-sm-6 control-label">Número do Protocolo</label>
                    <div class="col-sm-6">
                        <input type="text" name="codigo" class="form-control" readonly
                            value="<?php echo $protocolo["protocolo"]; ?>">
                    </div>
                </div>
                <div class="form-group form-group-sm">
                    <label for="codigo" class="col-sm-6 control-label">Data de Emissão do Protocolo</label>
                    <div class="col-sm-6">
                        <input type="text" name="codigo" class="form-control" readonly
                            value="<?php echo $dataProtocolo; ?>">
                    </div>
                </div>
                <?php  } ?>
            </form>
        </div>
        <div class="col-md-6"></div>
    </div>
</div>