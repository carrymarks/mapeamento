<html>
<head>
<style>
ul 
{
        margin: 0;
        padding: 0;
        list-style: none;
        height:25;
        border-bottom: 1px solid #ccc;
}
ul li 
{
        position: relative;
}
li ul 
{
        position: absolute;
        left: 1px;
        top: 25;
        display: none;
        width: 98px;
}
ul li a 
{
        display: block;
        text-decoration: none;
        font-size:11px;
        font-family:Verdana,Arial,Helvetica;
        color: #000;
        padding: 5px;
        border: 1px solid #ccc;
}
li:hover ul, li.over ul 
{ 
        display: block;
}
ul li ul a:hover{
        background:#000;
        display:block;
        color:#fff;
}
ul li a:hover
{
        background:#000;
        display:block;
        color:#fff;
        border-bottom: 1px #000 solid;
}
/* Fix IE. Hide from IE Mac \*/
* html ul li { float: left; height: 1%; }
* html ul li a { height: 1%; }
/* End */
body,td,th {
	font-family: Verdana, Geneva, sans-serif;
}
</style>
<script type="text/javascript">
startList = function() {
if (document.all&&document.getElementById) {
navRoot = document.getElementById("nav");
for (i=0; i<navRoot.childNodes.length; i++) {
node = navRoot.childNodes[i];
if (node.nodeName=="LI") {
node.onmouseover=function() {
this.className+=" over";
  }
  node.onmouseout=function() {
  this.className=this.className.replace
        (" over", "");
   }
   }
  }
 }
}
window.onload=startList;
</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><head>
<body>
<table width="94%">
<tr>
        <td width="10%" height="49" bgcolor="#93938E">
        <ul id="nav">
                <li>                  <a href="#"><b>Cadastro</a></b>
                  <ul>
                    <li>                      <a href="#">Espaço Físico</a>                    </li>
                    <li>                      <a href="#">Equipamento</a>                    </li>
                    </ul>
                </li>
        </ul>
        </td>
        <td width="10%" bgcolor="#93938E">
  <ul id="nav">
                <li>                  <a href="#"><b>Consulta</a></b>
                  <ul>
                    <li>                      <a href="#">Espaço Físico</a>                    </li>
                    <li>                      <a href="#">Equipamento</a>                    </li>
                    </ul>
                </li>
        </ul>
        </td>
        <td width="10%" bgcolor="#93938E">
        <ul id="nav">
                <li>                  <a href="#"><b>Relatório</a></b>
                  <ul>
                    <li>                      <a href="#">Espaço Físico</a>                    </li>
                    <li>                      <a href="#">Equipamento</a>                    </li>
                    </ul>
                </li>
        </ul>
        </td>
        <td width="55%" bgcolor="#93938E">
        <ul id="nav">
        </ul>
        </td>
        <td width="15%" bgcolor="#93938E">
        <ul id="nav">
                <li>                  <a href="#"><b>Sair</a></b>                </li>
        </ul>
        </td>
</tr>
</table>
</body>
</html>