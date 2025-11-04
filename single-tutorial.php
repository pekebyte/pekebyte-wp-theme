<?php get_header(); ?>

<main class="tutorial-single">
  <?php while (have_posts()) : the_post(); ?>
    <article <?php post_class(); ?>>
      <div class="container">
        <h1 class="gradient-text"><?php the_title(); ?></h1>
        
        <div class="tutorial-meta">
          <?php
          $difficulty = get_field('difficulty');
          $duration = get_field('duration');
          ?>
          <?php if ($difficulty) : ?>
            <span class="difficulty <?php echo esc_attr($difficulty); ?>"><?php echo esc_html(ucfirst($difficulty)); ?></span>
          <?php endif; ?>
          <?php if ($duration) : ?>
            <span class="duration"><?php echo esc_html($duration); ?></span>
          <?php endif; ?>
          <span class="date"><?php echo get_the_date(); ?></span>
        </div>

        <?php
        $video_url = get_field('video_url');
        if ($video_url) :
          preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/i', $video_url, $match);
          $video_id = isset($match[1]) ? $match[1] : '';
          if ($video_id) : ?>
            <div class="video-wrapper">
              <iframe src="https://www.youtube.com/embed/<?php echo esc_attr($video_id); ?>" frameborder="0" allowfullscreen></iframe>
            </div>
          <?php endif; ?>
        <?php elseif (has_post_thumbnail()) : ?>
          <?php the_post_thumbnail('large'); ?>
        <?php endif; ?>

        <div class="entry-content">
          <?php the_content(); ?>
        </div>

        <?php
        $github_repo = get_field('github_repo');
        if ($github_repo) : ?>
          <div class="tutorial-github card">
            <h3>Source Code</h3>
            <a href="<?php echo esc_url($github_repo); ?>" class="btn btn-primary" target="_blank">View on GitHub</a>
          </div>
        <?php endif; ?>

        <?php comments_template(); ?>
      </div>
    </article>
  <?php endwhile; ?>
</main>

<?php get_footer(); ?>
