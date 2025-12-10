<?php
  $tag ??= 'section';
  $title ??= $slots->title();
  $bleed ??= $slots->bleed();
  $content ??= $slots->content();
  $columns ??= 1;

  if (!trim($bleed ?? '') && !trim($content ?? '')) return;

  $attributes ??= [];
  $attributes['class'] = 'section ' . ($attributes['class'] ?? '');
?>

<<?= $tag ?> <?= attr($attributes) ?>>
  <div class='wrapper'>
    <?php if (trim($title ?? '')) : ?>
      <h2 class='section__title'><?= $title ?></h2>
    <?php endif ?>

    <?= $columns > 1
      ? Html::div([$content], ['class' => "cols-$columns"])
      : $content
    ?>
  </div>

  <?= $bleed ?>
</<?= $tag ?>>
