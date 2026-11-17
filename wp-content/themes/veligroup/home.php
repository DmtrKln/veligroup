<?php

/*
Template Name: Home
*/
get_header();
$page_id = 7;

$fields = array_merge(
  get_fields($page_id) ?: [],
  get_fields('option') ?: []
);

?>
<main id="main" class="main">
  <section class="bunnert">
    <div class="bunnert__glow" aria-hidden="true">
      <img class="bunnert__mobile-glow" src="<?= get_template_directory_uri(); ?>/assets/img/main/hero-mobile-glow.svg"
        alt="" />
      <img class="bunnert__drop bunnert__drop--red"
        src="<?= get_template_directory_uri(); ?>/assets/img/main/hero-back-red.svg" alt="" />
      <img class="bunnert__drop bunnert__drop--warm"
        src="<?= get_template_directory_uri(); ?>/assets/img/main/hero-back-warm.svg" alt="" />
    </div>
    <div class="container width">
      <div class="bunnert__stats">
        <?php
        if (have_rows('bunnert_start', $page_id)):
          while (have_rows('bunnert_start', $page_id)):
            the_row();

            $count = get_sub_field('count');
            $label = get_sub_field('label');
            ?>
            <div class="bunnert__stat">
              <p class="bunnert__stat-count"><?= $count ?></p>
              <p class="bunnert__stat-label"><?= $label ?></p>
            </div>
            <?php
          endwhile;
        endif;
        ?>
      </div>
      <div class="bunnert__wrapp">
        <div class="bunnert__left">
          <div class="bunnert__badge">
            <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
              <circle cx="4" cy="4" r="4" fill="#F4D85D" />
            </svg>
            <p><?= $fields['bunnert_badge'] ?></p>
          </div>
          <div class="bunnert__title">
            <h1 data-typing="static">
              <?= $fields['bunnert_title'] ?>
              <em class="bunnert__accent"><?= $fields['bunnert_title_accent'] ?></em>
              <?php
              $phrases = [];
              if (have_rows('bunnert_typing', $page_id)):
                while (have_rows('bunnert_typing', $page_id)):
                  the_row();
                  $phrase = trim((string) get_sub_field('text'));
                  if ($phrase !== '') {
                    $phrases[] = $phrase;
                  }

                endwhile;
              endif;
              ?>
              <em class="bunnert__typing" data-typing="rotate"
                data-typing-strings='<?= esc_attr(wp_json_encode($phrases)) ?>' data-type-speed="100"
                data-back-speed="30" data-back-delay="2200" data-typing-loop="true"><?= $phrases[0] ?></em>
            </h1>
            <p>
              <?= $fields['bunnert_desc'] ?>
            </p>
          </div>
          <svg class="bunnert__svg" width="67" height="66" viewBox="0 0 67 66" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path
              d="M44.1297 16.2946L44.1972 16.7988L44.6999 16.7228L59.8058 14.4395L51.6311 27.3475L51.3589 27.7772L51.793 28.0416L64.8318 36.0039L50.2725 40.636L49.7889 40.7903L49.9509 41.2721L54.8212 55.7527L40.6912 49.9433L40.2204 49.7494L40.0349 50.2227L34.4576 64.4455L27.3687 50.9134L27.1328 50.4632L26.6865 50.7064L13.271 58.0164L16.5392 43.0929L16.648 42.5963L16.1498 42.4961L1.17334 39.4731L13.2705 30.1414L13.673 29.8308L13.3557 29.4335L3.82586 17.4915L19.0916 18.1183L19.5986 18.1395L19.612 17.6312L19.9874 2.35652L31.2788 12.6501L31.6545 12.9927L31.9908 12.611L42.0954 1.15202L44.1297 16.2946Z"
              stroke="white" />
          </svg>
        </div>
        <div class="bunnert__btns">
          <button class="btn-reset" type="button" data-modal-open>
            Обсудить проект
          </button>
          <a href="<?= home_url('/portfolio/'); ?>">Портфолио</a>
        </div>
      </div>
    </div>
    <div class="bunnert__deck">
      <div class="container width">
        <div class="bunnert__slider swiper">
          <div class="swiper-wrapper">
            <?php
            if (have_rows('bunnert_slide', $page_id)):
              while (have_rows('bunnert_slide', $page_id)):
                the_row();
                ?>
                <div class="bunnert__slide swiper-slide">

                  <div class="bunnert__project" role="button" tabindex="0" data-hero-project-open aria-haspopup="dialog"
                    aria-controls="hero-project-dialog" aria-label="Подробнее о проекте: сайт для студии дизайна">
                    <div class="hero-project-modal__header">
                      <p class="hero-project-modal__label"><em>0.1</em> ПРОЕКТ</p>
                    </div>
                    <?php get_template_part('sections/hero-project'); ?>
                  </div>
                </div>
                <?php
              endwhile;
            endif;
            ?>
          </div>
        </div>
        <div class="bunnert__deck-controls">
          <button class="bunnert__deck-control bunnert__deck-control--prev btn-reset" type="button"
            aria-label="Предыдущая карточка">← BACK</button>
          <button class="bunnert__deck-control bunnert__deck-control--next btn-reset" type="button"
            aria-label="Следующая карточка">NEXT →</button>
        </div>
      </div>
    </div>
  </section>
  <div class="modal hero-project-modal" id="hero-project-dialog" data-modal="hero-project"
    aria-labelledby="hero-project-title" role="dialog" aria-modal="true" aria-hidden="true">
    <div class="hero-project-modal__dialog">
      <div class="hero-project-modal__header">
        <p class="hero-project-modal__label"><em>0.1</em> ПРОЕКТ</p>
        <button class="hero-project-modal__close btn-reset" type="button" aria-label="Закрыть проект" data-modal-close>
          <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M18.9343 10.9342L10.9337 18.9348M10.9337 10.9342L18.9343 18.9348M28.2684 14.9345C28.2684 22.2989 22.2984 28.2689 14.934 28.2689C7.56962 28.2689 1.59961 22.2989 1.59961 14.9345C1.59961 7.57011 7.56962 1.6001 14.934 1.6001C22.2984 1.6001 28.2684 7.57011 28.2684 14.9345Z"
              stroke="white" stroke-width="3.2" stroke-linecap="round" />
          </svg>
        </button>
      </div>
      <div class="hero-project-modal__content"></div>
      <div class="hero-project-modal__footer">
        <div class="hero-project-modal__pagination"></div>
        <div class="hero-project-modal__actions">
          <button class="hero-project-modal__back btn-reset" type="button">
            ← Back
          </button>
          <button class="hero-project-modal__next btn-reset" type="button">
            Next →
          </button>
        </div>
      </div>
    </div>
  </div>
  <section class="hd-benefits" id="benefits">
    <div class="container">
      <img class="hd-benefits__shape" src="<?= $fields['benefits_img']['url'] ?>"
        alt="<?= esc_attr($fields['benefits_img']['alt'] ?? '') ?>" aria-hidden="true" />
      <div class="hd-heading">
        <p class="hd-eyebrow"><?= $fields['benefits_badge'] ?></p>
        <h2 id="hd-benefits-title"><?= $fields['benefits_title'] ?></h2>
      </div>
      <div data-typing-sequence="parallel" class="hd-benefits__cards">
        <?php
        if (have_rows('benefits_card', $page_id)):
          $cards = get_field('benefits_card', $page_id);
          $cards_count = count($cards);
          $count = 0;

          while (have_rows('benefits_card', $page_id)):
            the_row();
            $count++;

            $title = get_sub_field('title');
            $desc = get_sub_field('desc');

            $is_bottom = ($cards_count - 1) % 3 === 0 && $count === $cards_count;
            ?>
            <div class="hd-benefits__card<?= $is_bottom ? ' bottom' : '' ?>">
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
  <section class="hd-stages" id="work-stages">
    <div class="container">
      <picture class="hd-stages__background" aria-hidden="true">
        <source media="(max-width: 768px)" srcset="<?= $fields['stages_img_mobile']['url'] ?>">
        <img src="<?= $fields['stages_img_desctop']['url'] ?>" alt="<?= $fields['stages_img_desctop']['alt'] ?>"
          loading="lazy" decoding="async" />
      </picture>
      <h2 id="hd-stages-title"><?= $fields['stages_title'] ?></h2>
      <div class="hd-stages__track" aria-hidden="true">
        <svg class="hd-stages__line" width="1448" height="12" viewBox="0 0 1448 12" fill="none"
          xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
          <defs>
            <linearGradient id="stages-line-gradient" x1="0%" y1="0%" x2="100%" y2="0%">
              <stop offset="0%" stop-color="#fff3c4" />
              <stop offset="30%" stop-color="#f7d76b" />
              <stop offset="60%" stop-color="#f5b740" />
              <stop offset="100%" stop-color="#ffe8a7" />
            </linearGradient>
            <filter id="stages-line-glow" x="-180" y="-180" width="1808" height="372" filterUnits="userSpaceOnUse">
              <feGaussianBlur in="SourceGraphic" stdDeviation="28" result="outer-blur" />
              <feComponentTransfer in="outer-blur" result="outer-glow">
                <feFuncA type="linear" slope="1" />
              </feComponentTransfer>
              <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="middle-blur" />
              <feComponentTransfer in="middle-blur" result="middle-glow">
                <feFuncA type="linear" slope="1" />
              </feComponentTransfer>
              <feGaussianBlur in="SourceGraphic" stdDeviation="3" result="inner-glow" />
              <feMerge>
                <feMergeNode in="outer-glow" />
                <feMergeNode in="middle-glow" />
                <feMergeNode in="inner-glow" />
                <feMergeNode in="SourceGraphic" />
              </feMerge>
            </filter>
          </defs>
          <g>
            <path
              d="M2.6001 6.09317C2.6001 5.81691 2.82375 5.5928 3.10001 5.59222L1441.35 2.60002C1443.14 2.59629 1444.6 4.04968 1444.6 5.84383C1444.6 7.63753 1443.14 9.09074 1441.35 9.08763L3.10024 6.59413C2.82391 6.59365 2.6001 6.36951 2.6001 6.09317Z"
              fill="url(#stages-line-gradient)" />
          </g>
        </svg>
      </div>
      <div class="hd-stages__columns" data-typing-sequence data-stages-sequence>

        <?php
        if (have_rows('stages_card', $page_id)):
          while (have_rows('stages_card', $page_id)):
            the_row();
            $title = get_sub_field('title');
            ?>
            <div class="hd-stages__column">
              <h3><?= $title ?></h3>
              <?php
              if (have_rows('term', $page_id)):
                while (have_rows('term', $page_id)):
                  the_row();
                  $title_term = get_sub_field('title_term');
                  $desc_term = get_sub_field('desc_term');
                  ?>
                  <p data-typing="static">
                    <em class="hd-stages__term"><?= $title_term; ?></em> <?= $desc_term; ?>
                  </p>
                  <?php
                endwhile;
              endif;
              ?>
            </div>
            <?php
          endwhile;
        endif;
        ?>

      </div>
    </div>
  </section>

  <?php
  get_template_part('sections/tariff-section', null, [
    'page_id' => $page_id,
  ]);
  ?>

  <section class="hd-solutions" id="services">
    <div class="container">
      <div class="hd-heading hd-heading--center">
        <p class="hd-eyebrow"><?= $fields['solutions_badge'] ?></p>
        <h2 id="hd-solutions-title"><?= $fields['solutions_title'] ?></h2>
      </div>
      <div class="hd-solutions__cards">
        <?php
        $services = new WP_Query([
          'post_type' => 'services',
          'post_status' => 'publish',
          'posts_per_page' => -1,
          'orderby' => ['menu_order' => 'ASC', 'date' => 'ASC'],
        ]);

        if ($services->have_posts()):
          while ($services->have_posts()):
            $services->the_post();
            $price = get_field('service_price', get_the_ID());
            ?>
            <a href="<?php the_permalink(); ?>" class="hd-solutions__card">
              <?php
              the_post_thumbnail('full', [
                'class' => 'hd-solutions__image',
                'loading' => 'lazy',
                'decoding' => 'async',
              ]);
              ?>
              <p class="hd-solutions__price"><?= $price ?></p>
              <div class="hd-solutions__bottom">
                <h3><?php the_title(); ?></h3>
                <p class="hd-solutions__button">
                  Подробнее <i aria-hidden="true">→</i>
                </p>
              </div>
            </a>
            <?php
          endwhile;
        endif;
        wp_reset_postdata();
        ?>
      </div>
    </div>
  </section>

  <section class="hd-services">
    <div class="container">
      <div class="hd-heading">
        <p class="hd-eyebrow"><?= $fields['services_badge'] ?></p>
        <h2 id="hd-services-title"><?= $fields['services_title'] ?></h2>
      </div>
      <div class="hd-services__intro">
        <h3><?= $fields['services_intro_title'] ?></h3>
        <p><?= $fields['services_intro_desc'] ?></p>
      </div>
      <ul class="hd-services__list">
        <?php
        if (have_rows('services_list', $page_id)):
          while (have_rows('services_list', $page_id)):
            the_row();

            $title = get_sub_field('title');
            $price = get_sub_field('price');
            ?>
            <li>
              <a href="<?= esc_url(home_url('/additional-services/')); ?>">
                <?= $title ?> — <?= $price ?>
              </a>
            </li>
            <?php
          endwhile;
        endif;
        ?>
      </ul>
      <a class="hd-services__all" href="<?= home_url('/additional-services/'); ?>">
        <span>Перейти ко всем услугам</span>
        <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M1 11L6 6L1 1" stroke="white" stroke-width="2" stroke-linecap="round" />
        </svg>
      </a>
    </div>
  </section>
  <?php
  get_template_part('sections/request-section', null, [
    'page_id' => $page_id,
  ]);
  ?>
</main>
<?php get_footer(); ?>