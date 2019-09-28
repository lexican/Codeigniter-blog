<div class="container py-4">
  <div class="row my-4">
        <div class="col-12 d-flex justify-content-center align-items-center">
            <div class="col-md-10">
                <?php echo form_open_multipart('home/create_post_validation'); ?>
                    <fieldset class="form-group text-centered">
                        <legend class="border-bottom mb-4 ">Create post</legend>
                    </fieldset>
                    <div class="form-group">
                    <?php 
                        if($success_msg){ ?>
                            <div class="alert alert-success">
                            <?php echo $success_msg ?>
                            </div>
                        <?php } ?>   
                        <input type='hidden' class="form-control" placeholder="Username" value="<?php echo $_SESSION['user_id']; ?>" name="user_id">
                    </div>
                    <div class="form-group">
                    <?php echo form_error('title', '<div class="alert alert-danger">', '</div>'); ?>
                        <input type="text" class="form-control" placeholder="Title" value="<?php echo set_value('title'); ?>" name="title">
                    </div>
                    <div class="form-group">
                    <?php 
                        if($error != ''){ ?>
                            <?php echo '<div class="alert alert-danger">'.$error.'</div>' ?>
                        <?php } ?> 
                        <input type="file" name="userfile" size="20" class="form-control" value="<?php echo set_value('userfile'); ?>"/>
                    </div>
                    <div class="form-group">
                    <?php echo form_error('text', '<div class="alert alert-danger">', '</div>'); ?>
                        <textarea rows="20" type="text" class="form-control" placeholder="Enter post" name="text"><?php echo set_value('text'); ?></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-outline-info" type="submit">Create post</button>
                    </div>
                    <?php echo form_close(); ?>
                    <p class="align-items-between">Go to<a href="<?php echo site_url('home/dashboard'); ?>" class="mx-2">Dashboard</a></p>
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
    