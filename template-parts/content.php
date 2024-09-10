<article id="post-<?php the_ID(); ?>" <?php post_class( 'mb-12' ); ?>>
	
	<header class="entry-header mb-4 flex flex-wrap justify-between">
		<?php
			/** In order to display the correct Icon will need the last category */
			$last_child_category = get_the_last_child_category(get_the_ID());
		?>
		<div class="w-full w-1/12 self-center md:self-auto"><img src="<?php echo get_cat_icon($last_child_category) ?>" alt="<?php printf( __( 'Image of category %s', 'pekebyte-one' ), $last_child_category->name ); ?>" /></div>
		<div class="w-11/12 px-5 md:self-end">
			<?php the_title( sprintf( '<h2 class="entry-title text-2xl md:text-3xl font-extrabold leading-tight mb-1"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			<div class="w-full flex">
				<time datetime="<?php echo get_the_date( 'c' ); ?>" itemprop="datePublished" class="text-sm text-gray-700"><?php echo get_the_date(); ?></time>
				<div class="ml-2 text-sm text-gray-700">-</div>
				<div class="ml-2 text-sm text-gray-700"><?php get_the_reading_time(get_the_ID()); ?></div>
			</div>
		</div>
	</header>

	<?php if (is_single()) : ?>

		<div class="entry-content">
			<?php
			/* translators: %s: Name of current post */
			the_content(
				sprintf(
					__( 'Continue reading %s', 'pekebyte-one' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				)
			);

			wp_link_pages(
				array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'pekebyte-one' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'pekebyte-one' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				)
			);
			?>
		</div>

	<?php endif; ?>

</article>
