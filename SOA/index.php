<?php
/*$nuevo=array("elemento1","elemento2","elemento3");

foreach ($nuevo as $ele){
echo $ele;
}*/
$xml=simplexml_load_file("https://byrontosh.github.io/SOAFactura/ejemplo2.xml");

    foreach ($xml->nodo_hijo as $nodo){
        echo $nodo->valor."<br>";
        foreach ($nodo->datos as $d){
            echo $d->nombre." ";
            echo $d->apellido."<br>";
            $db_host="localhost";
            $db_nombrebdd="registro";
            $db_usuario="root";
            $db_contra="elvismar123";
            $conexion=mysqli_connect($db_host,$db_usuario,$db_contra);

            if(mysqli_connect_errno()){
                echo "COMPRUEBA LA CONEXIÓN A LA BDD";
                exit();
            }
            mysqli_set_charset($conexion, "utf8");

            mysqli_select_db($conexion,$db_nombrebdd)or die("LA BDD NO SE ENCUENTRA");
            $consulta="INSERT INTO valores(nombre,apellido) VALUES  ('$d->nombre','$d->apellido');";
            $resultado=mysqli_query($conexion,$consulta);
        }

        $db_host="localhost";
        $db_nombrebdd="registro";
        $db_usuario="root";
        $db_contra="elvismar123";
        $conexion=mysqli_connect($db_host,$db_usuario,$db_contra);

        if(mysqli_connect_errno()){
            echo "COMPRUEBA LA CONEXIÓN A LA BDD";
            exit();
        }
        mysqli_set_charset($conexion, "utf8");

        mysqli_select_db($conexion,$db_nombrebdd)or die("LA BDD NO SE ENCUENTRA");
        $consulta="INSERT INTO valores(valores) VALUES  ('$nodo->valor');";
        $resultado=mysqli_query($conexion,$consulta);
    }
if($resultado==true){
    echo "<br>";
    echo "REGISTRO GUARDADO CON EXITO";
}else{
    echo "REGISTRO NO GUARDADO";
}
mysqli_close($conexion);
?>