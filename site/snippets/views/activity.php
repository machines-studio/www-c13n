<?php
  $header = $page->text()->kirbytext();
?>

<?php snippet('components/Section', slots: true) ?>
  <?php slot('content') ?>
    <?php snippet('components/Breadcrumb') ?>
    <header class='prose'>
      <?= $header ?>
    </header>
  <?php endslot() ?>
<?php endsnippet() ?>

<?php snippet('components/Section', [
  'title' => $page->title()
], slots: true) ?>
  <?php slot('bleed') ?>
    <?php snippet('html/image', [
      // TODO[panel]
      'image' => $site->images()->first(),
      'attributes' => ['class' => 'has-border']
    ]) ?>
  <?php endslot() ?>
<?php endsnippet() ?>

<?php snippet('components/ScrollStory') // WIP ?>
