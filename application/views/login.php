<div class="container py-4">
  <div class="row my-4">
            <div class="col-12 d-flex justify-content-center align-items-center">
            <?php 
                  $success_msg = $this->session->flashdata('success_msg');
                  if($success_msg){ ?>
                    <div class="col-md-6 alert alert-success">
                      <?php echo $success_msg ?>
                    </div>
                  <?php } ?>  
              <?php 
                  $error_msg = $this->session->flashdata('error_msg');
                  if($error_msg){ ?>
                    <div class="col-md-6 alert alert-danger">
                      <?php echo $error_msg ?>
                    </div>
                  <?php } ?> 
            </div>
  </div>
  <?php if(isset($_SESSION['user'])){
    ?>
    <div class="row my-4">
            <div class="col-12 d-flex justify-content-center align-items-center">
                <div class="col-md-6">
                    <p class="align-items-between "><a href="<?php echo site_url('users/logout'); ?>" class="mx-2 alert alert-danger">Log out</a></p>
                </div>
            </div>
        </div>
  <?php }else{ ?>
    <div class="row my-4">
            <div class="col-12 d-flex justify-content-center align-items-center">
                <div class="col-md-6 form-signin">
                <?php echo form_open('Users/login_validation'); ?>
                    <fieldset class="form-group text-centered">
                        <legend class="border-bottom mb-4 ">Log In</legend>
                    </fieldset>
                    <div class="form-group">
                      <?php echo form_error('username', '<div class="alert alert-danger">', '</div>'); ?>
                        <input class="form-control" placeholder="Username" value="<?php echo set_value('username'); ?>" name="username">
                    </div>
                    <div class="form-group">
                      <?php echo form_error('password', '<div class="alert alert-danger">', '</div>'); ?>
                        <input type="password" class="form-control" placeholder="Password" value="<?php echo set_value('password'); ?>" name="password">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-outline-info" type="submit">Log in</button>
                    </div>
                    <?php echo form_close(); ?>
                    <p class="align-items-between">Not registered?<a href="<?php echo site_url('home/signup'); ?>" class="mx-2">Sign up</a></p>
                </div>
            </div>
        </div>

  <?php } ?>


</div>


    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>


</body>
</html>
    