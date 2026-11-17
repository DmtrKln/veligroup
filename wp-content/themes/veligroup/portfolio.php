<?php

/*
Template Name: Portfolio
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
    <section class="portfolio">
        <div class="container">
            <img
                src="<?= get_template_directory_uri(); ?>/assets/img/main/ellepse.svg"
                alt=""
                class="portfolio__ellipce">

            <p class="portfolio__badge"><?= $fields['portfolio_badge'] ?? '' ?></p>

            <h1 class="portfolio__title">
                <?= $fields['portfolio_title'] ?? '' ?> <em><?= $fields['portfolio_titleaccent'] ?? '' ?></em>
            </h1>

            <p class="portfolio__subtitle">
                <?= $fields['portfolio_desc'] ?? '' ?>
            </p>

            <div class="portfolio__filters" data-project-filters>
                <ul class="portfolio__tabs list-reset">
                    <li>
                        <button
                            class="btn-reset portfolio__tab active"
                            type="button"
                            data-project-term="0"
                            aria-pressed="true">
                            Все работы
                        </button>
                    </li>

                    <?php
                    $categories = get_terms([
                        'taxonomy'   => 'project_category',
                        'hide_empty' => false,
                    ]);

                    if (!is_wp_error($categories)):
                        foreach ($categories as $category):
                    ?>
                            <li>
                                <button
                                    class="btn-reset portfolio__tab"
                                    type="button"
                                    data-project-term="<?= $category->term_id ?>"
                                    aria-pressed="false">
                                    <?= $category->name ?>
                                </button>
                            </li>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </ul>
            </div>

            <ul class="portfolio__list list-reset" data-projects>
                <?= veliy_render_projects(); ?>
            </ul>

            <p data-project-status role="status" hidden></p>
        </div>
    </section>
    <?php
    get_template_part('sections/contacts', null, [
        'page_id' => $page_id,
    ]);
    ?>

</main>
<?php
get_footer();
?>
