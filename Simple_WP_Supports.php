<?php 

//Get And Display Catagories                      
$categories = get_the_category();
if ($categories) :
    foreach ($categories as $category) : ?>
        <li><a href=""><?php echo $category->name; ?></a></li>   
    <?php endforeach;
endif;
        


// Get And Display Latest Comments
$comments = get_comments(array(
    'post_id' => $post->ID,
    'number' => '4' )); ?>
<?php foreach ($comments as $comment) : ?>
    <div class="popular-comment-items wow fadeInUp">
        <h5><span><i class="far fa-comment-dots"></i></span><?php echo $comment-> comment_author; ?></h5>
        <p><?php echo $comment-> comment_content; ?></p>
    </div>
<?php endforeach; ?>



<!-- Get And Display Author Link, Image and Name -->
<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID','user_nicename')); ?>">
    <div class="user">
        <h6><?php echo get_avatar( get_the_author_meta('ID')); ?></h6>
        <p><?php echo get_the_author_meta('display_name'); ?></p>
    </div>
</a>


<!-- Trime Word -->
<p><?php echo wp_trim_words( get_the_content(), 25); ?></p>
<a class="theme-btn mt-30" href="<?php the_permalink() ?>">Read More</a>

<!-- Date Formate -->
<?php the_date( 'F j, Y' ); ?>


<!-- Get And Display Previous & Next Post -->
<div class="next-pre-post wow fadeInUp">
    <?php 
        $previous_post = get_adjacent_post( false, '', true);
        $next_post = get_adjacent_post( false, '', false);
    ?>
    <?php if (!empty($previous_post)) :?>
        <a href="<?php echo get_permalink($previous_post->ID) ?>">
            <div class="pre-post">
                <h6>Previous Post</h6>
                <p><?php echo $previous_post->post_title ?></p>
            </div>
        </a>
    <?php endif ?>

    <?php if (!empty($next_post)) :?>
        <a href="<?php echo get_permalink($next_post->ID) ?>">
            <div class="pre-post">
                <h6>Previous Post</h6>
                <p><?php echo $next_post->post_title ?></p>
            </div>
        </a>
    <?php endif ?>
</div>

<!-- Comment Form -->
<div class="comment-area wow fadeInUp">

                            <?php $commenter = wp_get_current_commenter(); ?>
                            <?php if ( 'open' == $post->comment_status ) : ?>
                            
                            <div id="respond">
                            
                                <h3><?php comment_form_title(); ?></h3>
                                
                                <?php cancel_comment_reply_link(); ?>
                                
                                <?php if ( get_option( 'comment_registration' ) && !$user_ID ) : ?>
                                
                                <p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
                                
                                <?php else : ?>
                                
                                <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
                                    <div class="input wow fadeInUp">
                                        <textarea name="comment" id="comment" cols="30" rows="8" placeholder="Comment*" tabindex="4"></textarea>
                                    </div>
                                
                                <?php if ( $user_ID ) : ?>
                                
                                <p>Logged in as <a href="<?php echo get_option( 'siteurl' ); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url( get_permalink() ); ?>" title="Log out of this account">Log out ?</a></p>
                                <?php else : ?>
                                <div class="input-50  wow fadeInUp">
                                    <div class="input">
                                        <input type="text" placeholder="Name*" name="author" id="author" value="<?php echo $commenter['comment_author']; ?>" tabindex="1">
                                    </div>
                                    <div class="input">
                                        <input type="email" placeholder="Email*" name="email" id="email" tabindex="2" value="<?php echo $commenter['comment_author_email']; ?>">
                                    </div>
                                </div>
                                <div class="input  wow fadeInUp">
                                    <input type="text" placeholder="Website" name="url" id="url" tabindex="3" value="<?php echo $commenter['comment_author_url']; ?>">
                                </div>
                                <div class="input checkbox">
                                    <label>
                                        <input class="wi-5" id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes" />
                                        <span>Save my name, email, and website in this browser for the next time I comment.</span>
                                    </label>
                                </div>
                                <?php endif; ?>
                                
                                <p><input name="submit" class="submit theme-btn  wow fadeInUp" type="submit" id="submit" tabindex="5" value="Submit" /></p>

                                <?php do_action( 'comment_form', $post->ID ); comment_id_fields(); ?>
                                
                                </form>
                                
                                <?php endif; // If registration required and not logged in ?>
                            </div>
                            
                            <?php endif; // If comments are open: delete this and the sky will fall on your head ?>
                        </div>