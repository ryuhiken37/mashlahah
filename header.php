<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="bg-white shadow">
    <div class="container mx-auto flex justify-between items-center py-4 px-4">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center">
            <div class="w-10 h-10 bg-green-700 rounded-full flex items-center justify-center text-white font-bold">M</div>
            <span class="ml-2 font-serif text-lg font-semibold">Mashlahah.id</span>
        </a>
        <nav>
            <?php wp_nav_menu(['theme_location'=>'primary','menu_class'=>'flex space-x-4']); ?>
        </nav>
    </div>
</header>