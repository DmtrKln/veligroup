<?php
$title = get_sub_field('title');
$subtitle = get_sub_field('sudtitle');
$img = get_sub_field('img');
$task = get_sub_field('task');
$made = get_sub_field('made');
$page_id = 7;
?>
<div class="hero-project-modal__content">
  <div class="hero-project-modal__image">
    <img src="<?= esc_url($img['url']) ?>" alt="<?= esc_attr($img['alt']) ?>" />
  </div>
  <div class="hero-project-modal__description">
    <div class="hero-project-modal__intro">
      <h2><?= $title; ?></h2>
      <p class="hero-project-modal__type">
        <?= $subtitle; ?>
      </p>
    </div>
    <div class="hero-project-modal__detail">
      <p class="hero-project-modal__detail-label">Задача</p>
      <p>
        <?= $task; ?>
      </p>
    </div>
    <div class="hero-project-modal__detail">
      <p class="hero-project-modal__detail-label">
        Что было сделано
      </p>
      <p>
        <?= $made; ?>
      </p>
    </div>
  </div>
  <div class="hero-project-modal__metrics">
    <?php
    if (have_rows('modal-metric', $page_id)):
      while (have_rows('modal-metric', $page_id)):
        the_row();
        $title = get_sub_field('title');
        $num = get_sub_field('num');
        $desc = get_sub_field('desc');
        ?>
        <div class="hero-project-modal__metric">
          <p class="hero-project-modal__metric-label">
            <?= $title ?>
          </p>
          <p class="hero-project-modal__metric-value"> <?= $num ?>
          </p>
          <p class="hero-project-modal__metric-caption">
            <?= $desc ?>
          </p>
        </div>
        <?php
      endwhile;
    endif;
    ?>

  </div>
</div>
