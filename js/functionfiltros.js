$( "#1" ).change(function() {
 mandoDatos();
});

$( "#2" ).change(function() {
  mandoDatos();
});

$( "#3" ).change(function() {
  mandoDatos();
});

function mandoDatos(local, grado, orientacion){
  var local = document.getElementByName('BachilleratoSelect').value;
  var grado = document.getElementByName('GradoSelect').value;
  var orientacion = document.getElementByName('OrientacionSelect').value;

  $.ajax({
    url:"MenuFiltros.php", 
    type: "post", 
    data: {local : local, grado : grado, orientacion : orientacion},
    success:function(content){
      $('.Tabla').html(content);
  }
     });
  
}

  function mandarID(id){
  sessionStorage.setItem("id", id);
  $.redirect("../Proyectos/Planilla.html"); 
};

