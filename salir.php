<html> 
    <head> 
        <title>Cerrando sesion</title> 
        <META HTTP-EQUIV="REFRESH" CONTENT="1;URL=index.php"> 
    </head> 
    <body> 
        Cerrando sesion.
        <?php
        session_start(); 
        $_SESSION = array();
        session_destroy(); 
        ?> 
    </body> 
</html>