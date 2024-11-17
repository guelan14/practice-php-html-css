
<li><a href="index.php" style="color:black;">Inicio</a></li>
<?php
$sql = "SELECT *FROM menu ORDER BY nombre_item";//armo la cadena SQL
$sql = mysqli_query($con, $sql);//ejecuto la consulta
if(mysqli_num_rows($sql) != 0)//pregunto si tiene datos
{
while ($r = mysqli_fetch_array($sql))//recorro todos los registros
{
?>
<li><a href="index.php?modulo=<?php echo $r['nombre_modulo']?>" style="color:black; "><?php echo $r['nombre_item']?></a></li>
<?php
}
}
?>
