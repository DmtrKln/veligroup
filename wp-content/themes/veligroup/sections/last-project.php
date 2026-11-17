<?php
$fields = get_fields('option') ?: [];
?>

<section class="hd-projects">
    <div class="container">
        <div class="hd-projects__heading">
            <h2 id="hd-projects-title"><?= $fields['projects_title'] ?></h2>
            <p><?= $fields['projects_desc'] ?></p>
        </div>
        <div class="hd-projects__panel">
            <div class="hd-projects__top">
                <p class="hd-projects__counter" role="img" aria-label="Проектов нет"></p>
                <div class="hd-projects__controls">
                    <button
                        type="button"
                        class="hd-projects__arrow hd-projects__arrow-prev btn-reset"
                        title="Предыдущий проект">
                        <svg
                            width="20"
                            height="20"
                            viewBox="0 0 20 20"
                            aria-hidden="true">
                            <path
                                d="m12.5 5-5 5 5 5"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2" />
                        </svg>
                    </button>
                    <button
                        type="button"
                        class="hd-projects__arrow hd-projects__arrow-next btn-reset"
                        title="Следующий проект">
                        <svg
                            width="20"
                            height="20"
                            viewBox="0 0 20 20"
                            aria-hidden="true">
                            <path
                                d="m7.5 5 5 5-5 5"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="hd-projects__slider swiper">
                <div class="swiper-wrapper">
                    <?php
                    if (have_rows('projects_cards', 'option')):
                        while (have_rows('projects_cards', 'option')):
                            the_row();

                            $title = get_sub_field('title');
                            $desc = get_sub_field('desc');
                            $img = get_sub_field('img');
                            $badge = get_sub_field('badge');
                    ?>
                            <div class="hd-projects__slide swiper-slide">
                                <img
                                    src="<?= esc_url($img['url']) ?>"
                                    alt="<?= esc_attr($img['alt']) ?>" />

                                <p class="hd-projects__badge"><?= $badge ?></p>

                                <div class="hd-projects__info">
                                    <h3><?= $title ?></h3>
                                    <p><?= $desc ?></p>
                                </div>
                            </div>
                    <?php
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
            <div class="hd-projects__thumbs"></div>
        </div>
    </div>
</section>