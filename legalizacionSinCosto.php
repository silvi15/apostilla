<?php
include 'header.php';
session_start();

$_SESSION["autentificado"] = 'A';
include("sesion.php");
$id=$_SESSION["id"];

include 'conexionSQL.php';

$consulta=$mysqli->query("SELECT * FROM usuarios where id = '$id'");
  while($fila=$consulta->fetch_array()){
    $cir=$fila["circunscripcion"];
    //echo "cir:$cir";
  }
switch ($cir) {
  case '1':
      $cir="Primera";
    break;
  case '2':
      $cir="Segunda";
    break;
  case '3':
    $cir="Tercera";
    break;
  default:
    # code...
    break;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="../../favicon.ico">

<style type="text/css">
    body{
        font-family: Arail, sans-serif;
    }
    p {
        font-family: sans-serif;
        color: red;
        block-size: 4;
        margin-left: 5px;
        padding: 5px; 
    }
    /* Formatting search box */
    .search-box{
        width: 300px;
        position: relative;
        display: inline-block;
        font-size: 14px;
    }
    .search-box input[type="text"]{
        height: 32px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
    }
    .result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
    }
    .search-box input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
    }
    /* Formatting result items */
    .result p{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
    }
    .result p:hover{
        background: #f2f2f2;
    }
    .form-buscar{
        background: #fff;
    }
    .form-buscar input{
    font-family: sans-serif;
    background: rgba(129, 119, 112, 0.08);
    color: black;
    border: none;
    width: 100%;
    padding: 10px 20px;
    margin-left: 5px;
    }
</style>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("backend-search2.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>
</head>
<body>
    <form  class="form-buscar" action="legalizacionSinCosto2.php" method="post">
    <div class="search-box">
        <p>Buscar una Legalizacion</p>
        <input type="text" class="form-control" name="numero" autocomplete="off" placeholder="Ingrese el numero de la invervencion..">
        <input type="submit" name="submit" value="Buscar"><br>  
        <div class="result"></div>
      </div>    
    </form>
    <form>
    </form>
</body>
</html>
