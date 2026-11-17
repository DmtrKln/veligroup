<?php get_header(); ?>

<main id="main" class="main main--inner main--center">
    <section class="not-found">
        <div class="container">
            <div class="not-found-warapp"></div>
            <p class="not-found__code">404</p>
            <h1 class="not-found__title">Страница не найдена</h1>
            <p class="not-found__desc">К сожалению, запрашиваемая страница не существует или была удалена.</p><a
                class="not-found__btn" href="<?= esc_url(home_url('/')); ?>"><span>Вернуться на главную</span> <svg width="16"
                    height="16" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true">
                    <path d="M2.92 7h8.17M7 11.08 11.08 7 7 2.92" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" />
                </svg></a>
        </div>
    </section>
</main>

<?php get_footer(); ?>
