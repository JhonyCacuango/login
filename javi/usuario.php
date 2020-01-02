<?php  session_start(); ?>   

<?php

if(isset($_SESSION['use']))   // Checking whether the session is already there or not if 
                              // true then header redirect it to the home page directly 
 {
    header("Location: /javi/paginas/principal.html"); 
 }
else
{
    header("Location: /javi/paginas/principal.html"); 
}

if(isset($_POST['error']))   // it checks whether the user clicked login button or not 
{
     $user = $_POST['user'];
     $pass = $_POST['password'];

    if(isset($_POST["user"]) && isset($_POST["password"])){
    $file = fopen('doc.txt', 'r');
    $good=false;
    while(!feof($file)){
        $line = fgets($file);
        $array = explode(";",$line);
    if(trim($array[0]) == $_POST['user'] && trim($array[1]) == $_POST['password']){
            $good=true;
            break;
        }
    }

    if($good){
    $_SESSION['use'] = $user;
        echo '<script type="text/javascript"> window.open("error.html","_self");</script>';  
    }else{
        echo "INVALIDO USUARIO O CONTRASEÑA";
    }
    fclose($file);
    }
    else{
        header('Location: /javi/paginas/principal.html');
    }

}
?>