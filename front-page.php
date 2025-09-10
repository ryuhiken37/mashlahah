<?php get_header(); ?>
<main class="container mx-auto px-4 py-6">
    <!-- Headline Slider -->
    <section class="mb-6">
        <?php
        $headline = new WP_Query(['posts_per_page'=>3]);
        if($headline->have_posts()): ?>
            <div class="grid sm:grid-cols-3 gap-4">
            <?php while($headline->have_posts()): $headline->the_post(); ?>
                <article class="relative bg-white shadow rounded overflow-hidden">
                    <?php if(has_post_thumbnail()) the_post_thumbnail('medium',['class'=>'w-full h-40 object-cover']); ?>
                    <div class="p-3">
                        <h2 class="text-lg font-serif"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <p class="text-sm text-gray-600"><?php the_excerpt(); ?></p>
                    </div>
                </article>
            <?php endwhile; ?>
            </div>
        <?php endif; wp_reset_postdata(); ?>
    </section>

    <!-- Rubrik grid -->
    <section class="grid md:grid-cols-2 gap-4">
        <?php
        $categories = ['nasional','nu','politik','opini','inspirasi'];
        foreach($categories as $cat): ?>
            <div class="bg-white shadow rounded p-4">
                <h3 class="font-semibold mb-2"><?php echo ucfirst($cat); ?></h3>
                <?php
                $cat_posts = new WP_Query(['category_name'=>$cat,'posts_per_page'=>3]);
                if($cat_posts->have_posts()):
                    while($cat_posts->have_posts()): $cat_posts->the_post(); ?>
                        <article class="mb-3">
                            <h4 class="text-base font-medium"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        </article>
                    <?php endwhile;
                endif;
                wp_reset_postdata();
                ?>
            </div>
        <?php endforeach; ?>
    </section>
</main>
<?php get_footer(); ?>