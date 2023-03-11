<?php
$cities = json_decode(file_get_contents("city.list.json"), true);
$eg_cities = [];

foreach($cities as $c){
    if($c["country"] == "EG")
      $eg_cities []=$c;
}

if(isset($_POST["cityID"])){
    $api_KEY = "249c0bf8215265a6c06af23d6cc3f734";  
    $api_URL = "https://api.openweathermap.org/data/2.5/weather?id=".$_POST["cityID"]."&appid=".$api_KEY;
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
   curl_setopt($ch, CURLOPT_URL,$api_URL);
   curl_setopt($ch,CURLOPT_FOLLOWLOCATION, 1);
   $response = curl_exec($ch);
   curl_close($ch);
   $data = json_decode($response);

   display_info($data);
}

function display_info($data){
    echo    ' <div> <center>'  
    ."<h3 style='color:#79616f'> THE FORCAST IS:  </h3></br>"
    ."<b> main wather : </b>".$data->weather[0]->main."</br>"
    ."<b> description : </b>".$data->weather[0]->description."</br>"
    ."<b> temp : </b>".$data->main->temp."</br>"
    ."<b> feels like : </b>".$data->main->feels_like."</br>"
    .'</center>'.
'</div>';

}


  require_once("views/weather.php");