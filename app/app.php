<?php
  date_default_timezone_set('America/Los_Angeles');
  require_once __DIR__.'/../vendor/autoload.php';
  require_once __DIR__.'/../src/hangman.php';
  session_start();
  if (empty($_SESSION['hangman'])) {
    $_SESSION['hangman'] = new Hangman();
  };

  $app = new Silex\Application();
  $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'
  ));


  $app->get('/', function() use ($app) {
    return $app['twig']->render('/root.html.twig');
  });

  $app->post('/submitWord', function() use ($app) {
    $_SESSION['hangman']->setWord($_POST['word']);
    $_SESSION['hangman']->setWordBlanks();
    return $app['twig']->render('/guess.html.twig', array('hangman'=> $_SESSION['hangman']));
  });

  $app->post('/guess', function() use ($app) {
    $_SESSION['hangman']->setGuess($_POST['guess']);
    $_SESSION['hangman']->guessWord($_POST['guess']);
    return $app['twig']->render('/guess.html.twig', array('hangman'=> $_SESSION['hangman']));
  });

  $app->post('/restart', function() use ($app) {
    $_SESSION['hangman'] = new Hangman();
    return $app['twig']->render('/root.html.twig');
  });

  return $app
 ?>
