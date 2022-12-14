<?php
    $str = "Error desconocido";
    if (!empty($_COOKIE['Error']) && !empty($_COOKIE['User']))
    {
        $error = $_COOKIE['Error'];
        setcookie('Error', 0, time() - 1);
        if ($error == 1)
        {
            $str = "Hola " . $_COOKIE['User'] . ", debe introducir de nuevo su pwd";
        }
        else if ($error == 2)
        {
            $str = "Hola " . $_COOKIE['User'] . ", ha llegado al máximo número de intentos sin cubrir la pwd";
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
</head>
<body>
    <div><?php echo $str;?></div>
    <div><a href="index.php">Volver a login</a></div>
</body>
</html>

