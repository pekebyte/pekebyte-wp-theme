<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header mb-4 flex flex-wrap justify-between p-5">
		<?php
			/** In order to display the correct Icon will need the last category */
			$last_child_category = get_the_last_child_category(get_the_ID());
		?>
		<div class="w-1/12 self-center md:self-auto"><img src="<?php echo get_cat_icon($last_child_category) ?>" alt="<?php printf( __( 'Image of category %s', 'pekebyte-one' ), $last_child_category->name ); ?>" /></div>
		<div class="w-11/12 px-5 md:self-end">
			<?php the_title( sprintf( '<h1 class="entry-title text-2xl lg:text-5xl font-extrabold leading-tight mb-1"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
			<div class="w-full flex">
				<time datetime="<?php echo get_the_date( 'c' ); ?>" itemprop="datePublished" class="text-sm text-darker-light-blue"><?php echo get_the_date(); ?></time>
				<div class="ml-2 text-sm text-darker-light-blue">-</div>
				<div class="ml-2 text-sm text-darker-light-blue"><?php get_the_reading_time(get_the_ID()); ?></div>
			</div>
		</div>
	</header>

	<div class="entry-content">
		<?php the_content(); ?>

		<?php
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

</article>
