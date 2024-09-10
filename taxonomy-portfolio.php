<?php get_header(); ?>

<div class="container mx-auto my-8">
	<?php if (is_tax()): ?>
		<div class="w-full flex mb-10 cat-navigation">
			<?php
			$category = get_queried_object(); 
			$category_id = $category->term_id;
			$categories = get_categories(array(
                'taxonomy' => 'portfolio',
				'orderby' => 'parent_id',
				'order'   => 'ASC',
				'hide_empty' => false
			));
			?>
			
			<?php 
				foreach ($categories as $cat):
					$category_link = get_category_link( $cat->term_id );
					$additional_class = ($cat->term_id == $category_id) ? "active": "";
					if ($cat->category_parent > 0):
			?>
				<a href="<?php echo esc_url( $category_link ); ?>" class="<?php echo $additional_class; ?>"><?php echo $cat->name ?></a>
			<?php
				else:
			?>
				<a href="<?php echo esc_url( $category_link ); ?>" class="<?php echo $additional_class; ?>"><?php echo __('All') ?></a>
			<?php
				endif;
				endforeach;
			?>
		</div>
	<?php endif; ?>
	<?php if ( have_posts() ) : ?>
		<?php
		while ( have_posts() ) :
			the_post();
			?>

			<?php get_template_part( 'template-parts/content', get_post_format() ); ?>

		<?php endwhile; ?>

	<?php endif; ?>

</div>

<?php
get_footer();