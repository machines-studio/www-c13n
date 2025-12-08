<?php snippet('html/image', [
  // TODO[panel]
  'image' => $site->images()->shuffle()->first(),
  'lazyload' => false, // Improve LCP
  'attributes' => ['class' => 'hero']
]) ?>

<?php snippet('components/Excerpt', [

]) ?>

<?php snippet('html/video', [
  // TODO[panel]
  'video' => $site->videos()->first()
]) ?>
