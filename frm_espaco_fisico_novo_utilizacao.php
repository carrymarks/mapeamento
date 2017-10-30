<?php
	include("frm_espaco_fisico_novo.php");
?>
	<script language="javascript" type="text/javascript">
	seleciona_submenu(4);
	</script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jSelectable.js"></script>
<style type="text/css">
.selectable{cursor:pointer}
.selectable.selected, #submenu .selecionado, #submit{background-color: #96211a;color: white;}
#submit{width:100px}
#submenu .inativo{background-color: #f5f5f4;color: white;}
#submenu th{background-color: #E2E2DE;color: black;}
#ln_justificativa{display:none;}
</style></head>
	<form>
		<table style="width:750px; margin:0; padding:0;">
			<tr>
				<td width="100" align="right"><input type="checkbox" id="chk_ocioso" name="chk_ocioso" /></td>
				<td><label for="chk_ocioso">Espa&ccedil;o ocioso</label></td>
			</tr>
			<tr id="ln_justificativa">
				<td align="right"><label for="slc_justificativa">Justificativa</label></td>
				<td><select name="slc_justificativa" id="slc_justificativa">
					<option> &Aacute;REA ISOLADA (REFORMA) </option>
					<option> N&Atilde;O OFERTA HABILITA&Ccedil;&Atilde;O NO EIXO DO EQUIPAMENTO </option>
					<option> EQUIPAMENTO N&Atilde;O INSTALADO </option>
					<option> SEM INFRAESTRUTURA ADEQUADA AO FUNCIONAMENTO ( EL&Eacute;TRICA, HIDR&Aacute;ULICA E CIVIL). </option>					
				</select></td>
			</tr>
		</table>
	</form>
	<table style="width:933px; margin:0; padding:0;" id="table" align="center">
		<thead>
			<tr align="center" bgcolor="#E2E2DE">
				<td width="98"><strong> Per&iacute;odo </strong></td>
				<td width="133"><strong>Segunda-Feira</strong></td>
				<td width="119"><strong>Ter&ccedil;a-Feira</strong></td>
				<td width="126"><strong>Quarta-Feira</strong></td>
				<td width="125"><strong>Quinta-Feira</strong></td>
				<td width="114"><strong>Sexta-Feira</strong></td>
				<td width="99"><strong>S&aacute;bado</strong></td>
			</tr>
		</thead>
		<tbody><?php
		for ($i = 7; $i < 23; $i++) {
			echo sprintf("
			<tr>
				<td>%02d:00 as %02d:00</td>", $i, $i+1);
			for ($j = 0; $j < 6; $j++) {
				print ('
				<td class="selectable" align="center">LIVRE</td>');
			}
			echo '
			</tr>';
		}
	?>
	
		</tbody>
	</table>
	<div align="center"><div id="submit">Salvar</div></div>
	
<!-- <table>
	<tbody>
		<tr> -->
<?php 

include "footer.html";
?>
