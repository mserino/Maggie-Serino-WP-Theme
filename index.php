<?php get_header(); ?>
<?php
  $about_title          = get_field('about_title');
  $about_description    = get_field('about_description');
  $work_title           = get_field('work_title');
  $work_description     = get_field('work_description');
  $experiments_title    = get_field('experiments_title');
  $experiments_description = get_field('experiments_description');
  $contact_title        = get_field('contact_title');
  $contact_text         = get_field('contact_text');
?>
<section class="container hero" id="hero">
      <div class="row">
        <div class="col-12 hero__col-container">
          <h1 class="title text-center" data-aos="zoom-in" data-aos-duration="900" data-aos-once="true"><?php echo get_bloginfo('name'); ?></h1>
          <h5 class="subtitle" data-aos="zoom-in" data-aos-duration="900" data-aos-delay="200" data-aos-once="true"><?php echo get_bloginfo('description'); ?></h5>
          <?php
            $icon_class = '';
            set_query_var('icon_class', $icon_class);
            get_template_part('template-parts/content', 'social-icons');
          ?>

          <a href="#about" class="hero__arrow">
            <div class="bounce animated infinite">
              <i class="arrow fas fa-chevron-down fa-3x"></i>
            </div>
          </a>
        </div>
      </div>
    </section>

    <section class="container about section" id="about">
      <div class="row">
        <div class="col-12">
          <h2 class="title-line"><?php echo $about_title; ?></h2>
          <div class="about__text" data-aos="fade-up"  data-aos-duration="1000" data-aos-once="true">
            <?php echo $about_description ?>
          </div>
        </div>
      </div>
    </section>

    <section class="container work section" id="work">
      <div class="row">
        <div class="col-12">
          <h2 class="title-line"><?php echo $work_title; ?></h2>
          <div class="work__text" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
            <?php echo $work_description; ?>
          </div>
          <div class="work__list row">

            <?php $work_loop = new WP_Query(array(
              'post_type' => 'portfolio',
              'orderby' => 'post_id',
              'order' => 'ASC'
            )); ?>

            <?php while($work_loop->have_posts()) : $work_loop->the_post(); ?>
              <?php
                $work_url = get_field('work_url');
                $work_alt = get_field('work_alt');
              ?>
              <div class="work__element col-12 col-md-6" data-aos="fade-up"  data-aos-duration="1000" data-aos-once="true">
                <a href="<?php echo $work_url; ?>" target="_blank" class="work__link" title="<?php echo $work_alt; ?>">
                  <div class="work__img-container">
                    <?php the_post_thumbnail( 'full', array( 'class' => 'work__img img-responsive' ) );
                    ?>
                    <i class="icon-link fas fa-link fa-5x"></i>
                  </div>
                  <h4 class="work__title title"><?php the_title(); ?></h4>
                </a>
                <?php
                  $posttags = get_the_tags();
                  if ($posttags) {
                   echo '<div class="work__labels">';
                   foreach($posttags as $tag) {
                     echo '<p class="label">' .$tag->name. '</p>';
                   }
                   echo '</div>';
                  }
                ?>
              </div>
            <?php endwhile; wp_reset_query(); ?>
          </div>
        </div>
      </div>
    </section>

    <section class="container work section" id="experiments">
      <div class="row">
        <div class="col-12">
          <h2 class="title-line"><?php echo $experiments_title; ?></h2>
          <div class="work__text" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
            <?php echo $experiments_description; ?>
          </div>
          <div class="work__list row">
            <?php $experiments_loop = new WP_Query(array(
              'post_type' => 'experiments',
              'orderby' => 'post_id',
              'order' => 'ASC'
            )); ?>

            <?php while($experiments_loop->have_posts()) : $experiments_loop->the_post(); ?>
              <?php
                $work_url = get_field('work_url');
                $work_alt = get_field('work_alt');
              ?>
              <div class="work__element col-12 col-md-6" data-aos="fade-up"  data-aos-duration="1000"  data-aos-once="true">
                <a href="<?php echo $work_url; ?>" target="_blank" class="work__link" title="<?php echo $work_alt; ?>">
                  <div class="work__img-container">
                    <?php the_post_thumbnail( 'full', array( 'class' => 'work__img img-responsive' ) );
                    ?>
                    <i class="icon-link fas fa-link fa-5x"></i>
                  </div>
                  <h4 class="work__title title"><?php the_title(); ?></h4>
                </a>
                <?php
                  $posttags = get_the_tags();
                  if ($posttags) {
                   echo '<div class="work__labels">';
                   foreach($posttags as $tag) {
                     echo '<p class="label">' .$tag->name. '</p>';
                   }
                   echo '</div>';
                  }
                ?>
              </div>
            <?php endwhile; wp_reset_query(); ?>
          </div>
        </div>
      </div>
    </section>

    <section class="contact" id="contact">
      <div class="container">
        <div class="row">
          <div class="col-12 contact-container">
            <h2 data-aos="zoom-in" data-aos-duration="900" data-aos-once="true"><?php echo $contact_title; ?></h2>
            <h2 class="title-uppercase title-huge text-center" data-aos="zoom-in" data-aos-duration="900" data-aos-delay="200" data-aos-once="true"><?php echo $contact_text; ?></h2>

            <?php
              $icon_class = 'white';
              set_query_var('icon_class', $icon_class);
              get_template_part('template-parts/content', 'social-icons');
            ?>
          </div>
        </div>
      </div>
    </section>

<?php get_footer(); ?>
