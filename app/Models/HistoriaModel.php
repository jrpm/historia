<?php 
namespace App\Models;
use CodeIgniter\Model;


class HistoriaModel extends Model{
	protected $table ='historia';
	protected $primaryKey='IdHistoria';
	protected $allowedFields=['Nombre','FechaNacimiento','Sexo','Estatura', 'Peso'];
    
}


?>  