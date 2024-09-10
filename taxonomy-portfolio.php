<?php get_header(); ?>

<div class="container mx-auto my-8">
	<?php if (is_tax()): ?>
		<div class="w-full flex mb-10 cat-navigation">
			<?php
			$category = get_queried_object(); 
			$category_id = $category->term_id;
			$categories = get_categories(array(
                'taxonomy' => 'portfolio',
				'orderby' => 'ID',
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
	<div class="my-14 grid grid-cols-1 md:grid-cols-3 gap-4 max-w-[960px] mx-auto portfolio-grid">
	<?php if ( have_posts() ) : ?>
		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<div id="work-<?php the_ID(); ?>" <?php post_class(); ?>>
        		<a href="<?php echo esc_url(get_permalink()) ?>">
            		<div>
                		<div class="rounded-lg h-40 w-full relative overflow-hidden">
                   			<?php echo get_the_post_thumbnail(get_the_ID(), 'post-thumbnail', 'class="object-cover min-h-full"') ?>
                		</div>
            		</div>
       			 </a>
				<div class="mt-2">
					<a href="<?php echo esc_url(get_permalink()) ?>"><h2><?php echo get_the_title() ?></h2></a>
					<div class="mt-3 text-sm"><?php the_excerpt() ?></div>
                </div>
    		</div>
		<?php endwhile; ?>
	<?php endif; ?>
	</div>
</div>

<?php
get_footer();