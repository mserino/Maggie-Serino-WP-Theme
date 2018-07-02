<?php
  $custom_options_creator_name    = get_option('custom_options_creator_name');
?>
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          <p><?php echo get_field('footer_text'); ?></p>
          <p>Copyright <?php echo date('Y'); ?> <?php echo $custom_options_creator_name; ?></p>
        </div>
      </div>
    </div>
  </footer>

  <?php wp_footer(); ?>
  </body>
</html>
