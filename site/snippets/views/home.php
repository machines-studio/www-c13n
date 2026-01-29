<?php

  $activities = $site->index()->listed()->filterBy('intendedTemplate', 'activity');
  $home = $site->index()->unlisted()->filterBy('intendedTemplate', 'home')->first();
  $partners = new Collection(); // TODO[panel]

  // TODO[panel]
  $subtitle =  $home->heroSubtitle();

  // TODO[panel]
  $descriptionPattern = asset('assets/background-green.jpg');
  $description = $home->heroDescription();

  // TODO[panel]
  $text = $home->keyFiguresDescription();

?>


<?php snippet('html/image', [
  // TODO[panel]
  'image' => $home->cover()->toFiles()->shuffle()->first(),
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
  'attributes' => ['class' => 'section--numbers offset']
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
      <?=  $home->skillsSubtitle(); ?>
    </h2>

    <div class='activities cols-<?= $activities->count() ?>'>
      <?php foreach ($home->skillsItems()->toStructure() as $index => $item) : ?>
        <?php
          $skillImage = $item->skillImage()->toFile()?->url();
          $skillTitle = $item->skillTitle();
          $skillUrl = $item->skillUrl()->toPage();
          $patternId = "pattern-skill-{$index}";
        ?>

        <a href='<?= $skillUrl?->url() ?? '#' ?>'>
          <svg width="256" height="356" viewBox="0 0 256 356" fill="none" xmlns="http://www.w3.org/2000/svg">
            <defs>
              <pattern id="<?= $patternId ?>" patternContentUnits="objectBoundingBox" width="1" height="1">
                <image href="<?= $skillImage ?>" x="0" y="0" width="1" height="1" preserveAspectRatio="xMidYMid slice"/>
              </pattern>
            </defs>
            <?php
              // Charger le SVG depuis assets/skill{index}.svg
              $svgPath = asset("assets/skill{$index}.svg")->root();
              if (file_exists($svgPath)) {
                $svgContent = file_get_contents($svgPath);
                // Extraire le path du SVG (en supposant qu'il y a un path principal)
                preg_match('/<path[^>]*d="([^"]*)"[^>]*\/?>/', $svgContent, $matches);
                if (!empty($matches[1])) {
                  echo '<path d="' . $matches[1] . '" fill="url(#' . $patternId . ')" stroke="#FAF1E3" stroke-width="2" stroke-miterlimit="10"/>';
                }
              }
            ?>
          </svg>
          <span><?= $skillTitle ?></span>
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
      <?= $home->partnersSubtitle() ?>
    </h2>

<?   // TODO[panel] ?>

    <div class='partners cols-<?= $home->partnersLogos()->toStructure()->count() ?>'>
      <?php foreach ($home->partnersLogos()->toStructure() as $partner) : ?>
        <a  style="mix-blend-mode: multiply;" href='<?= $partner->partnerUrl() ?>'>
          <?php snippet('html/image', [
            'image' => $partner->partnerLogo()->toFile()
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
