<?php
  $tag ??= 'section';
  $title ??= $slots->title();
  $bleed ??= $slots->bleed();
  $content ??= $slots->content();

  if (!trim($bleed ?? '') && !trim($content ?? '')) return;

  $attributes ??= [];
  $attributes['class'] = 'section ' . ($attributes['class'] ?? '');
?>

<<?= $tag ?> <?= attr($attributes) ?>>
  <div class='wrapper'>
    <?php if (trim($title ?? '')) : ?>
      <h2><?= $title ?></h2>
    <?php endif ?>

    <?= $content ?>
  </div>

  <?= $bleed ?>
</<?= $tag ?>>
