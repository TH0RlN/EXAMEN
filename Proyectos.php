<?php
    function crear_item_proyectos(array $item) : string
    {
        $str = "<tr>";
        $str .= "<td>" . $item[0] . "</td>";
        $str .= "<td>" . $item[1] . "</td>";
        $str .= "<td>" . $item[2] . "</td>";
        $str .= "<td>" . "<input type='number' value='" . (($item[3] < 0 ) ? 0 : ($item[3] > 100 ? 100 : $item[3])). "'></td>";
        $str .= "</tr>";
        
        return $str;
    }

    function crear_formulario_protectos(array $array, callable $function) : string
    {
        $str = "";
        if (empty($array))
            return $str;
        $str = "<form action='actualizar_proyectos.php' method='POST'><table>";
        $str .= "<tr><th>Código proyecto</th><th>Descripción</th><th>Responsable</th><th>Porcentaje</th></tr>";
        foreach ($array as $value)
            $str .= $function($value);
        $str .= "</table><input type='submit' value='Actualizar Proyectos'>";
        
        return $str;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sus Proyectos</title>
</head>
<body>
    <?php
        $page = "";
        $pendientes =  array(
            array('Cod1', 'Desc1', 'Resp1', 50),
            array('Cod2', 'Desc2', 'Resp2', 10),
            array('Cod3', 'Desc3', 'Resp3', 20)
        );
        $page = crear_formulario_protectos($pendientes, 'crear_item_proyectos');
        echo $page;
    ?>
</body>
</html>