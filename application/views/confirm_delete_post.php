<div class="container-fluid py-4">
  <div class="row my-4 ">
        <?php 
            $success_msg = $this->session->flashdata('success_msg');
            if($success_msg ){ ?>
                <div class="col-md-11 my-2 mx-auto alert alert-success">
                    <?php echo $success_msg ?>
                </div>
            <?php } ?>  
        <?php 
            $error_msg = $this->session->flashdata('error_msg');
            if($error_msg){ ?>
                <div class="col-md-11 my-2 mx-auto alert alert-danger">
                    <?php echo $error_msg ?>
                </div>
                <?php } ?> 
    </div>
    
    <div class="row my-2">
        <div class="col-md-12 my-2 d-flex justify-content-center">
            <p>
                <span class="mr-2">Are you sure you want to delete this post?<span><a class="mr-2 unlike" href="<?php echo site_url('home/delete_post/'.$slug); ?>">yes</a>
                <a class="like" href="<?php echo site_url('home/dashboard'); ?>">no</a>
            </p>
        </div>
  </div>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>


</body>
</html>
    