<?php
  $about = $page->text()->kirbytext();
?>

<?php
  snippet('components/Section', [
    'attributes' => ['class' => 'offset']
  ], slots: true);
    slot('content');
      snippet('components/Breadcrumb');
      echo Html::tag('h2', $page->title());
    endslot();
  endsnippet();
?>

<?php
  snippet('components/Section', [
    'title' => $page->subtitleAboutUs(), // TODO[panel]
    'columns' => 2,
    'attributes' => ['class' => 'section--about prose offset']
  ], slots: true);
    slot('content');
      echo Html::div([$about]);
      snippet('components/Mask', [
        'image' => $page->imageAboutUs()->toFile(),
        'mask' => 1
      ]);
    endslot();
  endsnippet();
?>



<?php
  snippet('components/Section', [
    'title' => $page->subtitleHistoire(), // TODO[panel]
    'columns' => 3,
    'attributes' => ['class' => 'section--engagements prose offset']
  ], slots: true);
    slot('content');
      // TODO[panel]  
    
      echo '<div>' . $page->colHistoireA() . '</div>';
      echo '<div>' . $page->colHistoireB() . '</div>';
      echo '<div>' . $page->colHistoireC() . '</div>';
      
    endslot();
  endsnippet();
?>


<?php
  snippet('components/Section', [
    'attributes' => [
      'class' => 'section--description',
      'style' => "--section-background: url('{$page->quoteImage()->toFile()->url()}');"
    ]
  ], slots: true);
    slot('bleed');
    endslot();

    slot('content');
      echo Html::div([$page->quote()], ['class' => 'prose quote kiwi']);
    endslot();
  endsnippet();
?>



<?php
  snippet('components/Section', [
    'title' => $page->subtitleEngagement(), // TODO[panel]
    'columns' => 3,
    'attributes' => ['class' => 'section--engagements prose offset']
  ], slots: true);
    slot('content');
      // TODO[panel]  
    
      echo '<div>' . $page->colA() . '</div>';
      echo '<div>' . $page->colB() . '</div>';
      echo '<div>' . $page->colC() . '</div>';
      
    endslot();
  endsnippet();
?>




<?php
  snippet('components/Section', [
    'title' => $page->metsubtitleMethode(), // TODO[panel]
    'columns' => 2,
    'attributes' => ['class' => 'section--method prose offset']
  ], slots: true);
    slot('content');
    // TODO[panel]
  ?>
    <div>
     <?= $page->methodColA() ?>
     
     <?php snippet('components/Mask', [
        'image' => $page->methodImage()->toFile(),
        'mask' => 2
      ]) ?>
    </div>

    <div>
           <?= $page->methodColB() ?>

  </div>
  <?php
    endslot();
  endsnippet();
?>
