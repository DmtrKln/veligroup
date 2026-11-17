<?php

get_header();

$page_id = get_queried_object_id();

$fields = array_merge(
    get_fields($page_id) ?: [],
    get_fields('option') ?: []
);

?>
<main id="main" class="main main--inner">
    <?php
    if (have_posts()):
        while (have_posts()):
            the_post();
            ?>
            <div class="container">
                <ul class="breadcrumbs list-reset">
                    <li><a href="<?= home_url('/'); ?>">Главная</a></li>
                    <li aria-hidden="true">/</li>
                    <li><a href="<?= home_url('/blog/'); ?>">Блог</a></li>
                    <li aria-hidden="true">/</li>
                    <li>
                        <p class="current-page" aria-current="page"><?php the_title(); ?></p>
                    </li>
                </ul>
            </div>
            <div class="article">
                <div class="container">
                    <h1 class="article__title"><?php the_title(); ?></h1>
                    <p class="article__lead"><?= ($fields['article_lead'] ?? '') ?: get_the_excerpt(); ?></p>
                    <div class="article__body">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
            <?php
        endwhile;
    endif;

    get_template_part('sections/callback', null, [
        'page_id' => $page_id,
    ]);
    ?>
</main>
<?php get_footer(); ?>
