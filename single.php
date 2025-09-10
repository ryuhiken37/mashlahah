<?php get_header(); ?>
<main class="container mx-auto px-4 py-6">
    <?php if(have_posts()): while(have_posts()): the_post(); ?>
        <article class="prose lg:prose-lg max-w-none bg-white shadow p-6 rounded">
            <h1 class="font-serif text-2xl mb-2"><?php the_title(); ?></h1>
            <p class="text-sm text-gray-500 mb-4">Oleh <?php the_author(); ?> • <?php the_time('j F Y'); ?></p>
            <?php if(has_post_thumbnail()) the_post_thumbnail('large',['class'=>'mb-4 rounded']); ?>
            <?php the_content(); ?>
        </article>
    <?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>