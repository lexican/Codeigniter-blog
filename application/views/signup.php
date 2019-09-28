<div class="container py-2">
        <div class="row my-2">
            <div class="col-12 d-flex justify-content-center align-items-center">
                <div class="col-md-6 form-signin" >
                    <?php echo form_open('Users/signup_validation'); ?>
                    <fieldset class="form-group text-centered">
                        <legend class="border-bottom mb-4 ">Sign up</legend>
                    </fieldset>
                    <div class="form-group">
                        <?php echo form_error('username', '<div class="alert alert-danger">', '</div>'); ?>
                        <input class="form-control" placeholder="Username" name="username"  value="<?php echo set_value('username'); ?>">
                    </div>
                    <div class="form-group">
                        <?php echo form_error('firstname', '<div class="alert alert-danger">', '</div>'); ?>
                        <input class="form-control" placeholder="Firstname" name="firstname"  value="<?php echo set_value('firstname'); ?>">
                    </div>
                    <div class="form-group">
                        <?php echo form_error('lastname', '<div class="alert alert-danger">', '</div>'); ?>
                        <input class="form-control" placeholder="Lastname" name="lastname"  value="<?php echo set_value('lastname'); ?>">
                    </div>
                    <div class="form-group">
                        <?php echo form_error('email', '<div class="alert alert-danger">', '</div>'); ?>
                        <input type="email" class="form-control" placeholder="Email" name="email"  value="<?php echo set_value('email'); ?>">
                    </div>
                    <div class="form-group">
                        <?php echo form_error('password_1', '<div class="alert alert-danger">', '</div>'); ?>
                        <input type="password" class="form-control" placeholder="Password" name="password_1"  value="<?php echo set_value('password_1'); ?>">
                    </div>
                    <div class="form-group">
                        <?php echo form_error('password_2', '<div class="alert alert-danger">', '</div>'); ?>
                        <input type="password" class="form-control" placeholder="confirm password" name="password_2"  value="<?php echo set_value('password_2'); ?>">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-outline-info" type="submit">Sign up</button>
                    </div>
                    <?php echo form_close(); ?>
                    <p class="align-items-between">Already Have an account?<a href="<?php echo site_url('home/login'); ?>" class="mx-2">Log In</a></p>
                </div>
            </div>
        </div>
</div>

    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
</body>
</html>
    