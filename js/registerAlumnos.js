function hola(){
    $.ajax({
        type: "POST",
        url: "registrarAlumno.php",
        data: $("#formulario").serialize(),
        success: function(data){
            alert("todo bien")
             }

        });
}