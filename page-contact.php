<?php
/**
 * Template Name: Contact Page
 */
get_header(); ?>

<main class="contact-page">
  <?php while (have_posts()) : the_post(); ?>
    <div class="container">
      <h1 class="gradient-text"><?php the_title(); ?></h1>

      <div class="contact-content">
        <?php the_content(); ?>
      </div>

      <div class="contact-form-wrapper card">
        <form id="contact-form">
          <?php wp_nonce_field('pekebyte_contact', 'contact_nonce'); ?>
          
          <div class="form-group">
            <label for="name">Name *</label>
            <input type="text" id="name" name="name" required>
          </div>

          <div class="form-group">
            <label for="email">Email *</label>
            <input type="email" id="email" name="email" required>
          </div>

          <div class="form-group">
            <label for="message">Message *</label>
            <textarea id="message" name="message" rows="6" required></textarea>
          </div>

          <button type="submit" class="btn btn-primary">Send Message</button>

          <div id="form-messages" style="display: none;"></div>
        </form>
      </div>
    </div>
  <?php endwhile; ?>
</main>

<?php get_footer(); ?>
