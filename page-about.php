<?php
/**
 * Template Name: About Page
 */
get_header(); ?>

<main class="about-page">
  <?php while (have_posts()) : the_post(); ?>
    <div class="container">
      <h1 class="gradient-text"><?php the_title(); ?></h1>

      <div class="about-content">
        <?php the_content(); ?>
      </div>

      <!-- Skills -->
      <?php
      $skills = get_field('skills');
      if ($skills) : ?>
        <section class="skills-section">
          <h2>Skills & Expertise</h2>
          <div class="skills-grid">
            <?php foreach ($skills as $skill) : ?>
              <div class="skill-item">
                <div class="skill-header">
                  <span><?php echo esc_html($skill['skill_name']); ?></span>
                  <span><?php echo esc_html($skill['skill_level']); ?>%</span>
                </div>
                <div class="skill-bar">
                  <div class="skill-progress" style="width: <?php echo esc_attr($skill['skill_level']); ?>%"></div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </section>
      <?php endif; ?>

      <!-- Certifications -->
      <?php
      $certifications = get_field('certifications');
      if ($certifications) : ?>
        <section class="certifications-section">
          <h2>Certifications</h2>
          <div class="certifications-grid">
            <?php foreach ($certifications as $cert) : ?>
              <div class="certification-card card">
                <h3><?php echo esc_html($cert['cert_title']); ?></h3>
                <p class="cert-org"><?php echo esc_html($cert['cert_org']); ?></p>
                <p class="cert-year"><?php echo esc_html($cert['cert_year']); ?></p>
              </div>
            <?php endforeach; ?>
          </div>
        </section>
      <?php endif; ?>
    </div>
  <?php endwhile; ?>
</main>

<?php get_footer(); ?>
