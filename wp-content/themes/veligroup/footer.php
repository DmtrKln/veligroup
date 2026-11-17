<?php
$fields = get_fields('option') ?: [];
?>
<footer class="footer">
    <img class="footer__img-left" src="<?= esc_url($fields['footer_imgleft']['url']) ?>" alt="" />
    <img class="footer__img-right" src="<?= esc_url($fields['footer_imgright']['url']) ?>" alt="" />
    <div class="container">
        <div class="footer__wrapp">
            <div class="footer__top">
                <div class="footer__left">
                    <div class="footer__about">
                        <a class="footer__logo" href="<?= home_url(); ?>"><img
                                src="<?= esc_url($fields['footer_logo']['url']) ?>"
                                alt="<?= esc_attr($fields['footer_logo']['alt']) ?>" /></a>
                        <div class="footer__about-desc">
                            <h4>
                                <?= $fields['footer_title'] ?>
                            </h4>
                            <p>
                                <?= $fields['footer_desc'] ?>
                            </p>
                        </div>
                        <div class="footer__btns">
                            <button class="btn-reset" type="button" data-modal-open>
                                <span>Обсудить проект</span><svg width="20" height="19" viewBox="0 0 20 19" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.25 9.25H17.25M9.25 17.25L17.25 9.25L9.25 1.25" stroke="white"
                                        stroke-width="2.5" stroke-linecap="round" />
                                </svg>
                            </button>
                            <button class="btn-reset" type="button" data-modal-open>
                                Запросить звонок
                            </button>
                        </div>
                    </div>
                    <nav class="footer__nav">
                        <h5 class="footer__col-title">навигация</h5>
                        <?php
                        wp_nav_menu([
                            'theme_location' => 'footer_menu',
                            'container' => false,
                            'menu_id' => 'footer-menu-list',
                            'menu_class' => 'footer__list list-reset',
                            'depth' => 1,
                            'fallback_cb' => false,
                        ]);
                        ?>
                    </nav>
                </div>
                <div class="footer__right">
                    <div class="footer__office">
                        <h6>Офис</h6>
                        <p><?= $fields['contactinfo_addres'] ?></p>
                        <p><?= $fields['contactinfo_time'] ?></p>
                    </div>
                    <div class="footer__contact">
                        <a href="tel:<?= preg_replace('/[^\d+]/', '', $fields['contactinfo_tel']) ?>"
                            class="footer__tel"><svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1.7998 1H4.5C4.71213 1 4.91541 1.08441 5.06543 1.23438C5.21541 1.38436 5.29975 1.5877 5.2998 1.7998V4.5C5.2998 4.62405 5.27124 4.74644 5.21582 4.85742C5.16037 4.96833 5.07961 5.06518 4.98047 5.13965L4.55859 5.45605L4.55176 5.46094C4.24644 5.69407 4.01993 6.01355 3.90039 6.37598L3.85645 6.5332C3.75532 6.96022 3.8048 7.40925 3.99707 7.80371L3.99902 7.80762C5.32664 10.504 7.51 12.6846 10.208 14.0088L10.2197 14.0146L10.2314 14.0195C10.6239 14.1997 11.0664 14.2414 11.4854 14.1367C11.9041 14.032 12.2747 13.7877 12.5361 13.4443L12.5352 13.4434L12.8545 13.0264L12.8604 13.0195C12.9348 12.9204 13.0317 12.8396 13.1426 12.7842C13.2536 12.7288 13.3759 12.7002 13.5 12.7002H16.2002C16.4123 12.7002 16.6156 12.7846 16.7656 12.9346C16.9156 13.0846 17 13.2879 17 13.5V16.2002C16.9999 16.4123 16.9156 16.6156 16.7656 16.7656C16.6156 16.9156 16.4123 16.9999 16.2002 17C12.1689 17 8.3027 15.3984 5.45215 12.5479C2.6016 9.6973 1 5.8311 1 1.7998C1.00005 1.5877 1.08439 1.38436 1.23438 1.23438C1.38436 1.08439 1.5877 1.00005 1.7998 1Z"
                                    stroke="#E12A2A" stroke-width="2" stroke-linecap="round" />
                            </svg>
                            <span><?= $fields['contactinfo_tel'] ?></span> </a><a
                            href="mailto:<?= esc_attr(trim($fields['contactinfo_mail'])) ?>" class="footer__mail"><svg
                                width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1.7998 1H16.2002C16.4454 1.00018 17 1.34012 17 2.25V15.75C17 16.6599 16.4454 16.9998 16.2002 17H1.7998C1.55458 16.9998 1 16.6599 1 15.75V2.25C1 1.34012 1.55458 1.00018 1.7998 1Z"
                                    stroke="#E12A2A" stroke-width="2" stroke-linecap="round" />
                                <path class="footer__icon-detail" d="M1 3L9 10L17 3" stroke="#E12A2A" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <span><?= $fields['contactinfo_mail'] ?></span></a>
                        <p class="footer__address">
                            <svg width="14" height="17" viewBox="0 0 14 17" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7.4501 15.8506C8.84496 14.646 12.9988 10.7457 12.9988 7.00056C12.9988 5.40911 12.3667 3.88284 11.2416 2.75752C10.1165 1.6322 8.59054 1 6.9994 1C5.40826 1 3.88229 1.6322 2.75718 2.75752C1.63208 3.88284 1 5.40911 1 7.00056C1 10.7457 5.15384 14.646 6.5487 15.8506C6.67864 15.9484 6.83682 16.0012 6.9994 16.0012C7.16198 16.0012 7.32016 15.9484 7.4501 15.8506Z"
                                    stroke="#E12A2A" stroke-width="2" stroke-linecap="round" />
                                <circle class="footer__icon-detail" cx="7" cy="7" r="2" stroke="#E12A2A"
                                    stroke-width="2" />
                            </svg>
                            <span><?= $fields['contactinfo_addres'] ?></span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="footer__bottom">
                <div class="footer__copy-wrapp">
                    <p class="footer__copy">
                        © 2026 Велий Групп. Все права защищены.
                    </p>
                    <ul class="footer__policy list-reset">
                        <li><a href="<?= esc_url(get_privacy_policy_url()) ?>">
                                Политика конфиденциальности
                            </a></li>
                        <li class="footer__policy-sep" aria-hidden="true">•</li>
                        <li><a href="#">Условия использования</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</div>
</body>

</html>
