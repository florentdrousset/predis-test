<?php
require __DIR__ . '/vendor/autoload.php';

?>

<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">

  <meta name="theme-color" content="#fafafa">
</head>

<body>
  <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <!-- Add your site or application content here -->

  <section>
      <h1>Test Predis</h1>
  <?php

  try {
      $redis = new Predis\Client();
      /*
          $redis = new PredisClient(array(
              "scheme" => "tcp",
              "host" => "127.0.0.1",
              "port" => 6379));
      */
      echo "Successfully connected to Redis";
  }
  catch (Exception $e) {
      echo "Couldn't connected to Redis";
      echo $e->getMessage();
  }


  $client = new Predis\Client();
  $client->set('age', 31);
  $value = $client->incr('age');
  echo $value;

  $list = "fruits";
  $client->rpush($list, "Pomme");
  $client->rpush($list, "Banane");
  $client->lpush($list, "Kiwi");
  $result = $client->lrange($list, 0, -1);

  foreach($result as $element) {
      echo '<br>'.$element.'</br>';
  }

  echo "Cette liste est longue de ". $client->llen($list)." elements.";

  $client->set("1semaine", "j'expire dans une semaine !");
  $client->expireat("1semaine", strtotime("+1 week"));
  $ttl = $client->ttl("1 semaine");
  echo $ttl;
  ?>
  </section>

  <script src="js/vendor/modernizr-3.7.1.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')</script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set','transport','beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>
</body>

</html>
