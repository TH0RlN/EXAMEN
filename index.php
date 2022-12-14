<?php
const PWD   = '1234';
const USER  = 'pepe@gmail.com';

    if (!empty($_POST['submit']))
    {
        /*
         * Aquí tambíen añadiría una comprobación con una función que verificase que es un email
         * Ex: & ismail($_POST['user'])
         * La función ismail usaría una expresión regular adecuada al formato de un email para
         * comprobar si el string que recibe se ajusta a esta devolviendo un boolean; true si
         * se ajusta a la condición, false en caso contrario
         */
        if (!empty($_POST['user']) & $_POST['user'] == USER)
        {
            if(!empty($_POST['pwd']))
            {
                if ($_POST['pwd'] == PWD)
                {
                    header('Location: Proyectos.php');
                    exit();
                }
                else
                {
                    setcookie('User', $_POST['user']);
                    setcookie('Error', 1);
                    header('Location: Error.php');
                    exit();
                }
            }
            else
            {
                if (!empty($_COOKIE['Empty']))
                    $_COOKIE['Empty']++;
                else
                    $_COOKIE['Empty'] = 1;
                setcookie('Empty', $_COOKIE['Empty']);
            }
        }
        else
        {
            $nouser = true;
        }
        
        if (!empty($_COOKIE['Empty']) && $_COOKIE['Empty'] >= 3)
        {
            setcookie('User', $_POST['user']);
            setcookie('Empty', 0, time() - 1);
            setcookie('Error', 2);
            header('Location: Error.php');
            exit();
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div>
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
                <div>
                    <label for="user">Usuario: </label><input type="text" name="user" id="user" <?php if(!empty($_POST['user'])){echo "value='" . $_POST['user'] . "'";}?>>
                    <?php if (!empty($nouser) && $nouser){echo "No introdujo el usuario o es incorrecto";}?>
                </div>
                <div><label for="pwd">Contraseña: </label><input type="password" name="pwd" id="pwd"></div>
                <div><input type="submit" value="Iniciar sesión" name="submit"></div>                
            </form>
        </div>
    </body>
</html>
