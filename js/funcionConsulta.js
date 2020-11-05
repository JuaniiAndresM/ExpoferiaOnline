function EnviarConsulta(){
    $(':button').prop('disabled', true);
      var Consultas = document.getElementById("consulta").value;
      sessionStorage.setItem("Consultas", Consultas);
      var Email = document.getElementById("mail").value;
      sessionStorage.setItem("Email", Email);
      var Usuario = document.getElementById("user").value;
      sessionStorage.setItem("Usuario", Usuario);
      var Nombre = document.getElementById("nom").value;
      sessionStorage.setItem("Nombre", Nombre);
      var Apellido = document.getElementById("apellido").value;
      sessionStorage.setItem("Apellido", Apellido);
      var Proyecto = document.getElementById("nompro").value;
      sessionStorage.setItem("Proyecto", Proyecto);
      $.ajax({
        url:"EnviarConsulta.php", 
        data: { Consultas: Consultas, Email: Email, Usuario: Usuario, Nombre: Nombre, Apellido: Apellido, Proyecto: Proyecto},
        type: "post", 
        success:function(data){
          alert('se mando correctamente');
        }
      })
    }