<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   

    <title>Prueba de Ingreso</title>
  </head>
  <body>
   
    <div class="container-fluid">
      <nav class="nav">
        <a class="nav-link active" aria-current="page" href="<?=base_url('/');?>">Inicio</a>
      </nav>
      
      
      <div class="container-fluid">
        <h1>Sistema de Manejo de Historia de Paciente</h1>
        <div>
        <?php
         if(!empty($Mensaje)){
          
          ?>
          <div class="alert alert-success" role="alert"> <?php print_r($Mensaje); ?></div>
          <?php
         }
          
         if(!empty($Error)){
          
             foreach ($Error as $value){
              ?>
              <div class="alert alert-danger" role="alert"> <?php echo "$value <br>"; ?></div>
              <?php
             }
           }
          ?>
        </div>
        <form  action="<?=site_url('/AgregarPaciente')?>" method="post" enctype="multipart/form-data" >
          <div class="row">
            <div class="col-12">
              <div class="mb-3">
                <label for="HistoriaPacienteNombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Nombre del Paciente" value="<?php //if(!empty($Var['Nombre'])){ print_r($Var['Nombre']);}?>">
              </div>
            </div>
            <div class="col-3">
              <div class="col">
                <label for="HistoriaPacienteFecha" class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" name="HistoriaPacienteFecha"placeholder="Last name" value="">
              </div>
            </div>
            <div class="col-3">

              <div class="form-group row">
                <label for="HistoriaPacienteSexo" class="form-label">Sexo</label>
                  <select id="Sexo" name="Sexo"  class="form-control">
                    <option > </option>
                    <option value="1">Masculino</option>
                    <option value="2">Femenino</option>
                  </select>
              </div>
            </div>

            <div class="col-3">
              <div class="col">
                <label for="HistoriaPacienteEstatura" class="form-label">Estatura (cm)</label>
                <input type="number" class="form-control"id="Estatura" name="Estatura">
              </div>
            </div>
            <div class="col-3">
              <div class="col">
                <label for="HistoriaPacientePeso" class="form-label">Peso (kg)</label>
                <input type="number" class="form-control"id="Peso" name="Peso" >
              </div>
            </div>


          </div>
          <br/>
          <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
      </div>
      <br>
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-6">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Lista De Historias Medicas</h3>
                </div>
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Nombre</th>
                        <th>Edad</th>
                        <th>Descripcion</th>
                        
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        if(isset($Data)){
                          foreach($Data as $clave =>$valor){
                            ?>
                            <tr>
                              <td class="pro-title"><?= $valor['Nombre'] ?></td>
                              <td class="pro-title"><?= $valor['Edad'] ?></td>
                              <?php
                              if($valor['Edad']<18){
                                ?>
                                <td class="pro-title">Hola <?= $valor['Nombre'] ?> eres <?php if($valor['Sexo']==1){ echo "un";}else{ echo"una";}?> joven muy saludable, te recomiendo salir a jugar al aire libre  <?= $valor['fibonacci']?> horas diarias </td>
                                <?php
                              }else{
                                ?>
                                <td class="pro-title">Hola <?= $valor['Nombre'] ?> eres una persona muy saludable, te recomendamo comer <?php if($valor['Peso']>30){ echo "meno";}else{ echo"mas";}?> y salir a correo <?= $valor['VarCuadrado']?> horas diarias </td>

                              <?php
                              
                              }

                               ?>
                              
                              <td class="pro-title">
                                <a type="button"  onclick="resetea(<?=$valor['IdHistoria']?>)" class="btn btn-block btn-info btn-sm">Ver</a> </td><td class="pro-title"> 
                                <a type="button" href="<?=base_url('BorrarHistoria/'.$valor['IdHistoria']);?>" class="btn btn-block btn-danger btn-sm">Eliminar</a></td>
                            </tr>

                            <?php 
                          }
                        }


                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>


            <div class="col-6">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Detalles De Historias Medicas</h3>
                </div>
                <div class="card-body" id="TablaDetalles">
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <script>
      function resetea(a){
        document.getElementById("TablaDetalles").innerHTML='';
        let mas_var=''
        let Descripcion=''
        let sexo=''
        let sexoG=''
        dataShow="<?=base_url()?>/ConsultarHistoria/"+a
        $.ajax({
          type:"post",
          url:dataShow,
          success: function(data){
            Respues=JSON.parse(data)
            
            console.log(Respues[0]);
            if(Respues[0]['Estatura']<30){
              mas_var='mas'
            }
            if(Respues[0]['Estatura']>30){
              mas_var='menos'
            }
            if(Respues[0]['Sexo']==1){
              sexo="un"
              sexoG="Masculino"
            }
            if(Respues[0]['Sexo']==2){
              sexo="una"
              sexoG="Femenino"
            }
            if(Respues[0]['Edad']>=18){
              Descripcion="Hola "+Respues[0]['Nombre'] + " eres una persona muy saludable, te recomiendo comer "+ mas_var +" y salir a correr "+ Respues[0]['VarCuadrado']+" km diarios "
            }else{
              Descripcion="Hola "+Respues[0]['Nombre'] + " eres "+sexo+" Joven muy saludable, te recomiendo salir a jugar al aire libre durante "+ Respues[0]['fibonacci']+" horas diarios "
            }
            
            console.log(Descripcion)
            document.getElementById("TablaDetalles").innerHTML+=`
              <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <td>Nombre: ${Respues[0]['Nombre']} </td>
                        <td>Edad : ${Respues[0]['Edad']}</td>
                        <td>Fecha de Naciomiento : ${Respues[0]['FechaNacimiento']}</td>
                        
                      </tr>
                      <tr>
                        <td>Sexo: ${sexoG} </td>
                        <td>Estatura : ${Respues[0]['Estatura']}</td>
                        <td>Peso: ${Respues[0]['Peso']}</td>
                        
                      </tr>
                     <tr>
                        <td colspan = "3">Descripcion: ${Descripcion} </td>
                        
                      </tr>
                    </thead>
                    
                  </table>


            `;
           
          }
        })
      }
      resetea()

    </script>
  </body>
</html>
