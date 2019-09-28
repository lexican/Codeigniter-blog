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
        <div class="col-md-12 my-2 d-flex justify-content-end">
            <button class="btn btn-primary"><a href="<?php echo site_url('home/create_post'); ?>" class="link" >add post</a></button>
        </div>

        <div class="col-12 d-flex justify-content-center align-items-center"> 
            <table class="col-12 table table-bordered table-striped table-dark">
                    <thead>
                        <tr>
                            <th scope="col" ><span class="mr-1"><?php echo $num_post ?></span><span>posts</span></th>
                            <th scope="col" >actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($news as $news_item): ?>
                    <tr>
                        <td><p class="text-center primary-color"><a href="<?php echo site_url('home/details/'.$news_item['slug']); ?>"><?php echo $news_item['title']; ?></h3></a></p></td>
                        <td><a class="btn btn-primary btn-sm mr-1" href="<?php echo site_url('home/update_post/'.$news_item['slug']); ?>">update</a><a class="btn btn-danger btn-sm" href="<?php echo site_url('home/confirm_delete_post/'.$news_item['slug']); ?>">delete</a></td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
            </table>
        </div>
  </div>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>


</body>
</html>
    