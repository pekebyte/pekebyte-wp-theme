<?php get_header(); ?>

<main class="home-page">
  <!-- Hero Section -->
  <section class="hero-section">
    <div class="container">
      <h1>Hi, I'm <span class="gradient-text"><?php bloginfo('name'); ?></span></h1>
      <p><?php bloginfo('description'); ?></p>
      <div class="hero-buttons">
        <a href="<?php echo get_post_type_archive_link('portfolio'); ?>" class="btn btn-primary">View Portfolio</a>
        <a href="<?php echo get_permalink(get_page_by_path('contact')); ?>" class="btn btn-secondary">Contact</a>
      </div>
    </div>
  </section>

  <!-- Featured Portfolio -->
  <section class="featured-portfolio">
    <div class="container">
      <h2 class="section-title">Featured Projects</h2>
      <div class="portfolio-grid">
        <?php
        $portfolio = new WP_Query(array(
          'post_type' => 'portfolio',
          'posts_per_page' => 6,
        ));

        if ($portfolio->have_posts()) :
          while ($portfolio->have_posts()) : $portfolio->the_post();
        ?>
          <article class="portfolio-card card">
            <?php if (has_post_thumbnail()) : ?>
              <div class="portfolio-thumbnail">
                <a href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail('portfolio-thumb'); ?>
                </a>
              </div>
            <?php endif; ?>
            
            <div class="portfolio-content">
              <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <?php the_excerpt(); ?>
            </div>
          </article>
        <?php
          endwhile;
          wp_reset_postdata();
        endif;
        ?>
      </div>
    </div>
  </section>

  <!-- Latest Tutorials -->
  <section class="latest-tutorials">
    <div class="container">
      <h2 class="section-title">Latest Tutorials</h2>
      <div class="tutorials-grid">
        <?php
        $tutorials = new WP_Query(array(
          'post_type' => 'tutorial',
          'posts_per_page' => 3,
        ));

        if ($tutorials->have_posts()) :
          while ($tutorials->have_posts()) : $tutorials->the_post();
        ?>
          <article class="tutorial-card card">
            <?php if (has_post_thumbnail()) : ?>
              <div class="tutorial-thumbnail">
                <a href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail('tutorial-thumb'); ?>
                </a>
              </div>
            <?php endif; ?>
            
            <div class="tutorial-content">
              <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <?php the_excerpt(); ?>
            </div>
          </article>
        <?php
          endwhile;
          wp_reset_postdata();
        endif;
        ?>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
