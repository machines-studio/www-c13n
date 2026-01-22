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
    <div class='projects__viewport'>
      <ul class='projects__items'>
        <?php foreach ($projects as $project) : ?>
          <li class='projects__item'>
            <details <?= attr([
              'id' => $project->slug(),
              'open' => $project->isFirst($projects)
            ]) ?>>
              <summary>
                <h3><?= $project->title() ?></h3>
                <?php snippet('svg/arrow') ?>
              </summary>

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

              <ul class='gallery'>
                <?php $images = $project->images() // TODO[panel] ?>
                <?php foreach ($images as $image) : ?>
                  <li id='<?= r($image->isFirst($images), $project->slug()) ?>'>
                    <?php snippet('html/image', [
                      'image' => $image,
                      'lazyload' => false
                    ]) ?>
                  </li>
                <?php endforeach ?>
              </ul>
            </details>
          </li>
        <?php endforeach ?>
      </ul>

      <ul class='js projects__gallery'></ul>
    </div>
  <?php endslot() ?>
<?php endsnippet() ?>
