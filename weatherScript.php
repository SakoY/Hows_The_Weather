<?php
  $city = '';
  $forcast = '';
  $error = '';
  if ($_GET['city']) {
      $city = str_replace(' ', '', $_GET['city']);
      // OpenWeatherMap API
      $contents = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q='.$city.'&appid=ENTER API KEY HERE');
      $weatherarray = json_decode($contents, true);
      if ($weatherarray['name'] != '' && $weatherarray['weather']['0']['description'] != '') {
          //Converted to fahrenheit
          $temp = $weatherarray['main']['temp'] * (9 / 5) - 459.67;
          // Used to replace spaces with '+' to use in api url
          $locationname = str_replace(' ', '+', $weatherarray['name']);
          // forcast to be outputed
          $forcast = 'The weather in '.$weatherarray['name']." is currently '".$weatherarray['weather']['0']['description']."' with a temperature of ".intval($temp).'°F with a wind speed of '.intval($weatherarray['wind']['speed'] * 2.23694).' MPH';
          //CURL used to access Bing API
          $curl = curl_init();
          //hides output
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
          // Searches " (city name) city " and gets a 'large' picture
          curl_setopt($curl, CURLOPT_URL, 'https://api.cognitive.microsoft.com/bing/v5.0/images/search?q='.$locationname.' city+view&count=1&offset=0&mkt=en-us&safeSearch=Moderate&size=large');
          // Enter API key
          curl_setopt($curl, CURLOPT_HTTPHEADER, array('Host: api.cognitive.microsoft.com', 'Ocp-Apim-Subscription-Key:ENTER API KEY HERE'));
          $resp = curl_exec($curl);
          curl_close($curl);
          //decodes json from curl string
          $json = json_decode($resp, true);
          $background = $json['value']['0']['contentUrl'];
      } else {
          $error = 'Invalid city please try again';
      }
  }
?>
