<?php require 'clases/header.php'; ?>
<?php require 'scripts.php'; ?>
<br><br><br>
<div class="container">
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<div class="panel panel-danger">
				<h2>Registro de empleado</h2>
        <br>
        <br>

				<div class="panel panel-body">
					<form id="frmRegistro">
					<label>Nombre completo</label>
					<input type="text" class="form-control input-sm" id="nombre" name="">
          <br>
          <label class="mr-sm-2" for="inlineFormCustomSelect">Tipo de empleado</label>
      <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect">
        <option value="supervision" selected>Supervision</option>
        <option value="preventa">Preventa</option>
        <option value="ciel">Ciel</option>
        <option value="reparto">Reparto</option>
      </select>

					<p></p>
					<span class="btn btn-primary" id="registrarNuevo">Registrar</span>

					</form>

				</div>
			</div>
		</div>
		<div class="col-sm-4"></div>
	</div>
</div>
<?php require 'clases/footer.php'; ?>

<script type="text/javascript">
	$(document).ready(function(){
		$('#registrarNuevo').click(function(){

			if($('#nombre').val()==""){
				alertify.alert("Debes agregar el nombre");
				return false;
			}else if($('#apellido').val()==""){
				alertify.alert("Debes agregar el apellido");
				return false;
			}else if($('#usuario').val()==""){
				alertify.alert("Debes agregar el usuario");
				return false;
			}else if($('#password').val()==""){
				alertify.alert("Debes agregar el password");
				return false;
			}

			cadena="nombre=" + $('#nombre').val() +
					"&apellido=" + $('#apellido').val() +
					"&usuario=" + $('#usuario').val() +
					"&password=" + $('#password').val();

					$.ajax({
						type:"POST",
						url:"clases/registro.php",
						data:cadena,
						success:function(r){

							if(r==2){
								alertify.alert("Este usuario ya existe, prueba con otro :)");
							}
							else if(r==1){
								$('#frmRegistro')[0].reset();
								alertify.success("Agregado con exito");
							}else{
								alertify.error("Fallo al agregar");
							}
						}
					});
		});
	});
</script>
