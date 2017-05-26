var OG = function (obj){
    if("geolocation" in navigator){
        navigator.geolocation.getCurrentPosition(function(position){
            var pos = {};
            pos.lat = position.coords.latitude;
            pos.lon = position.coords.longitude;
            try {
                obj(pos);
            } catch(e) {
                console.log(e)
            }
        }, function(error){
            
        });
    }else{
        console.log('goelocation no soportada')
    }
}

var OGR = function(o){
    var fun = function(pos){
        var obj = {};
        var pet ="https://maps.googleapis.com/maps/api/geocode/json?latlng="+pos.lat+","+pos.lon
        $.ajax({
            method:'GET',
            url:pet,
            success:function(e){
                var d = e.results[0].formatted_address.split(',');
                obj.city = d[(d.length -1) - 2].trim();
                obj.direction = d[(d.length -1) - (d.length -1)].trim();
                obj.country = d[d.length-1];
                try {
                    o(obj);
                } catch(e) {
                    console.log(e)
                }
            }   
        })
    }
	
    OG(fun);
}


var OGRD = function(o, cadena){

    var c = cadena.replace(/ /g, "+");
    var obj = {};

    var pet ="https://maps.googleapis.com/maps/api/geocode/json?address="+c;
    $.ajax({
        method:'GET',
        url:pet,
        success:function(e){
            
            if(e.status == "ZERO_RESULTS"){
                $('#mapa').html('<h3>Dirección invalida para el mapa</h3>');
                $('#mapa').css({
                    'display':'flex',
                    'justifyContent':'center',
                    'alignItems':'center'
                })
            }

            if(e.status == "OK"){
                obj.lat = e.results[0].geometry.location.lat;
                obj.lon = e.results[0].geometry.location.lng;

                try {
                    o(obj);
                } catch(e) {
                    console.log(e)
                }
            }
        }   
    });
}


