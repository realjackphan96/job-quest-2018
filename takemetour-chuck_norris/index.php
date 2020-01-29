<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Resume - Start Bootstrap Theme</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/resume.min.css" rel="stylesheet">

</head>

<body id="page-top">
  <?php 
    require_once 'common.php';
    $api = new chuckAPI();
  ?>

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
    <a class="navbar-brand js-scroll-trigger" href="#page-top">
      <span class="d-block d-lg-none">Clarence Taylor</span>
      <span class="d-none d-lg-block">
        <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="img/chuck-profile.png" alt="">
      </span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#about">Intro</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#experience">Random Joke</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#education">Specific Joke</a>
      </ul>
    </div>
  </nav>

  <div class="container-fluid p-0">

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="about">
      <div class="w-100">
        <h1 class="mb-0">Chuck
          <span class="text-primary">Noris</span>
          <span class="mb-0">Jokes</span>
        </h1>
      </div>
    </section>

    <hr class="m-0">

    <!-- Random Joke -->
    <section class="resume-section p-3 p-lg-5 d-flex justify-content-center" id="experience">
      <div class="w-100">
        <h2 class="mb-5">Random Joke</h2>

        <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
          <div class="resume-content">
            <h3 class="mb-0"><u>Generated Joke</u></h3>
            <div class="subheading mb-3">
              <?php

                if(isset($_GET['rand-joke'])){
                  echo $_GET['rand-joke'];
                }
              ?>
            </div>

            <form action="index_process.php" method='get'>
              <input type="submit" name="rand" value="Generate random joke" id="chuck-rand-btm">
            </form>
          </div>
        </div>
      </div>
    </section>

    <hr class="m-0">

    <!-- Specific joke -->
    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="education">
      <div class="w-100">
        <h2 class="mb-5">Specific Joke</h2>

        <div class="d-flex justify-content-around">
          
        
          <!-- Left content -->
          <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5" style="padding:0px 50px">
            <div class="resume-content">

              <form action="#education">
                
                <h3 class="mb-0">Number of Jokes:</h3>
                <input type="number" name="jokesNum"><br><br>

                <h3 class="mb-0">Enter First Name:</h3>
                <input type="text" name="fname"><br><br> 

                <h3 class="mb-0">Enter Last Name:</h3>
                <input type="text" name="lname"><br><br>

                <input type="submit" name="specific" value="Generate Joke">
                
              </form>

            </div>
          </div>

          <!-- Right content -->
          <div class='justify-content-around'>

            <?php
              if(isset($_GET['specific'])){
                $joke_array = $api->getRandomJokes($_GET['jokesNum'],$_GET['fname'],$_GET['lname']);

                echo "<ul>";
                foreach($joke_array as $jokeObj){
                    $joke = $jokeObj->joke;
                  echo "<li> $joke </li>";
                  echo "<br>";
                }

                echo "</ul>";
              }


            ?>

          </div>

        </div>

      </div>
      
    </section>

  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/resume.min.js"></script>

</body>

</html>
