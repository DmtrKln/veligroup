<?php

/*
Template Name: Additional-services
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
            <li class="current-page" aria-current="page"><?= get_the_title(get_queried_object_id()) ?></li>
        </ul>
    </div>
    <section class="additional-services">
        <div class="container">
            <p class="additional-services__badge"><?= $fields['services_badge'] ?></p>
            <h1 class="additional-services__title" id="additional-services-title"><?= $fields['services_title'] ?></h1>
            <p class="additional-services__subtitle"><?= $fields['services_desc'] ?></p>
            <div data-typing-sequence="parallel" class="additional-services__cards">
                <?php
                if (have_rows('services-card', $page_id)):
                    while (have_rows('services-card', $page_id)):
                        the_row();
                        $title = get_sub_field('title');
                        $price = get_sub_field('price');
                        $desc = get_sub_field('desc');
                        $modaldesc = get_sub_field('modaldesc');
                        $timing = get_sub_field('timing');

                        ?>
                        <button class="additional-services__card" type="button" data-service-open aria-haspopup="dialog"
                            aria-controls="service-dialog">
                            <div class="additional-services__card-top">
                                <h2 class="additional-services__card-title"><?= $title ?></h2>
                                <p class="additional-services__price additional-services__price--hour"><?= $price ?></p>
                            </div>
                            <p data-typing="static" class="additional-services__description"><?= $desc ?></p>
                            <p class="additional-services__more">Подробнее об услуге <svg width="16" height="16"
                                    viewBox="0 0 16 16" fill="none" aria-hidden="true">
                                    <path d="M3 8h10M8 3l5 5-5 5" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg></p>
                            <template data-service-content>
                                <h2 class="service-modal__title"><?= $title ?></h2>
                                <p class="service-modal__description"><?= $modaldesc ?></p>
                                <ul class="service-modal__list list-reset">
                                    <?php
                                    if (have_rows('includes')):
                                        while (have_rows('includes')):
                                            the_row();
                                            ?>
                                            <li><?= get_sub_field('text') ?></li>
                                            <?php
                                        endwhile;
                                    endif;
                                    ?>
                                </ul>
                                <div class="service-modal__timing">
                                    <p class="service-modal__value"><?= $timing ?></p>
                                </div>
                                <div class="service-modal__cost">
                                    <p class="service-modal__value service-modal__value--price"><?= $price ?></p>
                                </div>
                            </template>
                        </button>
                        <?php
                    endwhile;
                endif;
                ?>
            </div>
        </div>
    </section>
    <?php
    get_template_part('sections/contacts', null, [
        'page_id' => $page_id,
    ]);
    ?>

    <div class="modal service-modal" data-modal="service" aria-hidden="true">
        <div class="modal__dialog service-modal__dialog" id="service-dialog" role="dialog" aria-modal="true"
            aria-labelledby="service-modal-title" aria-describedby="service-modal-description">
            <div class="service-modal__header">
                <h2 class="service-modal__title" id="service-modal-title" data-typing="off"></h2>
                <button class="service-modal__close btn-reset" type="button" data-modal-close>
                    <p class="visually-hidden">Закрыть</p><svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        aria-hidden="true">
                        <path d="m2 2 20 20M2 22 22 2" stroke="currentColor" stroke-width="2.5"
                            stroke-linecap="round" />
                    </svg>
                </button>
            </div>
            <p class="service-modal__description" id="service-modal-description"></p>
            <div class="service-modal__details">
                <p class="service-modal__list-title">Что входит в стоимость:</p>
                <ul class="service-modal__list list-reset"></ul>
            </div>
            <div class="service-modal__meta">
                <div class="service-modal__timing">
                    <p class="service-modal__label">Ориентир по срокам</p>
                    <p class="service-modal__value"></p>
                </div>
                <div class="service-modal__cost">
                    <p class="service-modal__label">Итоговая стоимость</p>
                    <p class="service-modal__value service-modal__value--price"></p>
                </div>
            </div>
            <div class="service-modal__actions"><button
                    class="service-modal__button service-modal__button--order btn-reset" type="button"
                    data-service-request="order">Заказать услугу</button> <button
                    class="service-modal__button service-modal__button--consult btn-reset" type="button"
                    data-service-request="consult">Консультация</button></div>
        </div>
    </div>
</main>
<?php
get_footer();
?>
