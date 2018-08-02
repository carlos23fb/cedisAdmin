<?php require 'scripts.php'; ?>
<br><br><br>
<div class="container">
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<div class="panel panel-danger">
				<h2>Registro de usuario</h2>
				<img class="navbar-brand" src="media/icono-embotelladora.png" alt="logo-small">
				<div class="panel panel-body">
					<form id="frmRegistro">
					<label>Nombre</label>
					<input type="text" class="form-control input-sm" id="nombre" name="">
					<label>Apellido</label>
					<input type="text" class="form-control input-sm" id="apellido" name="">
					<label>Usuario</label>
					<input type="text" class="form-control input-sm" id="usuario" name="">
					<label>Password</label>
					<input type="password" class="form-control input-sm" id="password" name="">
					<p></p>
					<span class="btn btn-primary" id="registrarNuevo">Registrar</span>

					<a href="login.php" class="btn btn-success">Iniciar Sesion</a>
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
					"&apellido=" + $('#apellido').val() +|
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
