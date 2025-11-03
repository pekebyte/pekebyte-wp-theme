<?php

/**
 * Home Page
 *
 * @package TailPress
 */

get_header();
?>

<div class="min-h-screen">
    <?php if (have_posts()): ?>
        <?php while (have_posts()): the_post(); ?>
            <!-- Hero -->
            <?php
            $hero = get_field('hero');
            ?>
            <section class="relative min-h-[90vh] flex items-center justify-center overflow-hidden">
                <div class="container mx-auto px-4 relative z-10">
                    <div class="max-w-4xl mx-auto text-center">
                        <div class="inline-block mb-4">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/code-icon-home.svg" alt="icon" class="h-16" />
                        </div>
                        <h1 class="text-5xl md:text-7xl font-bold text-primary mb-6"><?php echo $hero['mainheading'] ?></h1>
                        <p class="text-xl md:text-2xl text-pekegray mb-8"><?php echo $hero['subtitulo'] ?></p>
                        <div class="flex flex-wrap gap-4 justify-center">
                            <a href=<?php echo $hero['boton_1']['url']; ?> <?php echo ($hero['boton_1']['target']!="" ? 'target="'.$hero['boton_1']['target'] : '') ?>>
                                <button class="button-primary"><?php echo $hero['boton_1']['title'] ?></button>
                            </a>
                            <a href=<?php echo $hero['boton_2']['url']; ?> <?php echo ($hero['boton_2']['target']!="" ? 'target="'.$hero['boton_2']['target'] : '') ?>>
                                <button class="button-secondary"><?php echo $hero['boton_2']['title'] ?></button>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Hero -->
            <!-- Columns -->
            <section>
            <?php
            $columns = get_field('columns');
            foreach ($columns as $column):
            ?>

            <?php
            endforeach;
            ?>
            </section>
            <!-- Columns -->
        <?php endwhile; ?>
    <?php endif; ?>
</div>

<?php
get_footer();
