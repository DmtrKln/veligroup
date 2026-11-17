<?php
$fields = get_fields('option') ?: [];
?>

<section class="hd-tariffs" id="pricing">
    <div class="container width">
        <div class="hd-heading hd-heading--center">
            <p class="hd-eyebrow">
                <?= $fields['tariff_badge'] ?>
            </p>
            <h2 id="hd-tariffs-title">
                <?= $fields['tariff_title'] ?>
            </h2>
        </div>

        <div class="hd-tariffs__cards">
            <?php if (have_rows('tariff_cards', 'option')): ?>
                <?php while (have_rows('tariff_cards', 'option')):
                    the_row();
                    $title = get_sub_field('title');
                    $price = get_sub_field('price');
                    $price_suffix = get_sub_field('price_suffix');
                    $desc = get_sub_field('desc');
                    $page = get_sub_field('tariff_page');
                    ?>
                    <a href="<?= get_permalink($page) ?>" class="hd-tariffs__card">
                        <div>
                            <h3><?= $title ?></h3>

                            <div class="hd-tariffs__price">
                                <?= $price ?>
                                <small><?= $price_suffix ?></small>
                            </div>

                            <p class="hd-tariffs__description">
                                <?= esc_html($desc) ?>
                            </p>

                            <ul>
                                <?php if (have_rows('features')): ?>
                                    <?php while (have_rows('features')):
                                        the_row(); ?>
                                        <li>
                                            <?= get_sub_field('text') ?>
                                        </li>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </ul>
                        </div>

                        <div class="hd-tariffs__button">
                            Выбрать тариф
                        </div>
                    </a>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>