<?php
$fields = get_fields('option') ?: [];
?>
<section class="callback">
    <div class="container">
        <div class="callback__panel">
            <picture class="callback__background" aria-hidden="true">
                <source media="(max-width: 1024px)" srcset="<?= $fields['callback-backmobile']['url'] ?>"><img
                    src="<?= $fields['callback-backdesc']['url'] ?>" alt="<?= $fields['callback-backdesc']['alt'] ?>"
                    loading="lazy" decoding="async">
            </picture>
            <h2 class="callback__title"><em class="callback__copy-full"><?= $fields['callback-title'] ?></em></h2>
            <form class="callback__form" data-request-form action="#" method="post">
                <div class="callback__field"><label class="callback__label" for="callbackName">Имя</label> <input
                        class="input-reset callback__input" id="callbackName" name="name" type="text"
                        placeholder="Иван Иванов" required></div>
                <div class="callback__field"><label class="callback__label" for="callbackPhone">Телефон</label> <input
                        class="input-reset callback__input mask" id="callbackPhone" name="phone" type="tel"
                        placeholder="+7 (999) 000-00-00" required></div><label class="callback__agree"><input
                        class="callback__agree-input" type="checkbox" name="agreement" checked="checked" required> <i
                        class="callback__agree-box" aria-hidden="true"><svg width="10" height="8" viewBox="0 0 10 8"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="m1 4 2.6 2.6L9 1.2" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg></i>
                    <p class="callback__agree-text">Вы соглашаетесь с условиями обработки персональных данных</p>
                </label> <button class="btn-reset callback__btn" type="submit">Оставить заявку</button>
                <p class="form-status" role="status" aria-live="polite" hidden></p>
            </form>
        </div>
    </div>
</section>