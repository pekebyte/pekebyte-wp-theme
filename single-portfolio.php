<?php get_header(); ?>

<main class="portfolio-single">
  <?php while (have_posts()) : the_post(); ?>
    <article <?php post_class(); ?>>
      <div class="container">
        <h1 class="gradient-text"><?php the_title(); ?></h1>

        <!-- Media Gallery -->
        <?php
        $media_gallery = get_field('media_gallery');
        if ($media_gallery && count($media_gallery) > 0) : ?>
          <div class="project-media">
            <?php if (count($media_gallery) > 1) : ?>
              <!-- Carousel -->
              <div class="media-carousel">
                <div class="carousel-container">
                  <button class="carousel-btn prev">‹</button>
                  
                  <div class="carousel-slides">
                    <?php foreach ($media_gallery as $index => $media) : ?>
                      <div class="carousel-slide <?php echo $index === 0 ? 'active' : ''; ?>">
                        <?php if ($media['media_type'] === 'image' && $media['media_image']) : ?>
                          <img src="<?php echo esc_url($media['media_image']['url']); ?>" alt="<?php echo esc_attr($media['media_image']['alt']); ?>" />
                        <?php elseif ($media['media_type'] === 'video' && $media['media_video']) : ?>
                          <div class="video-wrapper">
                            <iframe src="https://www.youtube.com/embed/<?php echo esc_attr($media['media_video']); ?>" frameborder="0" allowfullscreen></iframe>
                          </div>
                        <?php endif; ?>
                      </div>
                    <?php endforeach; ?>
                  </div>
                  
                  <button class="carousel-btn next">›</button>
                </div>
              </div>
            <?php else : ?>
              <!-- Single media -->
              <?php $media = $media_gallery[0]; ?>
              <div class="single-media">
                <?php if ($media['media_type'] === 'image' && $media['media_image']) : ?>
                  <img src="<?php echo esc_url($media['media_image']['url']); ?>" alt="<?php echo esc_attr($media['media_image']['alt']); ?>" />
                <?php elseif ($media['media_type'] === 'video' && $media['media_video']) : ?>
                  <div class="video-wrapper">
                    <iframe src="https://www.youtube.com/embed/<?php echo esc_attr($media['media_video']); ?>" frameborder="0" allowfullscreen></iframe>
                  </div>
                <?php endif; ?>
              </div>
            <?php endif; ?>
          </div>
        <?php elseif (has_post_thumbnail()) : ?>
          <?php the_post_thumbnail('large'); ?>
        <?php endif; ?>

        <div class="entry-content">
          <?php the_content(); ?>
        </div>

        <?php
        $project_url = get_field('project_url');
        $github_url = get_field('github_url');
        if ($project_url || $github_url) : ?>
          <div class="project-links">
            <?php if ($project_url) : ?>
              <a href="<?php echo esc_url($project_url); ?>" class="btn btn-primary" target="_blank">View Project</a>
            <?php endif; ?>
            <?php if ($github_url) : ?>
              <a href="<?php echo esc_url($github_url); ?>" class="btn btn-secondary" target="_blank">GitHub</a>
            <?php endif; ?>
          </div>
        <?php endif; ?>
      </div>
    </article>
  <?php endwhile; ?>
</main>

<?php get_footer(); ?>
