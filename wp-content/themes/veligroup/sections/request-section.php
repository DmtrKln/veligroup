<?php
$fields = get_fields('option') ?: [];
?>

<section class="request<?= !empty($args['class']) ? ' ' . esc_attr($args['class']) : '' ?>" id="request">
    <div class="container">
        <picture class="request__background" aria-hidden="true">
            <source media="(max-width: 768px)" srcset="<?= $fields['request_background_mobile']['url'] ?>" />
            <img src="<?= $fields['request_background_desc']['url'] ?>"
                alt="<?= $fields['request_background_desc']['alt'] ?>" loading="lazy" decoding="async" />
        </picture>
        <p class="request__badge">заявка</p>
        <div class="request__block">
            <div class="request__left">
                <div class="request__top">
                    <h3>Оставьте заявку</h3>
                    <p>Мы свяжемся с вами в течение 24 часов</p>
                </div>
                <a href="tel:<?= preg_replace('/[^\d+]/', '', $fields['request_background_phone'] ?? '') ?>"
                    class="request__call">
                    <div class="request__button-left">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_696_1516)">
                                <path
                                    d="M9.66122 11.0867C9.51422 11.1235 9.35909 11.109 9.2214 11.0458C7.36953 10.1369 5.87091 8.64017 4.95972 6.78944C4.89224 6.65102 4.87476 6.4935 4.91024 6.34364C4.94573 6.19379 5.032 6.06084 5.1544 5.96738L5.46643 5.73336C5.63204 5.60915 5.76645 5.4481 5.85903 5.26294C5.95161 5.07779 5.9998 4.87362 5.9998 4.66661V2.66645C5.9998 2.3128 5.85932 1.97363 5.60925 1.72356C5.35918 1.47349 5.02001 1.33301 4.66636 1.33301H2.6662C2.31255 1.33301 1.97339 1.47349 1.72332 1.72356C1.47325 1.97363 1.33276 2.3128 1.33276 2.66645C1.33276 5.8493 2.59715 8.90179 4.84776 11.1524C7.09838 13.403 10.1509 14.6674 13.3337 14.6674C13.6874 14.6674 14.0265 14.5269 14.2766 14.2769C14.5267 14.0268 14.6672 13.6876 14.6672 13.334V11.3338C14.6672 10.9802 14.5267 10.641 14.2766 10.3909C14.0265 10.1409 13.6874 10.0004 13.3337 10.0004H11.3336C11.1266 10.0004 10.9224 10.0486 10.7372 10.1411C10.5521 10.2337 10.391 10.3681 10.2668 10.5337L10.0301 10.8438C9.93834 10.9643 9.80823 11.05 9.66122 11.0867Z"
                                    stroke="white" stroke-width="2" stroke-linecap="round" />
                            </g>
                            <defs>
                                <clipPath id="clip0_696_1516">
                                    <rect width="16" height="16" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                    <div class="request__button-right">
                        <p>Позвонить нам</p>
                        <p>
                            <span class="request__phone-prefix">Номер телефона:
                            </span><?= $fields['request_background_phone'] ?>
                        </p>
                    </div>
                </a>
                <form class="request__form" action="#" method="post" data-request-form>
                    <div class="request__row">
                        <label>Имя<input name="name" type="text" placeholder="Иван Иванов" autocomplete="name"
                                required /></label><label>Телефон<input name="phone" type="tel" placeholder="<?= $fields['request_background_phone'] ?>"
                                autocomplete="tel"
                                class="mask"
                                required /></label>
                    </div>
                    <label>Email<input
                            name="email"
                            type="email"
                            placeholder="example@mail.ru"
                            autocomplete="email" /></label><label>Сообщение<textarea
                            name="message"
                            rows="3"
                            placeholder="Ваш вопрос или детали проекта..."></textarea>
                    </label>
                    <label class="request__form-agreement"><input name="agreement" type="checkbox" required />
                        <p>
                            Я даю согласие на обработку моих персональных данных
                        </p>
                    </label><button class="button btn-reset" type="submit">
                        Отправить заявку
                    </button>
                    <p
                        class="form-status"
                        role="status"
                        aria-live="polite"
                        hidden></p>
                </form>
            </div>
            <img
                class="request__devices"
                src="<?= $fields['request_devices']['url'] ?>" alt="<?= $fields['request_devices']['alt'] ?>"
                                width="792" height="632" loading="lazy" decoding="async" />
                    </div>
            </div>
</section>