function eliminarReserva(idReserva)
{   
    $('#idReserva').val(idReserva);

    $('#confirmEliminar').modal('show'); 
   
}


$('#cancelarConfirm').click(function(e){
    let idReserva = $('#idReserva').val();
    e.preventDefault();
    $.ajax({
        url:  '../Controllers/ReservasController.php',
        data: { 
            "desacConfirm" : "desacConfirm",
            "idReserva" : idReserva 
        },        
        type: 'POST',
        success: function(res) 
        {
            $('#cardView-'+idReserva).remove(); 
            $('#confirmEliminar').modal('hide'); 
        }
     });
});




$('#DReserva').on('submit', function(event){
    event.preventDefault();
    fehcaIng=$('#fehcaIng').val();
    fehcaSa=$('#fehcaSa').val();
    numPer=$('#numPer').val();
    numHabitacion=$('#numHabitacion').val();
    tipoRes=$('#tipoRes').val();
    valido=validaciones(tipoRes, numPer , fehcaIng,  fehcaSa, numHabitacion);
    var formData = new FormData(document.getElementById("DReserva"));
        if(valido=="campos"){
            Swal.fire({
                title:'Error!',
                text:'Todos los campos deben estar llenos',
                icon:'error',
                confirmButtonText:'Entendido',
            });
     
        }
    
});
