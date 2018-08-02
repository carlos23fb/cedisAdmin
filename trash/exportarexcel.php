<?php require 'clases/header.php'; ?>
<?php require 'scripts.php'; ?>
<br><br><br>
<div class="card">
	<div class="card-body">
		<div class="col-sm-4"></div>
		<div class="col-sm-4"></div>
			<div class="panel panel-danger">
				<h2>Exportar hoja de calculo a base de datos</h2>
        <br>
        <br>

				<div class="panel panel-body">
					<form method="POST" action="excel_empleados.php" enctype="multipart/form-data">

            <i class="far fa-file-excel fa-2x "></i> <i class="far fa-hand-point-right fa-2x"></i><i class="fas fa-database fa-2x"></i>
            <br>
            <br>

            <input type="file" name="archivo" id="archivo">
            <input type="submit" class="btn btn-success" value="Subir archivo" name="submit">






            <br>


					</form>

				</div>
			</div>
		</div>
		<div class="col-sm-4"></div>
	</div>
</div>
<?php require 'clases/footer.php'; ?>
