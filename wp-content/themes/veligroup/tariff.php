<?php

/*
Template Name: Tariff
*/

$page_id = get_queried_object_id();
$fields = get_fields($page_id) ?: [];
$tariff_options = get_field('tariff_cards', 'option') ?: [];
$service_options = get_posts([
  'post_type' => 'services',
  'post_status' => 'publish',
  'posts_per_page' => -1,
  'orderby' => ['menu_order' => 'ASC', 'date' => 'ASC'],
]);

$selected_tariff = null;
foreach ($tariff_options as $index => $tariff) {
  if ((int) ($tariff['tariff_page'] ?? 0) === $page_id) {
    $selected_tariff = $index;
    break;
  }
}
if ($selected_tariff === null && $tariff_options) {
  $selected_tariff = array_key_first($tariff_options);
}
$selected_service = $selected_tariff === null ? ($service_options[0]->ID ?? null) : null;
$selected_label = $selected_tariff !== null
  ? ($tariff_options[$selected_tariff]['title'] ?? '')
  : ($selected_service ? get_the_title($selected_service) : '');

get_header();

?>
<main class="main start-page" id="main">
  <section class="start-hero">
    <video class="start-hero__video" autoplay muted loop playsinline preload="metadata"
      poster="<?= esc_url(get_template_directory_uri() . '/assets/video/tariff-hero-poster.png'); ?>"
      aria-hidden="true" tabindex="-1">
      <source src="<?= esc_url(get_template_directory_uri() . '/assets/video/tariff-hero.mp4'); ?>" type="video/mp4">
    </video>
    <div class="container width">
      <nav class="start-hero__breadcrumbs">
        <a href="<?= esc_url(home_url('/')); ?>">Главная</a>
        <p aria-hidden="true">›</p>
        <p><?= get_the_title($page_id) ?></p>
      </nav>
    </div>
    <div class="container">
      <div class="start-hero__content">
        <p class="start-hero__badge"><?= $fields['tariff_badge']  ?></p>
        <h1 id="start-title">
          <em class="start-hero__desktop-copy">ТАРИФ</em><em class="start-hero__mobile-copy">ПЛАН</em>
          <em class="start-hero__accent"><?= $fields['tariff_name'] ?></em>
        </h1>
        <p class="start-hero__description">
          <?= $fields['tariff_description']  ?>
        </p>
        <div class="start-hero__price">
          <p><?= $fields['tariff_price'] ?></p>
          <p><?= $fields['tariff_price_caption']  ?></p>
        </div>
        <div class="start-hero__buttons">
          <button
            type="button"
            class="start-button btn-reset"
            data-start-modal="connect">
            Подключить план</button><button
            type="button"
            class="start-button start-button--outline btn-reset"
            data-start-modal="consult">
            Получить консультацию
          </button>
        </div>
      </div>
    </div>
  </section>
  <section class="start-inclusions">
    <div class="container">
      <p class="start-inclusions__eyebrow">
        <?= $fields['start-inclusions_overline'] ?>
      </p>
      <h2 id="start-inclusions-title">
        <?= $fields['start-inclusions_title'] ?>
      </h2>
      <div data-typing-sequence="parallel" class="start-inclusions__cards">
        <?php
        if (have_rows('start-inclusions_card', $page_id)):

          while (have_rows('start-inclusions_card', $page_id)):
            the_row();
            $count = 0;
            $title = get_sub_field('title');
            $desc = get_sub_field('desc');

            $active = $count === 1;

        ?>
            <div class="start-inclusions__card<?= $active ? 'active' : '' ?>">
              <h3><?= $title ?></h3>
              <p data-typing="static">
                <?= $desc ?>
              </p>
            </div>
        <?php
            $count++;
          endwhile;
        endif;
        ?>

      </div>
    </div>
  </section>
  <section class="start-audience">
    <div class="container">
      <h2 id="start-audience-title"><?= $fields['startAudienceTitle'] ?></h2>
      <p class="start-audience__pill start-audience__intro">
        <?= $fields['startAudienceIntro'] ?>
      </p>
      <div class="start-audience__cards">
        <?php

        if (have_rows('startAudienceCard', $page_id)):
          $count = 0;
          while (have_rows('startAudienceCard', $page_id)):
            the_row();
            $count++;
            $active = $count === 3;
            $title = get_sub_field('title');
            $desc = get_sub_field('desc');
            $badge = get_sub_field('badge');
            $img = get_sub_field('img');


        ?>
            <div class="start-audience__card<?= $active ? ' active' : '' ?>">
              <h3><?= $title ?></h3>
              <p class="start-audience__description">
                <?= $desc ?>
              </p>
              <p class="start-audience__pill"> <?= $badge ?></p>
              <div class="start-audience__visual" aria-hidden="true">
                <img src="<?= esc_url($img['url']) ?>"
                  alt="<?= esc_attr($img['alt'] ?? '') ?>">
              </div>
            </div>
        <?php
          endwhile;
        endif;
        ?>
        <div class="start-audience__spheres">
          <h3><?= $fields['start-audience-spheres'] ?></h3>
          <ul>
            <?php
            if (have_rows('sphere_li', $page_id)):
              while (have_rows('sphere_li', $page_id)):
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
  <section class="start-examples">
    <div class="container">
      <div class="start-examples__heading">
        <h2 id="start-examples-title">
          <?= $fields['startExamplesTitle'] ?? '' ?>
        </h2>
        <p>
          <?= $fields['startExamplesDesc'] ?? '' ?>
        </p>
      </div>
      <div class="start-examples__cards">
        <div class="start-examples__main">
          <?php
          if (have_rows('startExamplesCard', $page_id)):
            while (have_rows('startExamplesCard', $page_id)):
              the_row();

              if (get_row_index() !== 1) {
                continue;
              }

              $title = get_sub_field('title');
              $desc = get_sub_field('desc');
              $img = get_sub_field('img');
          ?>
              <div class="start-examples__card">
                <img
                  src="<?= $img['url'] ?>"
                  alt="<?= esc_attr($img['alt']) ?>"
                  loading="lazy" />
                <div class="start-examples__copy">
                  <h3><?= $title ?></h3>
                  <p><?= $desc ?></p>
                </div>
              </div>
          <?php
            endwhile;
          endif;
          ?>
        </div>
        <div class="start-examples__side">
          <?php
          if (have_rows('startExamplesCard', $page_id)):
            while (have_rows('startExamplesCard', $page_id)):
              the_row();
              $count = get_row_index();

              if ($count === 1) {
                continue;
              }

              $title = get_sub_field('title');
              $desc = get_sub_field('desc');
              $img = get_sub_field('img');
          ?>
              <div class="start-examples__card">
                <img
                  src="<?= $img['url'] ?>"
                  alt="<?= esc_attr($img['alt']) ?>"
                  loading="lazy" />
                <div class="start-examples__copy">
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
      <div class="start-examples__controls">
        <button
          type="button"
          class="start-arrow start-arrow--prev btn-reset"
          data-example-prev
          title="Предыдущий пример">
          <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M6.41406 11L1.41406 6L6.41406 1" stroke-width="2" stroke-linecap="round" stroke="white" />
</svg></button><button
          type="button"
          class="start-arrow start-arrow--next btn-reset"
          data-example-next
          title="Следующий пример">
          <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M7.5 15L12.5 10L7.5 5" stroke-width="2" stroke-linecap="round" stroke="#0D0D07" />
</svg>
        </button>
      </div>
    </div>
  </section>
  <section class="start-faq">
    <div class="container">
      <p class="start-faq__eyebrow"><?= $fields['faq_superheading'] ?></p>
      <h2 id="start-faq-title"><?= $fields['faq_title'] ?></h2>
      <div class="start-faq__items">

        <?php
        if (have_rows('faq_item', $page_id)):
          while (have_rows('faq_item', $page_id)):
            the_row();
            $question = get_sub_field('question');
            $answer = get_sub_field('answer');
            $answer_id = 'start-answer-' . get_row_index();
        ?>
            <div class="start-faq__item">
              <button
                class="start-faq__question btn-reset"
                type="button"
                aria-expanded="false"
                aria-controls="<?= esc_attr($answer_id) ?>">
                <?= $question ?>
              </button>

              <div class="start-faq__answer" id="<?= esc_attr($answer_id) ?>" hidden>
                <p>
                  <?= $answer ?>
                </p>
              </div>
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
  <?php
  get_template_part('sections/last-project', null, [
    'page_id' => $page_id,
  ]);
  ?>
  <?php
  get_template_part('sections/request-section', null, [
    'page_id' => $page_id,
  ]);
  ?>
</main>
<div
  class="modal start-modal start-modal--connect"
  data-modal="start-connect"
  aria-hidden="true">
  <div class="start-modal__dialog" role="dialog" aria-modal="true">
    <button
      class="start-modal__close btn-reset"
      type="button"
      data-modal-close
      title="Закрыть">
      <svg
        width="20"
        height="20"
        viewBox="0 0 20 20"
        fill="none"
        aria-hidden="true">
        <path
          d="m5 5 10 10M15 5 5 15"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round" />
      </svg>
    </button>
    <div class="start-modal__header">
      <p class="start-modal__badge">Подключение тарифа</p>
      <h2 id="start-connect-title">Заявка на подключение</h2>
      <p class="start-modal__subtitle">
        Заполните данные — мы подготовим персональный план запуска и
        свяжемся для подтверждения.
      </p>
    </div>
    <form
      data-request-form
      action="#"
      method="post"
      class="start-modal__form">
      <div class="start-modal__contacts">
        <h3>Контактные данные</h3>
        <div class="start-modal__row">
          <label class="start-modal__field">
            <p>Имя <em>*</em></p>
            <input
              type="text"
              name="name"
              placeholder="Ваше имя"
              required
              autocomplete="off" />
          </label><label class="start-modal__field">
            <p>Фамилия</p>
            <input
              type="text"
              name="surname"
              placeholder="Ваша фамилия"
              autocomplete="off" />
          </label>
        </div>
        <label class="start-modal__field">
          <p>Телефон <em>*</em></p>
          <input
            type="tel"
            name="phone"
            placeholder="+7 (___) ___-__-__"
            required
            class="mask"
            autocomplete="off" />
        </label><label class="start-modal__field">
          <p>Email <em>*</em></p>
          <input
            type="email"
            name="email"
            placeholder="mail@example.ru"
            required
            autocomplete="email" />
        </label><label class="start-modal__field">
          <p>Компания</p>
          <input
            type="text"
            name="company"
            placeholder="Название компании"
            autocomplete="off" />
        </label><label class="start-modal__field">
          <p>Комментарий</p>
          <textarea
            name="message"
            placeholder="Коротко расскажите о задаче, сроках и ожиданиях"></textarea>
        </label>
      </div>
      <div class="start-modal__parameters">
        <h3>Параметры заявки</h3>
        <div class="start-modal__service">
          <p class="start-modal__label">Услуга <em>*</em></p>
          <button
            class="start-modal__select btn-reset"
            type="button"
            aria-expanded="true"
            aria-controls="start-service-options">
            <p data-selected-service><?= $selected_label ?></p>
            <small>Текущий выбор</small><svg
              class="start-modal__chevron"
              width="18"
              height="18"
              viewBox="0 0 18 18"
              fill="none"
              aria-hidden="true">
              <path
                d="m4.5 11.25 4.5-4.5 4.5 4.5"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round" />
            </svg>
          </button>
          <div
            class="start-modal__options-panel"
            id="start-service-options">
            <div class="start-modal__options">
              <?php foreach ($tariff_options as $index => $tariff): ?>
                <label class="start-modal__option">
                  <input type="radio" name="service" value="<?= esc_attr($tariff['title'] ?? '') ?>"
                    <?php if ($index === $selected_tariff): ?>checked data-service-default<?php endif; ?> />
                  <p><?= $tariff['title'] ?? '' ?></p>
                  <small><?= $tariff['price'] ?? '' ?> <?= $tariff['price_suffix'] ?? '' ?></small>
                </label>
              <?php endforeach; ?>
              <?php foreach ($service_options as $service): ?>
                <label class="start-modal__option">
                  <input type="radio" name="service" value="<?= esc_attr(get_the_title($service)) ?>"
                    <?php if ($service->ID === $selected_service): ?>checked data-service-default<?php endif; ?> />
                  <p><?= get_the_title($service) ?></p>
                  <small><?= get_field('service_price', $service->ID) ?></small>
                </label>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
        <label class="start-modal__agreement"><input
            type="checkbox"
            name="agreement"
            checked="checked"
            required />
          <p>
            Я согласен(на) на обработку персональных данных и принимаю
            <a href="#">политику конфиденциальности</a>
          </p>
        </label><button class="start-modal__submit btn-reset" type="submit">
          Отправить заявку
        </button>
        <p class="start-modal__secure">
          <img
            src="<?= esc_url(get_template_directory_uri() . '/assets/img/main/start-shield.svg') ?>"
            alt=""
            aria-hidden="true" />Данные защищены и используются только для обработки заявки
        </p>
        <p class="form-status" role="status" aria-live="polite" hidden></p>
      </div>
    </form>
  </div>
</div>
<div
  class="modal start-modal start-modal--consult"
  data-modal="start-consult"
  aria-hidden="true">
  <div class="start-modal__dialog" role="dialog" aria-modal="true">
    <button
      class="start-modal__close btn-reset"
      type="button"
      data-modal-close
      title="Закрыть">
      ×
    </button>
    <p class="start-modal__badge">Консультация</p>
    <h2 id="start-consult-title">Обсудим ваш проект</h2>
    <p class="start-modal__subtitle">
      Оставьте контакты — специалист уточнит задачу и предложит оптимальный
      формат запуска.
    </p>
    <p class="start-modal__notice">
      <img
        src="<?= esc_url(get_template_directory_uri() . '/assets/img/main/start-clock.svg') ?>"
        alt=""
        aria-hidden="true" />Свяжемся с вами в течение 24 часов
    </p>
    <form
      data-request-form
      action="#"
      method="post"
      class="start-modal__form">
      <label class="start-modal__field">
        <p>Имя <em>*</em></p>
        <input
          type="text"
          name="name"
          placeholder="Как к вам обращаться"
          required
          autocomplete="off" />
      </label><label class="start-modal__field">
        <p>Телефон <em>*</em></p>
        <input
          type="tel"
          name="phone"
          placeholder="+7 (___) ___-__-__"
          required
          class="mask"
          autocomplete="off" />
      </label><label class="start-modal__field">
        <p>Email <em>*</em></p>
        <input
          type="email"
          name="email"
          placeholder="mail@example.ru"
          required
          autocomplete="email" />
      </label><label class="start-modal__agreement"><input type="checkbox" name="agreement" required />
        <p>
          Я согласен(на) на обработку персональных данных и принимаю
          <a href="#">политику конфиденциальности</a>
        </p>
      </label><button class="start-modal__submit btn-reset" type="submit">
        Получить консультацию
      </button>
      <p class="start-modal__note">
        Нажимая кнопку, вы отправляете заявку менеджеру проекта
      </p>
      <p class="form-status" role="status" aria-live="polite" hidden></p>
    </form>
  </div>
</div>
<?php
get_footer();
?>
