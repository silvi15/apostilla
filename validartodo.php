<?php
$consulta4 = $mysqli->query("SELECT * FROM apostillas WHERE numero = '$numero'");
$row_cnt = $consulta4->num_rows;
if($row_cnt > 0){
echo "la apostilla fue encontrada<br>";
?>

<?php
}
else{
echo "No exite esa apostilla";
}


 ?>
