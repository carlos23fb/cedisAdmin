function eliminarDatos(idempleado){
   alertify.alert('¡Eliminando registro de empleado!', '¿Seguro que quieres eliminar este empleado?',

   function(){
      $.ajax({
         type:"POST",
         data:"idempleado=" + idempleado,
         url:"procesos/eliminar_empleado.php",
         success:function(r) {
            if (r==1) {
               $('#tablaDatatable').load('tabla_empleados.php');
               alertify.success("¡Eliminado con exito!");
            }else {
               alertify.error("Error al tratar de eliminar el registro");

            }

         }
      });




   });

}
