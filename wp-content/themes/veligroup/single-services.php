<?php
get_header();

if (have_posts()):
    while (have_posts()):
        the_post();
        $page_id = get_the_ID();
        $breadcrumb_title = mb_strtolower(get_the_title());
        $fields = array_merge(
            get_fields($page_id) ?: [],
            get_fields('option') ?: []
        );
?>
        <main id="main" class="main main--inner landing-page">
            <section class="landing-hero">
                <div class="container width">
                    <ul class="landing-hero__breadcrumbs list-reset">
                        <li><a href="<?= home_url(); ?>">Главная</a></li>
                        <li aria-current="page"><?= mb_strtoupper(mb_substr($breadcrumb_title, 0, 1)) . mb_substr($breadcrumb_title, 1); ?></li>
                    </ul>
                    <div class="landing-hero__panel">
                        <div class="landing-hero__slider swiper" data-landing-slider data-autoplay-delay="4500">
                            <div class="swiper-wrapper">
                                <?php
                                if (have_rows('service_heroslides', $page_id)):
                                    while (have_rows('service_heroslides', $page_id)):
                                        the_row();
                                        $img = get_sub_field('img');
                                ?>
                                        <div class="swiper-slide">
                                            <img src="<?= esc_url($img['url']) ?>"
                                                alt="<?= esc_attr($img['alt']) ?>"
                                                <?php if (get_row_index() === 1): ?>
                                                fetchpriority="high"
                                                <?php else: ?>
                                                loading="lazy"
                                                <?php endif; ?>>
                                        </div>
                                <?php
                                    endwhile;
                                endif;
                                ?>
                            </div>
                        </div>
                        <p class="landing-hero__price"><?= $fields['service_price'] ?></p>
                        <div class="landing-hero__content">
                            <p class="landing-hero__category"><?= $fields['service_herocategory'] ?></p>
                            <h1 class="landing-hero__title"><?=  $fields['services-pagetitle'] ?></h1>
                            <p class="landing-hero__description"><?= $fields['service_herodesc'] ?></p>
                            <div class="landing-hero__actions"><button
                                    class="landing-button landing-button-light btn-reset" type="button"
                                    data-modal-open>Обсудить <?= mb_strtolower(get_the_title()) ?> <svg width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" aria-hidden="true">
                                        <path d="M6 18 18 6M6 6h12v12" stroke="currentColor" stroke-width="1.8"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg></button> <a class="landing-button landing-button-outline"
                                    href="<?= esc_url(home_url('/#services')); ?>">Услуги <svg width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" aria-hidden="true">
                                        <path d="M6 18 18 6M6 6h12v12" stroke="currentColor" stroke-width="1.8"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg></a></div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="landing-intro">
                <div class="container">
                    <div class="landing-heading">
                        <p class="landing-heading__label"><?= $fields['service_introbadge'] ?></p>
                        <h2 class="landing-heading__title"><?= $fields['service_introtitle'] ?></h2>
                    </div>
                    <div class="landing-intro__row">
                        <p class="landing-intro__lead"><?= $fields['service_introlead'] ?></p>
                        <div class="landing-intro__aside">
                            <p><?= $fields['service_introdesc'] ?></p>
                            <ul class="landing-intro__principles">
                                <?php
                                if (have_rows('service_introprinciples', $page_id)):
                                    while (have_rows('service_introprinciples', $page_id)):
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
                    </div>
                </div>
            </section>
            <section class="landing-scenarios">
                <div class="container">
                    <div class="landing-heading">
                        <p class="landing-heading__label"><?= $fields['service_scenariosbadge'] ?></p>
                        <h2 class="landing-heading__title"><?= $fields['service_scenariostitle'] ?></h2>
                    </div>
                    <div data-typing-sequence class="landing-scenarios__cards">
                        <?php
                        if (have_rows('service_scenarioscards', $page_id)):
                            while (have_rows('service_scenarioscards', $page_id)):
                                the_row();
                                $title = get_sub_field('title');
                                $desc = get_sub_field('desc');
                        ?>
                                <div class="landing-scenarios__card">
                                    <h3><?= $title ?></h3>
                                    <p data-typing="static"><?= $desc ?></p>
                                </div>
                        <?php
                            endwhile;
                        endif;
                        ?>
                    </div>
                </div>
            </section>
            <section class="landing-showcase">
                <div class="container">
                    <div class="landing-heading">
                        <p class="landing-heading__label"><?= $fields['service_showcasebadge'] ?></p>
                        <h2 class="landing-heading__title"><?= $fields['service_showcasetitle'] ?></h2>
                    </div>
                    <div class="landing-showcase__intro">
                        <p><?= $fields['service_showcasedesc'] ?></p><a href="<?= home_url('/portfolio/'); ?>">ПРИМЕРЫ РАБОТ ↙</a>
                    </div>
                    <div class="landing-showcase__projects">
                        <?php
                        if (have_rows('service_showcaseprojects', $page_id)):
                            while (have_rows('service_showcaseprojects', $page_id)):
                                the_row();
                                $category = get_sub_field('category');
                                $title = get_sub_field('title');
                                $type = get_sub_field('type');
                                $img = get_sub_field('img');
                                $caption = get_sub_field('caption');
                        ?>
                                <div class="landing-showcase__project">
                                    <div class="landing-showcase__card">
                                        <div class="landing-showcase__row">
                                            <div class="landing-showcase__copy">
                                                <p class="landing-showcase__category"><?= $category ?></p>
                                                <h3><?= $title ?></h3>
                                                <p class="landing-showcase__type"><?= $type ?></p>
                                                <ul class="landing-showcase__features">
                                                    <?php
                                                    if (have_rows('features')):
                                                        while (have_rows('features')):
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
                                            <img class="landing-showcase__image" src="<?= esc_url($img['url']) ?>"
                                                alt="<?= esc_attr($img['alt']) ?>" width="600" height="680" loading="lazy">
                                        </div>
                                    </div>
                                    <p class="landing-showcase__caption"><?= $caption ?></p>
                                </div>
                        <?php
                            endwhile;
                        endif;
                        ?>
                    </div>
                </div>
            </section>
            <section class="landing-development" id="landing-development">
                <div class="container">
                    <div class="landing-heading">
                        <p class="landing-heading__label"><?= $fields['service_developmentbadge'] ?></p>
                        <h2 class="landing-heading__title"><?= $fields['service_developmenttitle'] ?></h2>
                    </div>
                    <div data-typing-sequence class="landing-development__cards">
                        <?php
                        if (have_rows('service_developmentcards', $page_id)):
                            while (have_rows('service_developmentcards', $page_id)):
                                the_row();
                                $img = get_sub_field('img');
                                $title = get_sub_field('title');
                                $desc = get_sub_field('desc');
                        ?>
                                <div class="landing-development__card">
                                    <img src="<?= esc_url($img['url']) ?>" alt="<?= esc_attr($img['alt']) ?>"
                                        width="34" height="34" loading="lazy">
                                    <h3><?= $title ?></h3>
                                    <p data-typing="static"><?= $desc ?></p>
                                </div>
                        <?php
                            endwhile;
                        endif;
                        ?>
                    </div>
                    <p class="landing-development__note"><?= $fields['service_developmentnote'] ?></p>
                </div>
            </section>
            <section class="landing-process">
                <div class="container">
                    <div class="landing-heading">
                        <p class="landing-heading__label"><?= $fields['service_processbadge'] ?></p>
                        <h2 class="landing-heading__title"><?= $fields['service_processtitle'] ?></h2>
                    </div>
                    <div class="landing-process__steps">
                        <?php
                        if (have_rows('service_processsteps', $page_id)):
                            while (have_rows('service_processsteps', $page_id)):
                                the_row();
                                $title = get_sub_field('title');
                                $desc = get_sub_field('desc');
                                $result = get_sub_field('result');
                        ?>
                                <div class="landing-process__step">
                                    <div class="landing-process__content">
                                        <h3><?= $title ?></h3>
                                        <p class="landing-process__description"><?= $desc ?></p>
                                        <p class="landing-process__result"><?= $result ?></p>
                                    </div>
                                </div>
                        <?php
                            endwhile;
                        endif;
                        ?>
                    </div>
                    <p class="landing-process__note"><?= $fields['service_processnote'] ?></p>
                </div>
            </section>
            <section class="landing-delivery">
                <div class="container">
                    <div class="landing-delivery__row">
                        <div class="landing-delivery__copy">
                            <p class="landing-delivery__label"><?= $fields['service_deliverybadge'] ?></p>
                            <h2><?= $fields['service_deliverytitle'] ?></h2>
                            <p class="landing-delivery__description"><?= $fields['service_deliverydesc'] ?></p>
                        </div>
                        <ul class="landing-delivery__list">
                            <?php
                            if (have_rows('service_deliverylist', $page_id)):
                                while (have_rows('service_deliverylist', $page_id)):
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
                </div>
            </section>
            <section class="landing-pricing">
                <div class="container">
                    <div class="landing-heading">
                        <p class="landing-heading__label"><?= $fields['service_pricingbadge'] ?></p>
                        <h2 class="landing-heading__title"><?= $fields['service_pricingtitle'] ?></h2>
                    </div>
                    <div class="landing-pricing__card">
                        <div class="landing-pricing__summary">
                            <p class="landing-pricing__label"><?= $fields['service_pricinglabel'] ?></p>
                            <p class="landing-pricing__price"><?= $fields['service_price'] ?></p>
                            <p class="landing-pricing__description"><?= $fields['service_pricingdesc'] ?></p>
                        </div>
                        <div class="landing-pricing__details">
                            <h3><?= $fields['service_pricingdetailstitle'] ?></h3>
                            <p><?= $fields['service_pricingdetailsdesc'] ?></p>
                            <p class="landing-pricing__note"><?= $fields['service_pricingnote'] ?></p><button
                                class="landing-button landing-button-dark btn-reset" type="button"
                                data-modal-open>Получить оценку проекта <svg width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" aria-hidden="true">
                                    <path d="M6 18 18 6M6 6h12v12" stroke="currentColor" stroke-width="1.8"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg></button>
                        </div>
                    </div>
                </div>
            </section>
            <?php get_template_part('sections/request-section'); ?>
        </main>
<?php
    endwhile;
endif;

get_footer();
?>
