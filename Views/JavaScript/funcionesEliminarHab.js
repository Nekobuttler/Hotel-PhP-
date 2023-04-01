


function EliminarHab(idHab){
$.ajax({
    url:  '../Controllers/habitacionController.php',
    type: 'POST',
    data: { 
        "EliminarHab" : "EliminarHab",
        "idHab" : idHab 
    },
    success: function(res) 
    {
        if(res == "OK")
        {
            
        }
        else
        {
            alert(res);
        }
    }
 });

}