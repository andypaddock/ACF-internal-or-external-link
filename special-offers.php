<?php
$featured_posts = get_field('offers');

if( $featured_posts ): ?>

<?php foreach( $featured_posts as $post ):
$specialImage = get_field('offer_image');
$arrowImage = get_field('offer_icon');

        // Setup this post for WP functions (variable must be named $post).
        setup_postdata($post); ?>


<div class="container specials">
    <div class="specials__highlight">
        <img src="<?php echo $arrowImage['url'];?>" title="<?php echo $arrowImage['title'];?>"
            alt="<?php echo $arrowImage['alt'];?>" />

    </div>
    <div class="specials__offer">
        <h3 class="heading heading__4"><?php the_title(); ?></h3>
        <p><?php the_field('hero_copy');?></p>

        <?php if(get_field('offer_link') == 'external'): ?>
        <?php 
$link = get_field('external_link');
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>

        <a class="dark-link" target="<?php echo esc_attr( $link_target ); ?>"
            href="<?php echo esc_url( $link_url ); ?>">
            <?php echo esc_html( $link_title ); ?><i class="fas fa-external-link-alt"></i>
        </a>
        <?php else: ?>
        <a class="dark-link" href="<?php the_permalink(); ?>">
            <?php the_field('link_text');?><i class="fas fa-chevron-right"></i>
        </a>
        <?php endif; ?>
    </div>
    <div class="specials__image" style="background-image: url(<?php echo $specialImage['url'];?>"
        title="<?php echo $specialImage['title'];?>" alt="<?php echo $specialImage['alt'];?>">
    </div>
</div>

<?php endforeach; ?>

<?php 
    // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata(); ?>
<?php endif; ?>
