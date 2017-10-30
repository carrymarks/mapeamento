<?php
	include("frm_espaco_fisico_novo.php");
?>
	<script language="javascript" type="text/javascript">
	seleciona_submenu(3);
	</script>
	<form>
		<table>
			<tr>
				<td align="right"><label for="txt_capacidade">Capacidade:</label></td>
				<td colspan="2"><input type="text" name="txt_capacidade" id="txt_capacidade" /></td>
			</tr>
			<tr>
				<td><label for="slc_justificativa">Equipamentos de seguran&ccedil;a:</label></td>
				<td><select name="slc_justificativa" id="slc_justificativa">
					<option> C&acirc;mera de seguran&ccedil;a </option>
					<option> Detector de fuma&ccedil;a </option>
					<option> Extintor - A </option>
					<option> Extintor - B </option>
					<option> Extintor - C </option>
					<option> Extintor - D </option>
					<option> Luz de emerg&ecirc;ncia </option>
				</select></td>
				<td><input type="button" value="Adicionar" /></td>
			</tr>
			<tr id="ln_equipamentos">
				<td colspan="3">
					<table align="center">
						<tr>
							<td> Extintor - A </td>
							<td><input type="button" value="Remover" /></td>
						</tr>
						<tr>
							<td> Extintor - C </td>
							<td><input type="button" value="Remover" /></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<div align="center"><div id="submit">Salvar</div></div>
		
	</form>
</body>
<?php 

include "footer.html";
?>


</html>