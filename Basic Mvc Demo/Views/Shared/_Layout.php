<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $this->getTitle() ?? APP_NAME; ?></title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="/assets/styles/cover.css?aa" rel="stylesheet">
  </head>

  <body>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">Amvisie Demo</h3>
              <nav class="nav nav-masthead">
                <a class="nav-link" href="<?php echo $this->url->getMethod('index', 'home'); ?>">Home</a>
                <a class="nav-link" href="<?php $this->url->printMethod('about', 'home'); ?>">About</a>
                <a class="nav-link" href="<?php $this->url->printMethod('contact', 'home'); ?>">Contact</a>
                <?php if(array_key_exists('selectedLang', $this->viewPocket)): ?>
                <div class="nav-link dropdown">
                  <a class="dropdown-toggle" href="/" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php echo $this->viewPocket['selectedLang']; ?>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="dropdown01">
                  <?php foreach ($this->viewObject->langList as $key => $value) {
                      $this->html->link($value, 'lang', 'home', array('class' => 'dropdown-item'), array( 'loc' => $key));
                    } 
                  ?>
                  </div>
                </div>
                <?php endif;?>
              </nav>
            </div>
          </div>

          <div class="inner cover">
            <?php $this->body(); ?>
          </div>

          <div class="mastfoot">
            <div class="inner">
              <p><a href="https://github.com/huestack/amvisie">Amvisie Github</a> by <a href="https://twitter.com/huestack">@huestack</a>.</p>
            </div>
          </div>

        </div>

      </div>

    </div>

    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <?php
    $this->section('script');
    ?>
  </body>
</html>