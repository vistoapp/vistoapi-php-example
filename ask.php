<?php
require __DIR__ . '/vendor/autoload.php';

$data =  array('visto_id'=> $_POST["visto_id"]);

$response = \Httpful\Request::post('http://api.vistoapp.com/requests')
    ->expectsJson()
    ->addHeaders(array(
        'X-User-Token' => '[your token here]',
        'X-User-Email' => '[your api user here]',
    ))
    ->body(http_build_query($data))
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
      <div id="target" class="text-center">
        <h2><?= $response->body->title ?></h2>
        <h3>due date:&nbsp;<?= $response->body->due_date ?></h3>
      </div>

    </div> <!-- /container -->
    


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  </body>
</html>