<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Weather Widget App with Open Weather API</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://www.gstatic.com/firebasejs/7.9.1/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-database.js"></script>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
  <link rel="stylesheet" type="text/css" href="css/cardstyle.css">

</head>

<body>

  <div class="wrapper">
    <div class="widget-container">
      <div class="top-left">
        <h1 class="city" id="city">Weather Widget App</h1>
        <h2 id="day">Day</h2>
        <h3 id="date">Month, Day Year</h3>
        <h3 id="time">Time</h3>
        <p class="geo"></p>
      </div>
      <div class="top-right">
        <h1 id="weather-status">Weather / Weather Status</h1>
        <img class="weather-icon" src="https://myleschuahiock.files.wordpress.com/2016/02/sunny2.png">
      </div>
      <div class="horizontal-half-divider"></div>
      <div class="bottom-left">
        <h1 id="Suhu">0</h1>
        <h2 id="celsius">&degC</h2>
      </div>
      <div class="vertical-half-divider"></div>
      <div class="bottom-right">
        <div class="other-details-key">
          <p>Humidity </p>
          <p>Hujan </p>
          <p>Cahaya </p>
          <p>lampu </p>
        </div>
        <div class="other-details-values">
          <p id="Humidity">0 Km/h</p>
          <p id="Hujan">0 %</p>
          <p id="Cahaya">0 hPa</p>
          <p id="LED">Ga nyala</p>
        </div>
      </div>
    </div>
    <a class="watermark-link" href="welcome.php">
      <p class="watermark">Back to Desktop</p>
    </a>
  </div>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="js/cardscript.js"></script>

</body>

</html>