<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Landing Page - Start Bootstrap Theme</title>
    <script src="js/fontawesome.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css" >

    


</head>

<body>
<div class="container-fluid" id="home">
    <nav class="navbar navbar-expand-md">
        <a class="navbar-brand" href="#">Landing Page</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
            <div class="toggler-btn">
              <div class="bar"></div>
              <div class="bar"></div>
              <div class="bar"></div>
          </div>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarsExample01">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo site_url('home/index'); ?>">Home <i class="fas fa-home"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#explore">Explore</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#blog">Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#contact">Contact</a>
            </li>
            <?php if(isset($_SESSION['isAdmin']) && ($_SESSION['isAdmin'] == 1) ){ ?>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('home/dashboard'); ?>">dashboard</a>
              </li>
            <?php }?>
            <?php if(isset($_SESSION['user'])){ ?>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('users/profile/'.$_SESSION['user']); ?>">Profile</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('users/logout'); ?>">logout</a>
              </li>
            <?php }else{?>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('home/login'); ?>">Log in</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('home/signup'); ?>">Sign up</a>
              </li>
             <?php } ?> 
          </ul>
        </div>
      </nav>
      
    <div class="container">
      <div class="row height-90">
        <div class="col">
          <div class="banner text-center">
              <h1 class="text-capitalize w-50 mx-auto">Lorem ipsum</h1>
              <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reprehenderit a magni esse harum iste libero eum ex officia, voluptates, 
                repudiandae est illo sunt nihil autem. Et dolorum dignissimos natus minima!</p>
                <a href="#" class="btn main-btn my-2 text-capitalize">Lorem ipsum</a>
          </div>
            
        </div>
      </div>
    </div>
</div>

<section class="section1 py-4 primary-color">
  <div class="container mt-4">
    <div class="row">
      <div class="offset-sm-2 col-sm-8">
        <div class="text-center">
            <h2 class="text-capitalize mx-auto">Lorem ipsum</h2>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reprehenderit a magni esse harum iste libero eum ex officia, voluptates, 
              repudiandae est illo sunt nihil autem. Et dolorum dignissimos natus minima!
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reprehenderit a magni esse harum iste libero eum ex officia, voluptates, 
              repudiandae est illo sunt nihil autem. Et dolorum dignissimos natus minima!</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="blog" class="my-2">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 text-center my-4">
        <h3 class="heading">Latest posts</h3>
        <div class="heading-underline mb-2"></div>
        <?php foreach ($news as $news_item): ?>
              <p class="text-center primary-color"><span class= "arrow">>></span><a href="<?php echo site_url('home/details/'.$news_item['slug']); ?>"><?php echo $news_item['title']; ?></h3></a><span class= "arrow"><<</span></p>
        <?php endforeach; ?>
        </div>
    </div>
  </div>  
</section>



<section id="section2 mb-4">
  <div class="container-fluid">
    <div class="row mx-1">
      <div class="col-md-6 text-center my-height-60 banner-1">
      </div>
      <div class="col-md-6  my-4 text-center my-height-60  align-self-center">
        <div class="contact-center">
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Recusandae dolor eos rerum placeat quaerat explicabo ipsum consequatur. Velit esse odio incidunt, 
                inventore perspiciatis assumenda ea pariatur asperiores ipsum provident excepturi?
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Recusandae dolor eos rerum placeat quaerat explicabo ipsum consequatur. Velit esse odio incidunt, 
                </p>
                <a href="#" class="btn main-btn my-2 text-capitalize">Contact us</a>
        </div>
      </div>

    </div>
  </div>
</section>
 
<div class="container my-4">
  <div class="row d-flex justify-content-center primary-color">
    <div class="col-md-4">
      <div class="card">
          <div class="inner">
              <img class="card-img-top" src="<?php echo base_url(); ?>assets/img/banner-bg.jpg" alt="card image cap">
          </div>
        <div class="card-body text-center">
          <h5 class="card-title">Card title 1</h5>
          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
            Ullam corporis eveniet ea provident distinctio, magnam ad laudantium ipsum nihil dolorem modi iste! 
            Deserunt exercitationem rem dicta inventore vitae ratione iusto.</p>
            <a href="#" class="btn btn-primary">Somewhere</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
        <div class="card">
          <div class="inner">
              <img class="card-img-top" src="<?php echo base_url(); ?>assets/img/banner-bg.jpg" alt="card image cap">
          </div>
          
          <div class="card-body text-center">
            <h5 class="card-title">Card title 2</h5>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
              Ullam corporis eveniet ea provident distinctio, magnam ad laudantium ipsum nihil dolorem modi iste! 
              Deserunt exercitationem rem dicta inventore vitae ratione iusto.</p>
              <a href="#" class="btn btn-primary">Somewhere</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
          <div class="card">
              <div class="inner">
                  <img class="card-img-top" src="<?php echo base_url(); ?>assets/img/banner-bg.jpg" alt="card image cap">
              </div>
          
            <div class="card-body text-center">
              <h5 class="card-title">Card title 3</h5>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                Ullam corporis eveniet ea provident distinctio, magnam ad laudantium ipsum nihil dolorem modi iste! 
                Deserunt exercitationem rem dicta inventore vitae ratione iusto.</p>
                <a href="#" class="btn btn-primary">Somewhere</a>
            </div>
          </div>
        </div>
  </div>
</div>

  <div class="container primary-color my-4 py-4">
      <div class="row text-center">
        <div class="col-md-4">
          <div class="feature">
            <i class="fas fa-play-circle fa-4x" data-fa-transform="shrink-3 up-5"></i>
          </div>
          <h3>Lorem ipsum</h3>
          <p>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quibusdam nemo dignissimos atque. Officiis vero debitis sequi pariatur minus nisi officia quisquam! 
            Nobis, at! Perspiciatis pariatur incidunt dolorum, recusandae commodi ullam!
          </p>
        </div>
        <div class="col-md-4">
            <div class="feature">
                <i class="fas fa-play-circle fa-4x"></i>
              </div>
              <h3>Lorem ipsum</h3>
            <p>
              Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quibusdam nemo dignissimos atque. Officiis vero debitis sequi pariatur minus nisi officia quisquam! 
              Nobis, at! Perspiciatis pariatur incidunt dolorum, recusandae commodi ullam!
            </p>
          </div>
          <div class="col-md-4">
              <div class="feature">
                  <i class="fas fa-play-circle fa-4x"></i>
                </div>
                <h3>Lorem ipsum</h3>
              <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quibusdam nemo dignissimos atque. Officiis vero debitis sequi pariatur minus nisi officia quisquam! 
                Nobis, at! Perspiciatis pariatur incidunt dolorum, recusandae commodi ullam!
              </p>
            </div>
      </div>
</div>

<div class="container-fluid py-4 primary-color">
  <div class="col-12 text-center my-4">
    <h3 class="heading">Clients</h3>
    <div class="heading-underline"></div>
  </div>

  <div class="jumbotron row clients">
    <div class="col-md-6 col-sm-12"> 
      <div class="row">
        <div class="col-sm-3">
            <img class="card-img-top" src="<?php echo base_url(); ?>assets/img/dog.jpg" alt="card image cap">
        </div>
        <div class="col-sm-9">
            <blockquote><i class="fas fa-quote-left"></i> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eaque, aspernatur libero reiciendis voluptatum, odio hic maxime excepturi non est culpa exercitationem 
                odit commodi quis possimus quos tempora earum expedita. Nesciunt?</blockquote>
                <hr class="clients-hr">
                    <cite>&#8212;</cite>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-sm-12"> 
        <div class="row">
            <div class="col-sm-3">
                <img class="card-img-top" src="<?php echo base_url(); ?>assets/img/dog.jpg" alt="card image cap">
            </div>
            <div class="col-sm-9">
                <blockquote><i class="fas fa-quote-left"></i> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eaque, aspernatur libero reiciendis voluptatum, odio hic maxime excepturi non est culpa exercitationem 
                    odit commodi quis possimus quos tempora earum expedita. Nesciunt?</blockquote>
                    <hr class="clients-hr">
                    <cite>&#8212;</cite>
            </div>
      </div>
  </div>
</div>
</div>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>

</body>
</html>
    