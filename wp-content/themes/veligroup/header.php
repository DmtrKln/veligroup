<?php
$fields = get_fields('option') ?: [];
?>

<!doctype html>
<html lang="ru" class="page">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="theme-color" content="#111111" />
    <title><?php the_title(); ?></title>
    <link rel="icon" href="data:," />
    <?php
    wp_head();
    ?>
</head>

<body
    class="page__body <?= is_singular('services') ? 'page--landing' : (is_singular('projects') ? 'page--case' : (is_page_template('tariff.php') ? 'page--start' : 'page--home')) ?>">
    <div class="site-container">
        <a class="skip-link" href="#main">Перейти к содержимому</a>
        <header class="header">
            <div class="container width">
                <div class="header__wrapp">
                    <a class="header__logo" href="<?= home_url(); ?>"><img
                            src="<?= esc_url($fields['header_logo']['url']) ?>"
                            alt="<?= esc_attr($fields['header_logo']['alt']) ?>" /></a>
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'header_menu',
                        'container' => 'nav',
                        'container_class' => 'header__nav',
                        'menu_class' => 'header__menu',
                    ])
                        ?>
                    <button class="header__connect btn-reset" data-modal-open>
                        <span>Оставить заявку</span><svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.91602 7H11.0836M6.99982 11.0838L11.0836 7L6.99982 2.9162" stroke="white"
                                stroke-width="2" stroke-linecap="round" />
                        </svg>
                    </button>
                    <button class="header__burger btn-reset" type="button" title="Открыть меню"
                        aria-controls="mobile-menu" aria-expanded="false">
                        <span></span> <span></span> <span></span>
                    </button>
                </div>
            </div>
            <div class="header__mobile" id="mobile-menu" inert>
                <div class="header__mobile-background" aria-hidden="true">
                    <img src="<?= get_template_directory_uri(); ?>/assets/img/main/mobile-menu.png" alt="" />
                </div>
                <div class="header__mobile-top">
                    <a href="<?= home_url(); ?>" class="header__mobile-logo"><img
                            src="<?= esc_url($fields['header_logo']['url']) ?>"
                            alt="<?= esc_attr($fields['header_logo']['alt']) ?>" />
                    </a><button class="header__mobile-close btn-reset" type="button" title="Закрыть меню">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true">
                            <path d="M14 4L4 14M4 4l10 10" stroke="currentColor" stroke-width="1.8"
                                stroke-linecap="round" />
                        </svg>
                    </button>
                </div>
                <nav class="header__mobile-nav">
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'mobile_menu',
                        'container' => false,
                        'menu_id' => 'mobile-menu-list',
                        'menu_class' => 'header__mobile-list list-reset',
                        'depth' => 1,
                        'fallback_cb' => false,
                        'link_before' => '<span>',
                        'link_after' => '</span><svg class="header__mobile-chevron" width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M1 1l6 6-6 6" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" /></svg>',
                    ]);
                    ?>
                </nav>
                <div class="header__mobile-foot">
                    <a class="header__mobile-contact"
                        href="tel:<?= preg_replace('/[^\d+]/', '', $fields['contactinfo_tel']) ?>"><svg width="18"
                            height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true">
                            <path
                                d="M6.6 3.5h2.2l1.5 3.7-1.8 1.2a11 11 0 0 0 5.1 5.1l1.2-1.8 3.7 1.5v2.2a2 2 0 0 1-2.2 2A16.5 16.5 0 0 1 4.6 5.7a2 2 0 0 1 2-2.2Z"
                                stroke="currentColor" stroke-width="1.6" stroke-linejoin="round" />
                        </svg>
                        <span><?= $fields['contactinfo_tel'] ?></span> </a><a
                        class="header__mobile-contact header__mobile-contact--mail"
                        href="mailto:<?= esc_attr(trim($fields['contactinfo_mail'])) ?>"><svg width="18" height="18"
                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <rect x="3" y="5.5" width="18" height="13" rx="2" stroke="currentColor"
                                stroke-width="1.6" />
                            <path d="m4 7 8 6 8-6" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round" />
                        </svg>
                        <span><?= $fields['contactinfo_mail'] ?></span> </a><button class="header__mobile-cta btn-reset"
                        type="button" data-modal-open>
                        <span>Обсудить проект</span>
                        <svg width="16" height="16" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true">
                            <path d="M2.92 7h8.17M7 11.08 11.08 7 7 2.92" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="modal" data-modal="request" aria-hidden="true">
                <div class="modal__dialog" role="dialog" aria-modal="true">
                    <button class="modal__close btn-reset" type="button" data-modal-close title="Закрыть">
                        <svg width="16" height="16" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true">
                            <path d="M14 4L4 14M4 4l10 10" stroke="currentColor" stroke-width="1.8"
                                stroke-linecap="round" />
                        </svg>
                    </button>
                    <h3 class="modal__title" id="modalRequestTitle">Оставьте заявку</h3>
                    <p class="modal__subtitle">
                        Заполните форму и мы свяжемся с вами в ближайшее время
                    </p>
                    <form class="modal__form" data-request-form action="#" method="post">
                        <div class="modal__row">
                            <div class="modal__field">
                                <label class="modal__label" for="modalName">Имя</label>
                                <input class="input-reset modal__input" id="modalName" name="name" type="text"
                                    placeholder="Иван Иванов" required />
                            </div>
                            <div class="modal__field">
                                <label class="modal__label" for="modalPhone">Телефон</label>
                                <input class="input-reset modal__input mask" id="modalPhone" name="phone" type="tel"
                                    placeholder="+7 (999) 000-00-00" required />
                            </div>
                        </div>
                        <div class="modal__field">
                            <label class="modal__label" for="modalEmail">Email</label>
                            <input class="input-reset modal__input" id="modalEmail" name="email" type="email"
                                placeholder="example@mail.ru" />
                        </div>
                        <button class="btn-reset modal__submit" type="submit">
                            Отправить заявку
                        </button>
                        <label class="modal__agree"><input class="modal__agree-input" type="checkbox" name="agreement"
                                required />
                            <i class="modal__agree-box" aria-hidden="true"><svg width="10" height="8" viewBox="0 0 10 8"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="m1 4 2.6 2.6L9 1.2" stroke="currentColor" stroke-width="1.8"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg></i>
                            <p class="modal__agree-text">
                                Я соглашаюсь с <a href="<?= esc_url(get_privacy_policy_url()) ?>">политикой конфиденциальности</a>
                            </p>
                        </label>
                        <p class="form-status" role="status" aria-live="polite" hidden></p>
                    </form>
                </div>
            </div>
            <div class="modal" data-modal="success" aria-hidden="true">
                <div class="modal__dialog modal__dialog--success" role="dialog" aria-modal="true">
                    <button class="modal__close btn-reset" type="button" data-modal-close title="Закрыть">
                        <svg width="16" height="16" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true">
                            <path d="M14 4L4 14M4 4l10 10" stroke="currentColor" stroke-width="1.8"
                                stroke-linecap="round" />
                        </svg>
                    </button>
                    <h3 class="modal__title modal__title--center" id="modalSuccessTitle">
                        Заявка успешно отправлена
                    </h3>
                </div>
            </div>
            <div class="cookie" id="cookie" hidden>
                <div class="cookie__inner">
                    <i class="cookie__dot" aria-hidden="true"></i>
                    <h3 class="cookie__title">Файлы Cookie</h3>
                    <p class="cookie__text">
                        Мы используем файлы cookie для улучшения работы сайта. Оставаясь
                        на сайте, вы соглашаетесь с нашей
                        <a class="cookie__link" href="<?= esc_url(get_privacy_policy_url()) ?>">Политикой конфиденциальности</a>.
                    </p>
                    <div class="cookie__controls">
                        <button class="btn-reset cookie__btn cookie__btn--ghost" type="button" data-cookie="settings">
                            Настроить
                        </button>
                        <button class="btn-reset cookie__btn cookie__btn--accept" type="button" data-cookie="accept">
                            Принять
                        </button>
                    </div>
                </div>
            </div>
        </header>
