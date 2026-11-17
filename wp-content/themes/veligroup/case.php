<?php
$page_id = get_queried_object_id();

$fields = array_merge(
    get_fields($page_id) ?: [],
    get_fields('option') ?: []
);
?>
<main id="main" class="main main--inner">
    <section class="case-hero">
        <div class="container">
            <img class="case-hero__glow" src="<?= get_template_directory_uri(); ?>/assets/img/main/ellepse.svg" alt=""
                width="565" height="860" aria-hidden="true">
            <nav aria-label="Хлебные крошки">
                <ol class="breadcrumbs list-reset">
                    <li><a href="<?= home_url('/'); ?>">Главная</a></li>
                    <li aria-hidden="true">/</li>
                    <li><a href="<?= home_url('/portfolio/'); ?>">Портфолио</a></li>
                    <li aria-hidden="true">/</li>
                    <li>
                        <p class="current-page" aria-current="page"><?php the_title(); ?></p>
                    </li>
                </ol>
            </nav>
            <div class="case-hero__heading">
                <h1 class="case-hero__title"><?php the_title(); ?></h1>
                <div class="case-hero__subrow">
                    <p class="case-hero__subtitle"><?= $fields['case_subtitle'] ?></p>
                    <p class="case-hero__caption"><?= $fields['case_caption'] ?></p>
                </div>
            </div>
            <?php if (!empty($fields['case_img']['url']) || has_post_thumbnail()): ?>
                <picture class="case-hero__image">
                    <?php if (!empty($fields['case_img_mobile']['url'])): ?>
                        <source media="(max-width: 768px)" srcset="<?= esc_url($fields['case_img_mobile']['url']) ?>">
                    <?php endif; ?>
                    <?php if (!empty($fields['case_img']['url'])): ?>
                        <img src="<?= esc_url($fields['case_img']['url']) ?>"
                            alt="<?= esc_attr($fields['case_img']['alt']) ?>" decoding="async" width="1440" height="620">
                    <?php else: ?>
                        <?php the_post_thumbnail('full', ['decoding' => 'async']); ?>
                    <?php endif; ?>
                </picture>
            <?php endif; ?>
        </div>
    </section>

    <?php if (have_rows('case_summary', $page_id)): ?>
        <section class="case-summary">
            <div class="container">
                <div class="case-summary__row">
                    <?php
                    while (have_rows('case_summary', $page_id)):
                        the_row();
                        $badge = get_sub_field('badge');
                        $title = get_sub_field('title');
                        $desc = get_sub_field('desc');
                        ?>
                        <div class="case-summary__item">
                            <div class="case-summary__heading">
                                <p class="case-meta"><?= $badge ?></p>
                                <h2 class="case-summary__title"><?= $title ?></h2>
                            </div>
                            <p class="case-summary__text"><?= $desc ?></p>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php
    if (have_rows('case_sections', $page_id)):
        while (have_rows('case_sections', $page_id)):
            the_row();
            $section_class = get_row_index() === 1 ? 'case-design' : 'case-functionality';
            $badge = get_sub_field('badge');
            $title = get_sub_field('title');
            $desc = get_sub_field('desc');
            $desc_mobile = get_sub_field('desc_mobile');
            $img = get_sub_field('img');
            $img_mobile = get_sub_field('img_mobile');
            ?>
            <section class="<?= $section_class ?>">
                <div class="container">
                    <div class="<?= $section_class ?>__row">
                        <div class="case-copy">
                            <div class="case-copy__heading">
                                <p class="case-meta"><?= $badge ?></p>
                                <h2 class="case-copy__title"><?= $title ?></h2>
                            </div>
                            <p class="case-copy__desktop"><?= $desc ?></p>
                            <p class="case-copy__mobile"><?= $desc_mobile ?></p>
                        </div>
                        <?php if (!empty($img['url'])): ?>
                            <picture class="case-showcase">
                                <?php if (!empty($img_mobile['url'])): ?>
                                    <source media="(max-width: 768px)" srcset="<?= esc_url($img_mobile['url']) ?>">
                                <?php endif; ?>
                                <img src="<?= esc_url($img['url']) ?>" alt="<?= esc_attr($img['alt']) ?>" loading="lazy"
                                    decoding="async" width="680" height="520">
                            </picture>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
            <?php
        endwhile;
    endif;
    ?>

    <?php if (!empty($fields['case_responsive_desc']) || have_rows('case_phones', $page_id)): ?>
        <section class="case-responsive">
            <div class="container">
                <div class="case-responsive__panel">
                    <img class="case-responsive__background"
                        src="<?= esc_url($fields['case_responsivebg']['url'] ?? get_template_directory_uri() . '/assets/img/main/case-responsive-background.svg'); ?>" alt=""
                        aria-hidden="true" width="1681" height="1178" loading="lazy">
                    <div class="case-responsive__heading">
                        <div class="case-responsive__intro">
                            <p class="case-meta"><?= $fields['case_responsive_badge'] ?></p>
                            <h2 class="case-responsive__title">
                                <em
                                    class="case-responsive__desktop"><?= $fields['case_responsive_title'] ?></em>
                                <em
                                    class="case-responsive__mobile"><?= $fields['case_responsive_title_mobile'] ?></em>
                            </h2>
                        </div>
                        <p class="case-responsive__text"><?= $fields['case_responsive_desc'] ?></p>
                    </div>
                    <div class="case-responsive__phones">
                        <?php
                        if (have_rows('case_phones', $page_id)):
                            while (have_rows('case_phones', $page_id)):
                                the_row();
                                $img = get_sub_field('img');
                                $img_mobile = get_sub_field('img_mobile');
                                if (empty($img['url'])) {
                                    continue;
                                }
                                ?>
                                <picture
                                    class="case-responsive__phone<?= get_row_index() === 2 ? ' case-responsive__phone-tall' : '' ?>">
                                    <?php if (!empty($img_mobile['url'])): ?>
                                        <source media="(max-width: 768px)" srcset="<?= esc_url($img_mobile['url']) ?>">
                                    <?php endif; ?>
                                    <img src="<?= esc_url($img['url']) ?>" alt="<?= esc_attr($img['alt']) ?>" loading="lazy"
                                        decoding="async" width="260" height="<?= get_row_index() === 2 ? 530 : 500 ?>">
                                </picture>
                                <?php
                            endwhile;
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <section class="case-promo">
        <img class="case-promo__mobile-background"
            src="<?= get_template_directory_uri(); ?>/assets/img/main/case-promo-mobile-background.svg" alt=""
            aria-hidden="true" width="360" height="256" loading="lazy">
        <div class="container">
            <div class="case-promo__panel">
                <img class="case-promo__background"
                    src="<?= get_template_directory_uri(); ?>/assets/img/main/case-promo-background.svg" alt=""
                    aria-hidden="true" width="2850" height="1626" loading="lazy">
                <h2 class="case-promo__title">
                    <?= $fields['case_promo_title'] ?></h2>
                <div class="case-promo__buttons">
                    <button class="case-promo__action btn-reset" type="button" data-modal-open>Обсудить проект</button>
                    <a class="case-promo__link" href="<?= home_url('/portfolio/'); ?>">Портфолио</a>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('sections/contacts', null, ['page_id' => $page_id]); ?>
</main>
