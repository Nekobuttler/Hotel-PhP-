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