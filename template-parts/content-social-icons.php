<div class="social-icons" data-aos="zoom-in" data-aos-duration="900" data-aos-once="true">
  <?php $loop = new WP_Query(array(
    'post_type' => 'social',
    'orderby' => 'post_id',
    'order' => 'ASC'
  )); ?>

  <?php while($loop->have_posts()) : $loop->the_post(); ?>
    <?php
      $social_url = get_field('social_url');
      $social_icon = get_field('social_icon');
    ?>
    <a href="<?php echo $social_url; ?>" target="_blank">
      <i class="icon icon-<?php echo $icon_class; ?> <?php echo $social_icon; ?> fa-2x"></i>
    </a>
  <?php endwhile; wp_reset_query(); ?>
</div>
<div class="email-container" data-aos="zoom-in" data-aos-duration="900" data-aos-once="true">
  <a href="mailto:<?php echo $social_email; ?>" class="email email-<?php echo $icon_class; ?>">hello@maggieserino.com</a>
</div>
