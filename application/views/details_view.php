<div class="container my-4">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <h4><?php echo $news_item['title']; ?>  Created at <?php echo $news_item['created_at']; ?></h4>
            <p><?php echo $news_item['text']; ?></p>
            <?php if($total_comments == 0){ ?>
                <p><?php echo $total_comments ?> Comment<p>
            <?php }else{ ?>
                <p><?php echo $total_comments ?> Comments</p> 
            <?php } ?>
            <?php if($news_item['likes'] == 1){ ?>
                <span class="likes_count"><?php echo $news_item['likes']; ?> like</span>
            <?php }else{ ?>
                <span class="likes_count"><?php echo $news_item['likes']; ?> likes</span> 
            <?php } ?>
            

            <?php if(isset($_SESSION['user_id'])){ 
                // determine if user has already liked this post
                $isLike = $this->news_model->isLiked($_SESSION['user_id'], $news_item['id']);
                if ($isLike): ?>
                    <span class="unlike" data-id="<?php echo $news_item['id']; ?>"><i class="fas fa-thumbs-down"></i></span> 
                    <span class="like hide " data-id="<?php echo $news_item['id']; ?>"><i class="fas fa-thumbs-up"></i></span> 
                <?php else: ?>
                    <span class="like" data-id="<?php echo $news_item['id']; ?>"><i class="fas fa-thumbs-up"></i></span>
                    <span class="unlike hide " data-id="<?php echo $news_item['id']; ?>"><i class="fas fa-thumbs-down"></i></span> 
                <?php endif ?>
            <?php } ?>
                <hr>
        </div>

        <div id="comments" class="col-md-12">
            <?php foreach ($comments as $comment): ?>
            <div class='col'>
                <div class='comment-info'><span class='comment-row-label'>from</span>
                    <span class='posted-by'>
                        <a class="" href="<?php echo site_url('users/profile/'.$comment['comment_username']); ?>"><?php echo $comment['comment_username']; ?></a>
                    </span> 
                    <span class='commet-row-label'>at</span>
                    <span class='posted-at'><?php echo $comment['created_at']; ?></span>
                </div>
                <div class='comment-text'>
                    <p id="<?php echo $comment['id']; ?>"><?php echo $comment['comment_body']; ?></p>
                    <?php if( isset($_SESSION['user']) && ($_SESSION['user'] == $comment['comment_username']) ) { ?>
                        <button class="btn btn-sm edit-btn" onClick="Edit(<?php echo $comment['id']; ?>)">Edit</button>
                        <?php if( isset($comment['edited_at']) ){ ?>
                            <span>Edited</span>
                            <span class='mx-2'>at</span>
                            <span class='edited-at' > <?php echo $comment['edited_at']; ?> </span>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
            <hr>
            <?php endforeach; ?>
        </div>
        <div class="col-md-12">
            <?php if(!(isset($_SESSION['user']))){ ?>
                <p class="align-items-between ">To add a comment<a href="<?php echo site_url('users/login'); ?>" class="btn btn-primary mx-2">Log in</a></p>
            <?php }else{ ?>
                    <form class="form-group" id="submitcomment">
                            <label class="from-control">Add a comment</label>
                            <div id="error" class="alert alert danger" style="display:none; padding: 0 0;"></div>
                            <input type="hidden" id="post_id" name="post_id" value="<?php echo $news_item['id']; ?>">
                            <input type="hidden" id="post_slug" name="post_slug" value="<?php echo $news_item['slug']; ?>">
                            <input type="hidden" id="comment_username" name="comment_username" value="<?php echo $_SESSION['user']; ?>">
                            <input type="hidden" id="comment_id"  value="">
                            <textarea rows="4" id="comment_body" class="form-control" placeholder="Type your comment" name="comment_body"></textarea>
                            <button class="btn btn-primary btn-sm mt-2" type="submit" id="submit_comment">Submit</button>
                            <button class="btn btn-primary btn-sm mt-2 hide" type="submit" id="update_comment">update</button>
                    </form>
                <?php } ?>
        </div>
    </div>
</div>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>

<script>
        function Edit(comment_id){
            $('#submit_comment').addClass('hide');
            $('#update_comment').removeClass('hide');
            var currentMessage = $("p"+"#" + comment_id).html();
            $('#comment_body').val(currentMessage);
            $('#comment_id').val(comment_id);
        }
    $(document).ready( () => {
		$('.like').on('click', function(){
			var postid = $(this).data('id');
			    $post = $(this);
                console.log("liked clicked");
			$.ajax({
				url: 'http://localhost/CodeIgniter/index.php/home/like_post',
				type: 'post',
				data: {
					'liked': 1,
					'postid': postid
				},
				success: function(response){
                    console.log("response" + response);
					$post.parent().find('span.likes_count').text(response + " likes");
					$post.addClass('hide');
					$post.siblings().removeClass('hide');
				}
			});
		});


        		// when the user clicks on unlike
		$('.unlike').on('click', function(){
			var postid = $(this).data('id');
		    $post = $(this);
            console.log("unliked clicked");
			$.ajax({
				url: 'http://localhost/CodeIgniter/index.php/home/unlike_post',
				type: 'post',
				data: {
					'unliked': 1,
					'postid': postid
				},
				success: function(response){
                    console.log("response" + response);
					$post.parent().find('span.likes_count').text(response + " likes");
					$post.addClass('hide');
					$post.siblings().removeClass('hide');
				}
			});
		});


        $("#submitcomment").submit(function(e){  
            e.preventDefault();
            var post_id = $('#post_id').val();
            var post_slug = $('#post_slug').val();
            var comment_username = $('#comment_username').val();
            var comment_body = $('#comment_body').val();
            $.ajax({
                url: "http://localhost/CodeIgniter/index.php/home/add_comment",
                type: "POST",
                dataType: "json",
                data: $("#submitcomment").serialize(),
                success: function(data){
                    if($.isEmptyObject(data.error)){
                        var comment = "<div class='col'>"
                        + "<div class='comment-info'><span class='commet-row-label'>from</span> <span class='posted-by'>"
                            + "<a href='<?php echo site_url('users/profile/"+ comment_username +" '); ?>'>" +comment_username + "</a>"
                            + " </span> <span class='commet-row-label'>at</span> <span class='posted-at'>"
                            + "<?php echo date('Y-m-d H:i:s') ?>"
                            + "</span></div>"
                            + "<div class='comment-text'>"
                            + comment_body
                            + "</div>"
                            + "</div>";
                        $("#comments").append(comment);
                        $('#comment_body').val("");

                    }else{
                        $('#error').css({display: 'block'});
                        $('#error').html(data.error);
                        $('#error p').addClass('alert alert-danger');
                    }
                }
            });  
        }); 
        
        $("#update_comment").click(function(e){  
            e.preventDefault();
            var comment_body = $('#comment_body').val();
            var comment_id = $('#comment_id').val();
            if(comment_body != ''){
                $.ajax({
                    url: "http://localhost/CodeIgniter/index.php/home/update_comment",
                    type: "POST",
                    dataType: "json",
                    data: {'comment_id': comment_id,
                           'comment_body': comment_body
                          },
                    success: function(data){
                        $("p"+"#" + comment_id).html(comment_body);
                        $('#comment_body').val("");
                        $('#comment_id').val("");
                        $('#update_comment').addClass('hide');
                        $('#submit_comment').removeClass('hide');

                    }
                });
            }else{
                $('#error').css({display: 'block'});
                $('#error').html("<p>The Comment field is required.</p>");
                $('#error p').addClass('alert alert-danger');
            }
        });


    });
</script>
</body>

</html>
    