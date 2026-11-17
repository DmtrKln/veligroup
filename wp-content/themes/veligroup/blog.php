<?php

/*
Template Name: Blog
*/
get_header();
$page_id = get_queried_object_id();

$fields = array_merge(
    get_fields($page_id) ?: [],
    get_fields('option') ?: []
);

?>
<main id="main" class="main main--inner">
    <div class="container">
        <ul class="breadcrumbs list-reset">
            <li><a href="<?= home_url() ?>">Главная</a></li>
            <li aria-hidden="true">/</li>
            <li>
                <p class="current-page"><?= get_the_title(get_queried_object_id()) ?></p>
            </li>
        </ul>
    </div>
    <section class="blog">
        <div class="container">
            <p class="badge badge-yellow">
                <i class="badge__dot" aria-hidden="true"></i><?= $fields['blog_badge'] ?? 'БЛОГ' ?>
            </p>
            <h1 class="blog__title"><?= $fields['blog_title'] ?? get_the_title($page_id) ?></h1>
            <div class="blog__list">
                <?php
                $articles = new WP_Query([
                    'post_type'      => 'post',
                    'post_status'    => 'publish',
                    'posts_per_page' => -1,
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                ]);

                if ($articles->have_posts()):
                    while ($articles->have_posts()):
                        $articles->the_post();
                        $excerpt = get_post_field('post_excerpt', get_the_ID(), 'raw');
                ?>
                        <a href="<?php the_permalink(); ?>" class="blog__card">
                            <?php
                            the_post_thumbnail('large', [
                                'class'    => 'blog__img',
                                'loading'  => 'lazy',
                                'decoding' => 'async',
                            ]);
                            ?>
                            <div class="blog__body">
                                <h2 class="blog__card-title"><?php the_title(); ?></h2>
                                <?php if (trim($excerpt) !== ''): ?>
                                    <p class="blog__card-text"><?= esc_html($excerpt) ?></p>
                                <?php endif; ?>
                                <p class="blog__more">Читать далее</p>
                            </div>
                        </a>
                <?php
                    endwhile;
                else:
                ?>
                    <p>Статьи пока не добавлены.</p>
                <?php
                endif;

                wp_reset_postdata();
                ?>
            </div>
        </div>
    </section>
    <?php
    get_template_part('sections/callback', null, [
        'page_id' => $page_id,
    ]);
    ?>
    <?php
    get_template_part('sections/contacts', null, [
        'page_id' => $page_id,
    ]);
    ?>
</main>
<?php
get_footer();
?>
