<?php get_header(); ?>
<main class="container mx-auto px-4 py-6">
    <?php if(have_posts()): while(have_posts()): the_post(); ?>
        <article class="bg-white shadow p-6 rounded">
            <h1 class="font-serif text-2xl mb-4"><?php the_title(); ?></h1>
            <?php the_content(); ?>
        </article>
    <?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>