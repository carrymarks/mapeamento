<?php
	include("frm_espaco_fisico_novo.php");
?>
	<script language="javascript" type="text/javascript">
	seleciona_submenu(2);
	</script>
	<form>
		<table style="width:750px; margin:0; padding:0;">
			<tr>
				<td align="right"><label for="txt_area">&Aacute;rea (m<sup>2</sup>):</label></td>
				<td colspan="2"><input type="text" name="txt_area" id="txt_area" /></td>
			</tr>
			<tr>
				<td align="right"><label for="txt_pe">P&eacute; direito (metros):</label></td>
				<td colspan="2"><input type="text" name="txt_pe" id="txt_pe" /></td>
			</tr>
			<tr>
				<td align="right"><label for="slc_construcao">Tipo constru&ccedil;&atilde;o:</label></td>
				<td><select name="slc_construcao" id="slc_construcao">
					<option> Alvenaria </option>
					<option> Divis&oacute;ria </option>
					<option> Espa&ccedil;o aberto </option>					
					<option> Madeira </option>
					<option> Metal </option>					
					<option> Vidro </option>
				</select></td>
			</tr>
			<tr>
				<td align="right"><label for="slc_revestimento">Tipo revestimento:</label></td>
				<td><select name="slc_revestimento" id="slc_revestimento">
					<option> Azulejo </option>
					<option> Divis&oacute;ria </option>
					<option> Espa&ccedil;o aberto </option>					
					<option> Madeira </option>
					<option> Metal </option>					
					<option> Pintura </option>
					<option> Vidro </option>
				</select></td>
			</tr>
			<tr>
				<td align="right"><label for="txt_porta_altura">Porta (altura):</label></td>
				<td><input type="text" name="txt_porta_altura" id="txt_porta_altura" /></td>
				<td rowspan="2"><input type="button" value="Adicionar" /></td>
			</tr>
			<tr>
				<td align="right"><label for="txt_porta_largura">Porta (largura):</label></td>
				<td><input type="text" name="txt_porta_largura" id="txt_porta_largura" /></td>
			</tr>
			<tr id="ln_portas">
				<td colspan="3">
					<table align="center">
						<tr>
							<td> 2,40m x 0,70m </td>
							<td><input type="button" value="Remover" /></td>
						</tr>
						<tr>
							<td> 2,20m x 1,10m </td>
							<td><input type="button" value="Remover" /></td>
						</tr>
						<tr>
							<td colspan="2" align="center"> Total de 2 portas </td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</form>
	
</body>
<?php 

include "footer.html";
?>


</html>