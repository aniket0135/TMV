
    <h3>My Google Maps Demo</h3>
    <!--The div element for the map -->
    <script>
        function initMap(){}
        window.onload = function () {
            LoadMap();
        };

        var map;
        var data = ["25.4938","81.863","2018-07-22 19:03:35"];
        var marker;
        var mapOptions;
        function LoadMap() {
            var mapOptions = {
                center: new google.maps.LatLng(data[0], data[1]),
                zoom: 18,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
            SetMarker(data);
        };
        var ajax_call = function()
        {

          $.ajax({
            url: 'apigps.php',                  //the script to call to get data
            data: "",                        //you can insert url argumnets here to pass to api.php
            dataType: 'json',                //data format
            success: function(data)          //on recieve of reply
            {
              console.log(data)
              SetMarker(data);
            }
          });
        };
        function SetMarker(data) {
       //Remove previous Marker.
       if (marker != null) {
           marker.setMap(null);
       }
       //Set Marker on Map.
       var myLatlng = new google.maps.LatLng(data[0], data[1]);
       console.log(data[0]);
       marker = new google.maps.Marker({
           position: myLatlng,
           map: map,
       });
     }
        var interval = 100;

        setInterval(ajax_call, interval);
    </script>
      <div id="dvMap" style="width: 400px; height: 500px">
    </div>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAWq4CfMatw18beo0TUU3ACY9awFXmFOP0&callback=initMap">
    </script>
