<?php get_header(); ?>

<main id="main" class="main main--inner privacy-policy">
    <?php while (have_posts()):
        the_post(); ?>
        <div class="container">
            <ul class="breadcrumbs list-reset">
                <li><a href="<?= esc_url(home_url('/')); ?>">Главная</a></li>
                <li aria-hidden="true">/</li>
                <li class="current-page" aria-current="page"><?php the_title(); ?></li>
            </ul>
        </div>
        <article class="article">
            <div class="container">
                <h1 class="article__title"><?php the_title(); ?></h1>
                <div class="article__body">
                    <?php the_content(); ?>
                </div>
            </div>
        </article>
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>
