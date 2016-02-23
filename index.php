<?php
require __DIR__ . '/vendor/autoload.php';
 
$response = \Httpful\Request::get('http://api.vistoapp.com/catalog?size=100&filter=search&filter_value=')
    ->expectsJson()
    ->addHeaders(array(
        'X-User-Token' => '[your token here]',
        'X-User-Email' => '[your api user here]',
    ))
    ->send();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Simple Visto API example">
    <meta name="author" content="Visto">

    <title>Visto API</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  </head>

  <body>

    <div class="container wrapper-md">

      <!-- Main component for a primary marketing message or call to action -->
      <div id="target" class="list-group">
      <?php foreach ($response->body->vistos as $test): ?>
          <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading"><?= $test->title ?></h4>
            <p class="list-group-item-text">
              <?php foreach ($test->categories as $cat): ?>
                <span class="label label-default" style="background-color: <?= $cat-> color ?>;"><?= $cat->name ?></span>
              <?php endforeach; ?>
            </p>
          </a>
      <?php endforeach; ?>
      </div>

    </div> <!-- /container -->
    


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  </body>
</html>