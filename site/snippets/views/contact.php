<?php
  // TODO[panel]
  $header = $page->text()->kirbytext();
?>

<?php
  snippet('components/Section', [
    'columns' => 2,
    'attributes' => [
      'class' => 'section--header cols-2'
    ]
  ], slots: true);
    slot('content');
      snippet('components/Breadcrumb');
      echo Html::header([$header], ['class' => 'prose']);
    endslot();
  endsnippet();
?>

<?php
  snippet('components/Section', [
    'title' => $page->title(),
    'attributes' => ['class' => 'section--cover']
  ], slots: true);
    slot('bleed');
      snippet('html/image', [
        // TODO[panel]
        'image' => $site->images()->first(),
        'attributes' => ['class' => 'has-border']
      ]);
    endslot();
  endsnippet();
?>

<?php
  $activities = $site->index()->listed()->filterBy('intendedTemplate', 'activity');
  snippet('components/Section', [
    'tag' => 'nav',
    'columns' => $activities->count(),
    'attributes' => ['class' => 'activities']
  ], slots: true);
    slot('content');
      foreach ($activities as $page) snippet('components/Activity', $page);
    endslot();
  endsnippet();
?>
