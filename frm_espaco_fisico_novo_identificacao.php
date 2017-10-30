<?php
	include("frm_espaco_fisico_novo.php");
?>
	<script language="javascript" type="text/javascript">
	seleciona_submenu(0);
	</script>
	<form>
		<table style="width:750px; margin:0; padding:0;">
			<tr>
				<td align="right"><label for="txt_nome">Nome do laboratorio:</label></td>
				<td colspan="2"><input type="text" name="txt_nome" id="txt_nome" /></td>
			</tr>
			<tr id="slc_tipo">
				<td align="right"><label for="slc_tipo">Tipo do laborat&oacute;rio</label></td>
				<td><select name="slc_tipo" id="slc_tipo" style="width:200px" title="Informe aqui o nome do laboratório a ser cadastrado" <?php if($supervisor=='S'){ ?> disabled="disabled" <?php } ?> >
        <?php
    mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');
      $sql="select * from tbl_cadastrolaboratorio order by Nome_Laboratorio";
      $comando=mysql_query($sql);
  while($linha=mysql_fetch_array($comando)){
    ?>
        <option value="<?php echo $linha['PK_CodLaboratorio']?>" value="<?php echo $linha['PK_CodLaboratorio']?>"<?php if (!(strcmp($linha['PK_CodLaboratorio'],$laboratorio))) {echo "selected=\"selected\"";} ?> <?php if (!(strcmp($linha['PK_CodLaboratorio'], $laboratorio))) {echo "selected=\"selected\"";} ?>>
        <?php echo $linha['Nome_Laboratorio']?>
        </option>
        <?php } ?>
      </select></td>
			</tr>
			
						<tr>
				<td align="right"><label for="txt_curso">Cursos que fazem uso:</label></td>
				<td><?php
	$sql = "SELECT * FROM tbl_curso order by Nome_Curso";
	$qry = mysql_query($sql);
?>
		            <select name="txt_curso" id="txt_curso" style="width:200px;" id="select" title="Informe aqui todos os cursos que utilizam o laboratório">
						<option value = "">Selecione o Curso</option><?php while($linha = mysql_fetch_array($qry)){ ?>
						<option value = "<?php echo $linha['PK_CodCurso']; ?>"><?php echo $linha['Nome_Curso']; ?></option><?php } ?>
		            </select>
            	</td>
				<td><input type="button" value="Adicionar" /></td>
			</tr>
			<tr id="ln_equipamentos">
				<td colspan="3">
					<table align="center">
						<tr>
							<td> Administra&ccedil;&atilde;o </td>
							<td><input type="button" value="Remover" /></td>
						</tr>
						<tr>
							<td> Inform&aacute;tica </td>
							<td><input type="button" value="Remover" /></td>
						</tr>
					</table>
				</td>
			</tr>
			
			<tr>
				<td align="right" valign="top"><label for="txt_descricao">Descri&ccedil;&atilde;o:</label></td>
				<td><textarea rows="10" cols="50"></textarea></td>
			</tr>
			
		</table>
	</form>
	
	<div align="center"><div id="submit">Salvar</div></div>
	
<!-- <table>
	<tbody>
		<tr> -->
<?php 

include "footer.html";
?>
