
<?php require 'scripts.php'; ?>

<br><br><br>
<div class="card">
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<div class="form">
        <div class="panel panel-primary" >

  				<div   class="panel panel-body">
  					<div style="text-align: center;">
  						<h2>Incio de sesion</h2>
  						<img class="navbar-brand" src="css/media/icono-embotelladora.png" alt="logo-small">
  					</div>

  					<p></p>
  					<label>Usuario</label>
  					<input type="text" id="usuario" class="form-control input-sm" name="">
  					<label>Password</label>
  					<input type="password" id="password" class="form-control input-sm" name="">
  					<p></p>
  					<span class="btn btn-primary" id="entrarSistema">Entrar</span>

  				</div>
  			</div>

      </div>
		</div>
		<div class="col-sm-4"></div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#entrarSistema').click(function(){
			if($('#usuario').val()==""){
				alertify.alert("Debes agregar el usuario");
				return false;
			}else if($('#password').val()==""){
				alertify.alert("Debes agregar el password");
				return false;
			}

			cadena="usuario=" + $('#usuario').val() +
					"&password=" + $('#password').val();

					$.ajax({
						type:"POST",
						url:"clases/login_script.php",
						data:cadena,
						success:function(r){
							if(r==1){
								window.location="index.php";
							}else{
								alertify.error("Usuario o contraseña incorrecto, por favor revisa la informacion que prorcionas o ponte en contacto con soporte tecnico ");
							}
						}
					});
		});
	});
</script>
