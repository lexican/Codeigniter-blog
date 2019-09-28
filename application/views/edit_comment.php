<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <?php if(!(isset($_SESSION['user']))){ ?>
                <p class="align-items-between ">To add a comment<a href="<?php echo site_url('users/login'); ?>" class="btn btn-primary mx-2">Log in</a></p>
            <?php }else{ ?>
                    <div class="col">
                        <?php echo form_open('Home/update_comment'); ?>
                            <label class="from-control">Update comment</label>
                            <p><a class="" href="<?php echo site_url('users/profile/'.$comment['comment_username']); ?>"><?php echo $_SESSION['user']; ?></a></p>
                            <input  type="hidden" id="coment_id" name="comment_id" value="<?php echo $comment['id']; ?>">                            
                            <input  type="hidden" id="post_id" name="post_id" value="<?php echo $comment['id']; ?>">
                            <?php echo form_error('comment_body', '<div class="alert alert-danger">', '</div>'); ?>
                            <textarea rows="4" id="comment_body" class="form-control" placeholder="Type your comment" name="comment_body"><?php echo $comment['comment_body'] ?></textarea>
                            <button class="btn btn-primary mt-2" type="submit">update</button>
                            <?php echo form_close(); ?>
                    </div>
                <?php } ?>
        </div>
    </div>
</div>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
</body>

</html>
    