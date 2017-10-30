<?php
	include("frm_espaco_fisico_novo.php");
?>
	<script language="javascript" type="text/javascript">
	seleciona_submenu(1);
	</script>
	<form>
		<table style="width:750px; margin:0; padding:0;">
			<tr>
				<td width="100" align="right"><input type="checkbox" id="chk_quadro" name="chk_quadro" /></td>
				<td><label for="chk_quadro">Possui quadro de energia</label></td>
			</tr>
			<tr>
				<td align="right"><label for="txt_110v">Tomadas 110V (monof&aacute;sica):</label></td>
				<td colspan="2"><input type="text" name="txt_110v" id="txt_110v" /></td>
			</tr>
			<tr>
				<td align="right"><label for="txt_220v">Tomadas 220V (bif&aacute;sica):</label></td>
				<td colspan="2"><input type="text" name="txt_220v" id="txt_220v" /></td>
			</tr>
			<tr>
				<td align="right"><label for="txt_250v">Tomadas 250V (trif&aacute;sica):</label></td>
				<td colspan="2"><input type="text" name="txt_250v" id="txt_250v" /></td>
			</tr>
			<tr>
				<td align="right"><label for="slc_iluminacao">Tipo de ilumina&ccedil;&atilde;o:</label></td>
				<td><select name="slc_iluminacao" id="slc_iluminacao">
					<option value="Fluorescente">Fluorescente</option>
					<option value="Incandescente">Incandescente</option>
					<option value="Incandescente">LED</option>
				</select></td>
				<td rowspan="2"><input type="button" value="Adicionar" /></td>
			</tr>
			<tr>
				<td align="right"><label for="txt_qtde_iluminacao">Quantidade:</label></td>
				<td><input type="text" name="txt_qtde_iluminacao" id="txt_qtde_iluminacao" /></td>
			</tr>
			<tr id="ln_equipamentos">
				<td colspan="3">
					<table align="center">
						<tr>
							<td> Fluorescente (2 pontos de ilumina&ccedil;&atilde;o) </td>
							<td><input type="button" value="Remover" /></td>
						</tr>
						<tr>
							<td> LED (8 pontos de ilumina&ccedil;&atilde;o) </td>
							<td><input type="button" value="Remover" /></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</form>
	<div align="center"><div id="submit">Salvar</div></div>
</body>
<?php 

include "footer.html";
?>


</html>