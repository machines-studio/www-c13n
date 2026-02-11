<?php
  $header = $page->text()->kirbytext();
  // TODO[panel]
  $projects = $page->children()->listed();

  $siblings = $page->siblings()->listed()->filterBy('intendedTemplate', $page->intendedTemplate()->name());
  $previous = $siblings->values()[($siblings->indexOf($page) + $siblings->count() - 1) % $siblings->count()];
  $next = $siblings->values()[($siblings->indexOf($page) + 1) % $siblings->count()];
?>

<?php snippet('components/Section', [
  'columns' => 2,
  'attributes' => ['class' => 'offset']
], slots: true) ?>
  <?php slot('content') ?>
    <?php snippet('components/Breadcrumb') ?>
    <header class='prose'>
      <?= $header ?>
    </header>
  <?php endslot() ?>
<?php endsnippet() ?>

<?php
  snippet('components/Section', [
    'title' => $page->title(),
    'attributes' => ['class' => 'offset']
  ], slots: true);
    slot('bleed');
      snippet('html/image', [
        'image' => $page->cover()->toFile(),
        'attributes' => ['class' => 'has-border intro']
      ]);
    endslot();
  endsnippet();
?>

<?php snippet('components/Projects', [
  'title' => t('activity.projects.title'),
  'projects' => $projects
]) ?>

<?php
  snippet('components/Section', [
    'tag' => 'nav',
    'attributes' => [
      'class' => 'siblings'
    ]
  ], slots: true);
    slot('content');
      foreach ([$previous, $next] as $sibling) {
        snippet('components/Activity', $sibling);
      }
    endslot();
  endsnippet();
?>
