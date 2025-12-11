<?php
  // TODO[panel]
  $subtitle = 'Construire juste';

  // TODO[panel]
  $descriptionPattern = asset('assets/background-green.jpg');
  $description = <<<HTML
    Contractant général pour la construction de bâtiments industriels,
    logistiques et tertiaires clé en main
  HTML;

  // TODO[panel]
  $text = <<<HTML
    <p><b>C13N Group est un contractant général</b> spécialisé en immobilier d'entreprise de grande envergure : usines, sites logistiques, sièges sociaux, bureaux. Dirigé par un architecte, le groupe se démarque par la qualité architecturale de ses réalisations, appuyées sur des compétences solides en ingénierie et en suivi de chantiers complexes. C13N Group est l'interlocuteur unique pour la conception et la réalisation de vos projets, prix et résultat garantis.</p>
  HTML;

  $activities = $site->index()->listed()->filterBy('intendedTemplate', 'activity');
  $partners = new Collection(); // TODO[panel]
?>

<?php snippet('html/image', [
  // TODO[panel]
  'image' => $site->images()->shuffle()->first(),
  'lazyload' => false, // Improve LCP
  'attributes' => ['class' => 'hero']
]) ?>

<?php
  snippet('components/Section', [
    'attributes' => [
      'class' => 'section--description',
      'style' => "--section-background: url('{$descriptionPattern->url()}');"
    ]
  ], slots: true);
    slot('bleed');
      snippet('components/Mask', ['image' => $descriptionPattern]);
    endslot();

    slot('content');
      echo Html::div([$description], ['class' => 'prose']);
      echo Html::h2([$subtitle]);
    endslot();
  endsnippet();
?>

<?php snippet('html/video', [
  // TODO[panel]
  'video' => $site->videos()->first()
]) ?>

<?php snippet('components/Section', [
  'attributes' => ['class' => 'section--numbers']
], slots: true) ?>
  <?php slot('content') ?>
    <div class='prose'><?= $text ?></div>
    <div class='numbers cols-3'>
      <?= asset('assets/number-1.svg') ?>
      <?= asset('assets/number-2.svg') ?>
      <?= asset('assets/number-3.svg') ?>
    </div>
  <?php endslot() ?>
<?php endsnippet() ?>

<?php snippet('components/Section', [
  'attributes' => [
    'class' => 'section--skills',
    'style' => "--section-background: url('" . asset('assets/background-white.jpg')->url() . "');"
  ]
], slots: true) ?>
  <?php slot('content') ?>
    <h2>
      <?php // TODO[panel] ?>
      Nos domaines d’expertise
    </h2>

    <div class='activities cols-<?= $activities->count() ?>'>
      <?php foreach ($activities as $page) : ?>
        <a href='<?= $page->url() ?>'>
          <?= asset('assets/' . $page->slug() . '.svg') ?>
          <span><?= $page->title() ?></span>
        </a>
      <?php endforeach ?>
    </div>
  <?php endslot() ?>
<?php endsnippet() ?>

<?php snippet('components/Section', [
  'attributes' => ['class' => 'section--partners']
], slots: true) ?>
  <?php slot('content') ?>
    <h2>
      <?php // TODO[panel] ?>
      Ils nous ont fait confiance
    </h2>

    <div class='partners cols-<?= $partners->count() ?>'>
      <?php foreach ($partners as $page) : ?>
        <a href='<?= $page->url() ?>'>
          <?php snippet('html/image', [
            'image' => $page->cover()->toFile()
          ]) ?>
        </a>
      <?php endforeach ?>
    </div>
  <?php endslot() ?>
<?php endsnippet() ?>

<?php snippet('html/image', [
  // TODO[panel]
  'image' => $site->images()->shuffle()->first(),
  'lazyload' => false, // Improve LCP
  'attributes' => ['class' => 'footer']
]) ?>
