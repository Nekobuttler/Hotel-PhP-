function HabilitarBoton(){

    let correoElectronico = $("#correoElectronico").val().trim();
    
    $("#btnRecuperarUsuario").prop("disabled", true);
    
    if(correoElectronico !=''){
        $.ajax({
            url:  '../Controllers/ClienteController.php',
            type: 'GET',
            data: { 
                "VerificarExisteCorreo" : "VerificarExisteCorreo",
                "correoElectronico" : correoElectronico 
            },
            success: function(res) 
            {
                var respuesta = res.replace(/["']/g, "").trim();
                if(respuesta != "OK")
                {
                    $("#error_corr").prop("hidden" , true); //Lo quita
                    $("#btnRecuperarUsuario").prop("disabled", false);
                }
                else
                {
                    $("#error_corr").text("El correo ingresado no existe");
                   $("#error_corr").prop("hidden" , false); // Lo  pone visible 
                }
            }
         })
    }
    
    }
    
     
    
     