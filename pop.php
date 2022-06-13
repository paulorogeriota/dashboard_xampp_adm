<?php 

	include ("config.php");
	($_GET['id_project'] <> '') ? $id_project = $_GET['id_project'] : $id_project = 0;
	$stmt = $db->query("select * from vproject_progress where id_project = $id_project ");
	$a = $stmt->fetchAll(PDO::FETCH_OBJ);	
	
	
?>

<style type="text/css">
.tg  {border-collapse:collapse;border-color:#9ABAD9;border-spacing:0;}
.tg td{background-color:#EBF5FF;border-color:#9ABAD9;border-style:solid;border-width:1px;color:#444;
  font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;word-break:normal;}
.tg th{background-color:#409cff;border-color:#9ABAD9;border-style:solid;border-width:1px;color:#fff;
  font-family:Arial, sans-serif;font-size:14px;font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
.tg .tg-fymr{border-color:inherit;font-weight:bold;text-align:left;vertical-align:top}
.tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top}
</style>
<table class="tg" style="undefined;table-layout: ">
<colgroup>
<col style="width: 253px">
<col style="width: 61px">
<col style="width: 46px">
<col style="width: 173px">
<col style="width: 102px">
<col style="width: 92px">
</colgroup>
<thead>
  <tr>
    <th class="tg-fymr" colspan="7">Projeto : projeto x</th>
  </tr>
</thead>

<thead>
  <tr>
    <th class="tg-fymr">Item</th>
    <th class="tg-fymr">Concluido</th>
    <th class="tg-fymr">Ativo</th>
    <th class="tg-fymr">OBs</th>
    <th class="tg-fymr">Data Registro</th>
    <th class="tg-fymr">Data Update</th>
    <th class="tg-fymr">Opção</th>
  </tr>
</thead>
<tbody>
<?php 
foreach($a as $b){
?>
	<form action="cad.php" method="POST" id="<?php echo $b->id ?>" name="<?php echo $b->id ?>">
  <tr>
    <td class="tg-0pky"><input type='text' value='<?php echo $b->item ?>' id='a' name='a'>  </td>
    <td class="tg-0pky"><input type="checkbox"  <?=($b->concluded)? "checked" : ""; ?> id='b' name='b'/></td>
    <td class="tg-0pky"><input type="checkbox" 	<?=($b->active)? "checked" : ""; ?> id='c' name='c'/></td>
    <td class="tg-0pky"><textarea col='5' rows='2' id='d' name='d'/><?php echo $b->obs ?></textarea></td>
    <td class="tg-0pky"><?php echo $b->date_reg ?></td>
    <td class="tg-0pky"><?php echo $b->date_update ?></td>
    <td class="tg-0pky">
		<input type="submit" value="salvar">
	</td>
  </tr>
  <input type="hidden" value="A" id="op" name="op">
  <input type="hidden" value="<?php echo $b->id ?>" id="id_progress" name="id_progress">
  <input type="hidden" value="<?php echo $b->id_project ?>" id="id_project" name="id_project">
	</form>
<?php } ?>
</tbody>
</table>

<br>
<br>
<br>


<style type="text/css">
.tg  {border-collapse:collapse;border-color:#9ABAD9;border-spacing:0;}
.tg td{background-color:#EBF5FF;border-color:#9ABAD9;border-style:solid;border-width:0px;color:#444;
  font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;word-break:normal;}
.tg th{background-color:#409cff;border-color:#9ABAD9;border-style:solid;border-width:0px;color:#fff;
  font-family:Arial, sans-serif;font-size:14px;font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
.tg .tg-0lax{text-align:left;vertical-align:top}
</style>
<table class="tg" style="undefined;table-layout: ">
<colgroup>
<col style="width: 100px">
<col style="width: 200px">
</colgroup>
<thead>
  <tr>
    <th class="tg-0lax">Formulario</th>
    <th class="tg-0lax"></th>
    <th class="tg-0lax"></th>
  </tr>
</thead>
<tbody>
  <form action="cad.php" method="POST">
  <tr>
    <td class="tg-0lax">Item</td>
    <td class="tg-0lax"><input type="text" id='a' name='a'></td>
    <td class="tg-0lax"><textarea id='d' name='d'></textarea></td>
  </tr>
  <tr>
    <td class="tg-0lax" colspan="3"><input type="submit" value="cadastrar"></td>
	
  </tr>
	<input type="hidden" value="I" id="op" name="op">
	  <input type="hidden" value="<?php echo $id_project ?>" id="id_project" name="id_project">
  </form>
</tbody>
</table>