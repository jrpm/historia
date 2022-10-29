<?php
namespace App\Controllers;
use \DateTime;
function ConsultaHistoria(){
    
    $db=db_connect();
    $data=$db->query("SELECT * FROM `historia` ;")->getResultObject();
    $data = json_decode(json_encode($data), true);
    $db->close();
    return $data;
}
function edad($fecha_nacimiento)
{

    $nacimiento = new DateTime( $fecha_nacimiento);
    $ahora = new DateTime(date("Y-m-d"));
    $diferencia = $ahora->diff($nacimiento);
    return $diferencia->format("%y");
}

function Fibonnaci($Estatura){
	$fibonacci  = [];
    $v1 = 0;
    $v2 = 1;
    // Calculo de Fibonnaci;
    for($i=2;$i<=$Estatura;$i++){
        $temp = $v1;
        $v1 = $v2;
        $v2 = $temp + $v1;
        if($v1<$Estatura){
            array_push($fibonacci, $v1);
            // echo $v1 . '<br>';
        }
        
    }
   $varFibonnacci=$fibonacci[count($fibonacci)-1];
   return $varFibonnacci;

}

?>