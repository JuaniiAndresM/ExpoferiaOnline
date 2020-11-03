function EnviarConsulta(){
    $(':button').prop('disabled', true);
      var Consultas = document.getElementById("consulta").value;
      sessionStorage.setItem("Consultas", Consultas);
      var Email = document.getElementById("mail").value;
      sessionStorage.setItem("Email", Email);
      $.ajax({
        url:"../Proyectos/EnviarConsulta.php", 
        data: { Consultas: Consultas, Email: Email},
        type: "post", 
      })
    }