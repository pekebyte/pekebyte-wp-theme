<?php get_header(); ?>

<main class="portfolio-archive">
  <div class="container">
    <header class="page-header">
      <h1 class="gradient-text">Portfolio</h1>
      <p>Check out my latest projects</p>
    </header>

    <?php if (have_posts()) : ?>
      <div class="portfolio-grid">
        <?php while (have_posts()) : the_post(); ?>
          <article <?php post_class('portfolio-item card'); ?>>
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
              
              <?php
              $technologies = get_field('technologies_used');
              if ($technologies) :
                $tech_array = explode(',', $technologies);
              ?>
                <div class="technologies">
                  <?php foreach ($tech_array as $tech) : ?>
                    <span class="tech-badge"><?php echo esc_html(trim($tech)); ?></span>
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>
            </div>
          </article>
        <?php endwhile; ?>
      </div>

      <?php the_posts_pagination(); ?>

    <?php else : ?>
      <p>No portfolio items found.</p>
    <?php endif; ?>
  </div>
</main>

<?php get_footer(); ?>
