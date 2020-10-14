function hola(){

    var usu = document.getElementById("usuario").value;
    var contra = document.getElementById("password").value;
    var nomproy = document.getElementById("nomproy").value;
    var apellido = document.getElementById("apellido").value;
    var nombre = document.getElementById("nombre").value;
    var email = document.getElementById("email").value;
    var orient = document.getElementById("orient").value;
    var year1 = document.getElementById("prim");
    var year2 = document.getElementById("seg");
    var year3 = document.getElementById("terce");
    var year4 = document.getElementById("cuart");
    var year5 = document.getElementById("quint");
    var year6 = document.getElementById("hexa");
    if(year1.checked == true){
        var year = 1;
    }
    if(year2.checked == true){
        var year = 2;
    }
    if(year3.checked == true){
        var year = 3;
    }
    if(year4.checked == true){
        var year = 4;
    }
    if(year5.checked == true){
        var year = 5;
    }
    if(year6.checked == true){
        var year = 6;
    }

    $.ajax({
        type: "POST",
        url: "registrarAlumno.php",
        data: {usuario:usu,password:contra,nomproy:nomproy,apellido:apellido,nombre:nombre,email:email,orient:orient,year:year},
        success: function(data){
            if (data==1){
                alert("El usuario ya exsiste");

            }else{
                alert("se grabó correctamente");
                window.location.href="../index.html";
            }
         }
  
        });

}
function hola2(){

    var usu = document.getElementById("user").value;
    var contra = document.getElementById("contra").value;
    var nombre = document.getElementById("nombre").value;
    var apellido = document.getElementById("apellido").value;
    var tel = document.getElementById("tel").value;
    var mail = document.getElementById("mail").value;

         $.ajax({
        type: "POST",
        url: "registrar.php",
        data: {user:usu,contra:contra,tel:tel,mail:mail,nombre:nombre,apellido:apellido},
        success: function(data){
            if (data==1){
                alert("El usuario ya exsiste");

            }else{
                alert("se grabó correctamente");
                window.location.href="../index.html";
            }
         }
  
        });




}