<?php
  // TODO[panel]
  $about = $page->text()->kirbytext();
  $engagements = [
    <<<HTML
      <h4>Le respect de l’environnement</h4>
      <p>C13N Group vous propose des aménagements en adéquation avec la politique RSE de votre entreprise, pour le respect de l’environnement (énergies renouvelables, matériaux bio ou géo-sourcés, bas carbone, recyclés ou issus du réemploi) et de la santé (ergonomie, confort, luminosité).</p>
    HTML,

    <<<HTML
      <h4>La labélisation</h4>
      <p>En tant que leviers essentiels pour l'obtention de financements et d'autorisations, les critères objectifs de la labélisation sont intégrés dès les premières étapes de la conception et sont suivis en fil rouge pendant toute la durée de l'opération. BREAM, Biodivercity, WELL, certification HQE bâtiment durable, E+C-... sont autant de labels qui mettront votre outil de travail en cohérence avec vos ambitions en termes d'environnement, de performances énergétiques et de qualité de vie au travail. La labélisation des bâtiments constitue un attrait pour vos collaborateurs et un curseur de valeur pour vos clients et investisseurs.</p>
    HTML,

    <<<HTML
      <h4>Le changement de modèle</h4>
      <p>Soucieux de la durabilité des constructions, C13N Group propose des solutions structurelles et architecturales alternatives à l'immobilier d'entreprise tels qu'il se pratique depuis des décennies. Pierre de taille, pisé, bois... pourront être envisagés si le contexte s'y prête.</p>
    HTML
  ];
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
