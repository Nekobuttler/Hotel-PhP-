function HabilitarBoton(){

let correoElectronico = $("#correoElectronico").val().trim();
let contrasenna = $("#contrasenna").val().trim();
let confirmarContrasenna = $("#contrasenna_confirm").val().trim();

$("#btnRegistrarCuenta").prop("disabled", true);

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
            if(respuesta == "OK")
            {
                $("#error_corr").prop("hidden" , true); //Lo quita
                
                if (correoElectronico !== "" && contrasenna !== "" && confirmarContrasenna !== "") 
                {
                    if(contrasenna === confirmarContrasenna)
                    {
                        $("#btnRegistrarCuenta").prop("disabled", false);
                        $("#error_contra").prop("hidden" , true);// Lo quita
                    }else{
                        $("#error_contra").prop("hidden" , false);// Lo pone visible
                    }
                }else{
                    //las contrasenas deben de llenarse
                }
            }
            else
            {
    
               $("#error_corr").prop("hidden" , false); // Lo  pone visible 
            }
        }
     })
}

}

 

 