<?php
    if (empty($usr)) {
        header ("Location: index.php");
    } elseif ($usr != "Administrador") {
        header ("Location: home.php?us=$us&usr=$usr");
    }
?>

<table class="table table-hover">
    <tr>
        <th>Código</th>
        <th>ETEC</th>
        <th>Município</th>
        <th>Protocolo</th>
        <th>Data</th>
    </tr>
    <?php
        $sql_protocolo = "select * from tbl_protocolo";
		$query = mysql_query($sql_protocolo);

        if (mysql_num_rows($query) > 0) {

            while($protocolo = mysql_fetch_assoc($query)) {
                $login = $protocolo["usuario"];
                $queryUser = mysql_query("select * from tbl_usuario where Login = '$login' limit 1");
                $user = mysql_fetch_array($queryUser);
                
                $fk_etec = $user["FK_Etec"];
                $queryEtec = mysql_query("select * from tbl_etec where PK_CodEtec = '$fk_etec' limit 1");
                $etec = mysql_fetch_array($queryEtec);

    ?>
    <tr>
        <td><?php echo $protocolo['PK_CodProtocolo']; ?></td>
        <td><?php echo $etec["Etec"]; ?></td>
        <td><?php echo $etec["Municipio"]; ?></td>
        <td><?php echo $protocolo['protocolo']; ?></td>
        <td>
            <?php 
                $date = date_create($protocolo['data']);
                echo date_format($date, 'd/m/Y H:i:s');
            ?>
        </td>
    </tr>
    <?php } } else { ?>
        <tr>
            <td colspan="5">Nenhum protocolo encontrado!</td>
        </tr>
    <?php } ?>
</table>
