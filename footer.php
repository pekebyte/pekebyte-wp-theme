  </div><!-- #content -->

  <footer class="site-footer">
    <div class="container">
      <div class="footer-content">
        <div class="footer-info">
          <h3><?php bloginfo('name'); ?></h3>
          <p><?php bloginfo('description'); ?></p>
        </div>

        <div class="footer-social">
          <?php
          $social = array('github', 'linkedin', 'twitter', 'youtube');
          foreach ($social as $network) {
            $url = get_theme_mod('pekebyte_' . $network);
            if ($url) {
              echo '<a href="' . esc_url($url) . '" target="_blank">' . ucfirst($network) . '</a>';
            }
          }
          ?>
        </div>
      </div>

      <div class="footer-bottom">
        <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
      </div>
    </div>
  </footer>

  <?php wp_footer(); ?>
</body>
</html>
