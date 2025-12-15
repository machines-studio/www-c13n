<?php
  $title ??= '';
  $projects ??= new Collection();
  if (!count($projects)) return;
?>

<?php snippet('components/Section', [
  'title' => $title,
  'attributes' => ['class' => 'projects offset']
], slots: true) ?>
  <?php slot('bleed') ?>
    <ul class='projects__items'>
      <?php foreach ($projects as $project) : ?>
        <li class='projects__item' id='<?= $project->slug() ?>'>
          <header>
            <nav>
              <?php snippet('html/link', [
                'url' => '#' . $project->prev($projects)?->slug(),
                'title' => snippet('svg/arrow', [], true),
                'attributes' => [
                  'disabled' => !$project->prev($projects)
                ]
              ]) ?>
              <?php snippet('html/link', [
                'url' => '#' . $project->next($projects)?->slug(),
                'title' => snippet('svg/arrow', [], true),
                'attributes' => [
                  'disabled' => !$project->next($projects)
                ]
              ]) ?>
            </nav>

            <h3><?= $project->title() ?></h3>

            <div class='description'>
              <?= $project->description()->kirbytext() ?>
            </div>

            <ul class='metas'>
              <?php foreach ($project->metas()->toStructure() as $meta) : ?>
                <li class='meta' data-label='<?= $meta->label()->value() ?>'>
                  <?= $meta->value()->kirbytextInline() ?>
                </li>
              <?php endforeach ?>
            </ul>
          </header>
          <ul class='gallery'>
            <?php foreach ($project->images() as $image) : // TODO[panel] ?>
              <li>
                <?php snippet('html/image', [
                  'image' => $image,
                  'lazyload' => false
                ]) ?>
              </li>
            <?php endforeach ?>
          </ul>
        </li>
      <?php endforeach ?>
    </ul>
  <?php endslot() ?>
<?php endsnippet() ?>
