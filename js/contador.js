var countDownDate = new Date("Nov 15, 2020 18:00").getTime();


            var x = setInterval(function() {

              
              var now = new Date().getTime();
            
              var distancia = countDownDate - now;
                
            
              var dias = Math.floor(distancia / (1000 * 60 * 60 * 24));
              var horas = Math.floor((distancia % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
              var minutos = Math.floor((distancia % (1000 * 60 * 60)) / (1000 * 60));

                
            
              document.getElementById("Regresiva").innerHTML = dias + "d " + horas + "h "
              + minutos + "m ";
                
            
              if (distancia < 0) {
                clearInterval(x);
                document.getElementById("Regresiva").innerHTML = "TERMINO!";
              }
            }, 1000);