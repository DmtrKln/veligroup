<?php

/*
Template Name: About
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
            <li><a href="<?= home_url('/'); ?>">Главная</a></li>
            <li aria-hidden="true">/</li>
            <li class="current-page" aria-current="page"><?= get_the_title($page_id) ?></li>
        </ul>
    </div>
    <section class="about-intro">
        <div class="container">
            <p class="about-intro__badge"><?= $fields['about_badge'] ?></p>
            <h1 class="about-intro__title" id="about-title"><?= $fields['about_title'] ?> <em><?= $fields['about_titleaccent'] ?></em></h1>
            <p class="about-intro__description about-copy__desktop"><?= $fields['about_desc'] ?></p>
            <p class="about-intro__description about-copy__mobile"><?= $fields['about_descmobile'] ?></p>
            <div class="about-intro__wrapp">
                <div class="about-intro__trust">
                    <div class="about-intro__accreditation">
                        <div class="about-intro__accreditation-header">
                            <div class="about-intro__shield" aria-hidden="true">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="m12 2 8 3v7c0 5-8 10-8 10S4 17 4 12V5l8-3Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <h2 class="about-intro__accreditation-title"><?= $fields['about_accreditationtitle'] ?></h2>
                        </div>
                        <h3 class="about-intro__accreditation-subtitle"><?= $fields['about_accreditationsubtitle'] ?></h3>
                        <p class="about-intro__accreditation-copy about-copy__desktop"><?= $fields['about_accreditationdesc'] ?></p>
                        <p class="about-intro__accreditation-copy about-copy__mobile"><?= $fields['about_accreditationdescmobile'] ?></p>
                    </div>
                    <div class="about-intro__specialization">
                        <h3 class="about-intro__specialization-title"><?= $fields['about_specializationtitle'] ?></h3>
                        <p class="about-intro__copy about-copy__desktop"><?= $fields['about_specializationdesc'] ?></p>
                        <p class="about-intro__copy about-copy__mobile"><?= $fields['about_specializationdescmobile'] ?></p>
                    </div>
                </div>
                <div class="about-intro__details">
                    <div class="about-intro__details-header">
                        <p class="about-intro__label about-intro__label-red"><?= $fields['about_detailsbadge'] ?></p>
                        <h2 class="about-intro__company"><?= $fields['about_company'] ?></h2>
                    </div>
                    <dl class="about-intro__requisites">
                        <div class="about-intro__requisite">
                            <dt>Адрес:</dt>
                            <dd><?= $fields['about_address'] ?></dd>
                        </div>
                        <div class="about-intro__tax">
                            <div class="about-intro__requisite">
                                <dt>ИНН:</dt>
                                <dd class="about-intro__code"><?= $fields['about_inn'] ?></dd>
                            </div>
                            <div class="about-intro__requisite">
                                <dt>КПП:</dt>
                                <dd class="about-intro__code"><?= $fields['about_kpp'] ?></dd>
                            </div>
                        </div>
                        <div class="about-intro__requisite">
                            <dt>ОГРН:</dt>
                            <dd class="about-intro__code"><?= $fields['about_ogrn'] ?></dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </section>

    <section class="about-services">
        <div class="container">
            <h2 class="about-services__title" id="about-services-title"><?= $fields['about_servicestitle'] ?></h2>
            <ol data-typing-sequence class="about-services__list list-reset">
                <?php
                if (have_rows('about_servicescards', $page_id)):
                    while (have_rows('about_servicescards', $page_id)):
                        the_row();
                        $title = get_sub_field('title');
                        $title_mobile = get_sub_field('titlemobile');
                        $desc = get_sub_field('desc');
                        $desc_mobile = get_sub_field('descmobile');
                ?>
                        <li class="about-services__card">
                            <h3 class="about-services__card-title about-copy__desktop"><?= $title ?></h3>
                            <h3 class="about-services__card-title about-copy__mobile"><?= $title_mobile ?></h3>
                            <p data-typing="static" class="about-services__card-copy about-copy__desktop"><?= $desc ?></p>
                            <p data-typing="static" class="about-services__card-copy about-copy__mobile"><?= $desc_mobile ?></p>
                        </li>
                <?php
                    endwhile;
                endif;
                ?>
            </ol>
        </div>
    </section>

    <section class="about-technology">
        <div class="container">
            <div class="about-technology__wrapp">
                <div class="about-technology__card">
                    <div class="about-technology__header">
                        <p class="about-technology__label about-technology__label-red"><?= $fields['about_technologybadge'] ?></p>
                        <h2 class="about-technology__title"><?= $fields['about_technologytitle'] ?></h2>
                    </div>
                    <p class="about-technology__copy about-copy__desktop"><?= $fields['about_technologydesc'] ?></p>
                    <p class="about-technology__copy about-copy__mobile"><?= $fields['about_technologydescmobile'] ?></p>
                    <ul class="about-technology__tags">
                        <?php
                        if (have_rows('about_technologytags', $page_id)):
                            while (have_rows('about_technologytags', $page_id)):
                                the_row();
                                $text = get_sub_field('text');
                        ?>
                                <li><?= $text ?></li>
                        <?php
                            endwhile;
                        endif;
                        ?>
                    </ul>
                </div>
                <div class="about-technology__card">
                    <div class="about-technology__header">
                        <p class="about-technology__label"><?= $fields['about_teambadge'] ?></p>
                        <h2 class="about-technology__title about-copy__desktop"><?= $fields['about_teamtitle'] ?></h2>
                        <h2 class="about-technology__title about-copy__mobile"><?= $fields['about_teamtitlemobile'] ?></h2>
                    </div>
                    <div class="about-technology__team">
                        <p class="about-technology__copy about-copy__desktop"><?= $fields['about_teamdesc'] ?></p>
                        <p class="about-technology__copy about-copy__mobile"><?= $fields['about_teamdescmobile'] ?></p>
                        <ul class="about-technology__tags about-technology__tags-cities">
                            <?php
                            if (have_rows('about_teamcities', $page_id)):
                                while (have_rows('about_teamcities', $page_id)):
                                    the_row();
                                    $text = get_sub_field('text');
                            ?>
                                    <li>
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                            <path d="M19 10c0 5-7 11-7 11S5 15 5 10a7 7 0 1 1 14 0Z" stroke="currentColor" stroke-width="2" />
                                            <circle cx="12" cy="10" r="2.5" stroke="currentColor" stroke-width="2" />
                                        </svg><?= $text ?>
                                    </li>
                            <?php
                                endwhile;
                            endif;
                            ?>
                        </ul>
                        <div class="about-technology__team-copy">
                            <p class="about-technology__copy about-copy__desktop"><?= $fields['about_teamtext'] ?></p>
                            <p class="about-technology__copy about-copy__mobile"><?= $fields['about_teamtextmobile'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-documents">
        <div class="container">
            <div class="about-documents__wrapp">
                <div class="about-documents__document about-documents__document-accreditation" data-interactive-map>
                    <button class="btn-reset contacts__overlay" type="button" title="Включить взаимодействие с документом">
                        <span>Нажмите для взаимодействия с документом</span>
                    </button>
                    <iframe class="about-documents__frame"
                        src="<?= esc_url(get_template_directory_uri() . '/assets/pdf-viewer/web/viewer.html?file=../../documents/accreditation.pdf#locale=ru'); ?>"
                        title="Выписка из реестра аккредитованных IT-организаций — Велий Групп"
                        loading="lazy" tabindex="-1"></iframe>
                </div>
                <a class="about-documents__document about-documents__document-certificate" href="<?= esc_url($fields['about_certificateimg']['url']) ?>" data-lightbox data-caption="<?= esc_attr($fields['about_certificateimg']['alt']) ?>">
                    <img src="<?= esc_url($fields['about_certificateimg']['url']) ?>" alt="<?= esc_attr($fields['about_certificateimg']['alt']) ?>" width="1130" height="800" loading="lazy" decoding="async">
                </a>
            </div>
        </div>
    </section>

    <?php
    get_template_part('sections/request-section');

    get_template_part('sections/contacts');
    ?>
</main>
<?php get_footer(); ?>
