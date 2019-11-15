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

