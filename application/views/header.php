
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Landing Page</title>
    <script src="<?php echo base_url(); ?>assets/js/fontawesome.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css" >

    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>

</head>

<body style="color: black; background-color: white;">
<div class="container-fluid" style="background: black">
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
          <ul class="navbar-nav ml-lg-auto">
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo site_url('/'); ?>">Home <i class="fas fa-home"></i></a>
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
</div>