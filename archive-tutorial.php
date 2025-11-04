<?php get_header(); ?>

<main class="tutorial-archive">
  <div class="container">
    <header class="page-header">
      <h1 class="gradient-text">Tutorials</h1>
      <p>Learn with step-by-step guides</p>
    </header>

    <?php if (have_posts()) : ?>
      <div class="tutorials-grid">
        <?php while (have_posts()) : the_post(); ?>
          <article <?php post_class('tutorial-card card'); ?>>
            <?php if (has_post_thumbnail()) : ?>
              <div class="tutorial-thumbnail">
                <a href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail('tutorial-thumb'); ?>
                </a>
              </div>
            <?php endif; ?>
            
            <div class="tutorial-content">
              <div class="tutorial-meta">
                <?php
                $difficulty = get_field('difficulty');
                $duration = get_field('duration');
                if ($difficulty) : ?>
                  <span class="difficulty <?php echo esc_attr($difficulty); ?>"><?php echo esc_html(ucfirst($difficulty)); ?></span>
                <?php endif; ?>
                <?php if ($duration) : ?>
                  <span class="duration"><?php echo esc_html($duration); ?></span>
                <?php endif; ?>
              </div>
              
              <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <?php the_excerpt(); ?>
            </div>
          </article>
        <?php endwhile; ?>
      </div>

      <?php the_posts_pagination(); ?>

    <?php else : ?>
      <p>No tutorials found.</p>
    <?php endif; ?>
  </div>
</main>

<?php get_footer(); ?>
