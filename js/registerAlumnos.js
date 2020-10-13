function hola(){
    $.ajax({
        type: "POST",
        url: "registrarAlumno.php",
        data: $("#formulario").serialize(),
        success: function(data){
<<<<<<< HEAD
            if (data==1){
                alert("error");
            }else{
                alert("se grabó correctamente");
            }
         }
  
=======
            if(data==1){
                alert("todo bien");
                 }
             }
>>>>>>> a4e0755e65afa91efb31e7642b8ecf27bb3aeed2
        });

}