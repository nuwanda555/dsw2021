<!-- jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- poner un estilo bonito a la página -->
<style>
    body {
        background-color: #f5f5f5;
    }


    #container {
        background-color: #ffffff;
        border-radius: 10px;
        padding: 40px;
        margin: 40px;
    }

</style>










<script>
    //al pulsar btn_boton poner el fondo del documento verde
    $(document).ready(function(){

        //mostrar en panel las películas mas populares mediante un api
        $("#btn_boton").click(function(){
            $.ajax({
                url: "https://api.themoviedb.org/3/discover/movie?api_key=32088fd311b683e6c762f52beac4c99f&language=en-US&sort_by=popularity.desc&include_adult=false&include_video=false&page=1",
                type: "GET",
                dataType: "json",
                success: function(data){
                    console.log(data);
                    var peliculas = data.results;
                    var html = "";
                    for(var i = 0; i < peliculas.length; i++){
                        html += "<div class='col-md-3'>";
                        html += "<div class='mb-4 card box-shadow'>";
                        html += "<img class='card-img-top' src='https://image.tmdb.org/t/p/w500" + peliculas[i].poster_path + "' alt='Card image cap'>";
                        html += "<div class='card-body'>";
                        html += "<p class='card-text'>" + peliculas[i].title + "</p>";
                        html += "<div class='d-flex justify-content-between align-items-center'>";
                        html += "<div class='btn-group'>";
                        html += "<button type='button' class='btn btn-sm btn-outline-secondary'>Ver</button>";
                        html += "<button type='button' class='btn btn-sm btn-outline-secondary'>Editar</button>";
                        html += "</div>";
                        html += "<small class='text-muted'>9 mins</small>";
                        html += "</div>";
                        html += "</div>";
                        html += "</div>";
                        html += "</div>";
                    }
                    $("#panel").html(html);
                }
            });
        });






        //al pulsar btn_boton2 mostrar en panel la longitud y latitud de la ISS
        $("#btn_boton2").click(function(){
            $.getJSON("http://api.open-notify.org/iss-now.json", function(data){
                $("#panel").html("<p>Longitud: " + data.iss_position.longitude + "</p><p>Latitud: " + data.iss_position.latitude + "</p>");
            });
        });





    });



</script>


<body>


<div id="container">


<!-- mostrar un boton de color verde con id btn_boton -->
<button id="btn_boton">Mostrar</button>

<!-- poner un boton de color rojo con id btn_boton2 -->
<button id="btn_boton2">Mostrar</button>

<div id="panel">


</div>






</div>

</body>
