<?php

namespace App\Controllers;
use \DateTime;
use App\Models\HistoriaModel;
class Home extends BaseController
{
    public function index()
    {
        $Historias=ConsultaHistoria();
        $datos['Data']=$Historias;
        return view('Templates/Historia', $datos);
    }
    public function Prueba(){
        $Historias=ConsultaHistoria();
        $datos['Data']=$Historias;
        return view('Templates/Historia', $datos);
        
    }
    public function AgregarPaciente(){
        $Nombre=$this->request->getVar('Nombre');
        $Fecha=$this->request->getVar('HistoriaPacienteFecha');
        $Sexo=$this->request->getVar('Sexo');
        $Estatura=$this->request->getVar('Estatura');
        $Peso=$this->request->getVar('Peso');
        //seteo de fecha
        $fechaN =date('Y-m-d',strtotime($Fecha));
        $valores = explode('-',$fechaN);
        $caracteres = str_split($valores[0], 2);
        //calculo de raiz cuadrada
        $VarCuadrado=number_format(sqrt($caracteres[1]), 2, '.', '');
        
        $varFibonnacci=Fibonnaci($Estatura);
        //Calculo de edad
        $Edad=edad($fechaN);
        // print($Edad);
        $validacion=$this->validate([
            'Nombre'=>'max_length[120]|min_length[4]',
            'Estatura'=>'numeric|max_length[5]|min_length[2]',
            'Peso'=>'numeric|max_length[5]|min_length[2]',
            'Sexo'=>'required|max_length[2]',
            //'Fecha'=>'valid_date[d/m/Y]',  
        ]);
        if(!$validacion){   
            $errores=$this->validator->getErrors();
            // print_r($errores);
            $datos['Error']=$errores;
            $datos['Data']=[$Nombre, $Fecha,$Sexo,$Estatura,$Peso];
            return view('Templates/Historia', $datos);
        }
        $db=db_connect();
        $db->query("INSERT INTO `historia`( `Nombre`, `FechaNacimiento`, `Sexo`, `Estatura`, `Peso`,`fibonacci`,`Edad`, `VarCuadrado`) VALUES ('$Nombre','$Fecha','$Sexo','$Estatura','$Peso','$varFibonnacci','$Edad','$VarCuadrado');");
        $db->close();
        $Historias=ConsultaHistoria();
        $datos['Data']=$Historias;
        return view('Templates/Historia', $datos);
    }

    public function BorrarHistoria($id=null){
        $db=db_connect();
        $db->query("DELETE FROM `historia` WHERE `IdHistoria` = '$id';");
        $db->close();
        $Historias=ConsultaHistoria();
        $datos['Data']=$Historias;
        $datos['Mensaje']="Historia Eliminada de Forma exitosa";
        return view('Templates/Historia', $datos);

    }

    public function ConsultarHistoria($id=null){
        
        $db=db_connect();
        $data=$db->query("SELECT * FROM `historia` WHERE `IdHistoria`='$id';")->getResultObject();
        $data = json_encode($data);
        $db->close();
        return $data;
    }
}
