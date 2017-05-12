<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Reporte de Miembros por delegacion</title>

	  
</head>
<body>

  <h1 class="box-title" style="text-align: center" >Cuerpo Auxiliar de Emergencia (C.A.E)</h1>
<div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h2 class="box-title" style="text-align: center">Reporte de Miembros por delegacion en (C.A.E)-----Fecha- <?=  $date; ?></h2>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                  <thead>
                     <tr>
                      <th>Cedula</th>
                      <th>Nombre</th>
                      <th >Apellido</th>
                      <th >Telefono</th>

                    </tr>
                  </thead>
                    <tbody>
                  <?php foreach($data as $member){ ?>
                 
                    <tr>
                      <td style="width:150px; text-align: center" ><?= $member->id; ?></td>
                      <td style="width: 150px;  text-align: center"><?= $member->name; ?></td>
                        <td style="width: 150px;  text-align: center"><?= $member->lastname; ?></td>
                      <td style="width: 180px;  text-align: center"><?= $member->telephone; ?></td>
                        
                    </tr>
                    
                    <?php  } ?>
                    
                  </tbody>

                  </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                  
                </div>
              </div><!-- /.box -->

              
            </div>


	
</body>
</html>
