<?php get_header(); ?>

<main class="site-main container">
  <?php if (have_posts()) : ?>
    <div class="posts-grid">
      <?php while (have_posts()) : the_post(); ?>
        <article <?php post_class('card'); ?>>
          <?php if (has_post_thumbnail()) : ?>
            <div class="post-thumbnail">
              <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('large'); ?>
              </a>
            </div>
          <?php endif; ?>
          
          <div class="post-content">
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="post-meta">
              <span><?php echo get_the_date(); ?></span>
              <span>by <?php the_author(); ?></span>
            </div>
            <div class="post-excerpt">
              <?php the_excerpt(); ?>
            </div>
            <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More</a>
          </div>
        </article>
      <?php endwhile; ?>
    </div>

    <?php the_posts_pagination(); ?>

  <?php else : ?>
    <div class="no-posts">
      <h1>Nothing Found</h1>
      <p>Sorry, no posts matched your criteria.</p>
    </div>
  <?php endif; ?>
</main>

<?php get_footer(); ?>
