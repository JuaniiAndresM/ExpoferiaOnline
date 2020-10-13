function hola(){
    $.ajax({
        type: "POST",
        url: "registrarAlumno.php",
        data: $("#formulario").serialize(),
        success: function(data){
            if(data==1){
                alert("todo bien");
                 }
             }
        });

}