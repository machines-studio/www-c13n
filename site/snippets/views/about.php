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
  snippet('components/Section', slots: true);
    slot('content');
      snippet('components/Breadcrumb');
      echo Html::tag('h2', $page->title());
    endslot();
  endsnippet();
?>

<?php
  snippet('components/Section', [
    'title' => 'Qui sommes-nous ?', // TODO[panel]
    'columns' => 2,
    'attributes' => ['class' => 'section--about prose',]
  ], slots: true);
    slot('content');
      echo Html::div([$about]);
      snippet('components/Mask', [
        'image' => $page->images()->first(),
        'mask' => 1
      ]);
    endslot();
  endsnippet();
?>

<?php
  snippet('components/Section', [
    'title' => 'Nos engagements', // TODO[panel]
    'columns' => 3,
    'attributes' => ['class' => 'section--engagements prose']
  ], slots: true);
    slot('content');
      // TODO[panel]
      echo Html::div([$engagements[0]]);
      echo Html::div([$engagements[1]]);
      echo Html::div([$engagements[2]]);
    endslot();
  endsnippet();
?>

<?php
  snippet('components/Section', [
    'title' => 'Notre méthode', // TODO[panel]
    'columns' => 2,
    'attributes' => ['class' => 'section--method prose']
  ], slots: true);
    slot('content');
    // TODO[panel]
  ?>
    <div>
      <p>Votre cahier des charges est le point de départ de la conception de votre outil de travail. Les bâtiments que nous réalisons répondent à tous les enjeux de fonctionnalité, de sécurité et de réglementation.</p>
      <?php snippet('components/Mask', [
        'image' => $page->images()->first(),
        'mask' => 2
      ]) ?>
    </div>

    <div>
      <p>En premières étapes de conception, nous établissons l’ensemble des besoins et contraintes de votre site, afin de développer une proposition multicritère en parfaite adéquation avec vos attentes :</p>
      <ul>
        <li>Types de produits</li>
        <li>Conditions de stockage ou de production (température de conservation, hygrométrie, inflammabilité, poids, lumière…)</li>
        <li>Effectifs</li>
        <li>Process de fabrication (machines de pointe, hautes températures, vibrations, bruit…)</li>
        <li>Chaîne d’approvisionnement ou stockage </li>
        <li>Mode d’acheminement des produits (poids lourds, fourgons, voitures, péniches, vélos cargos pour une plateforme dernier kilomètre)…</li>
      </ul>
      <p>La sécurité est un objectif invariant de la construction des sites productifs, qui sera respecté à toutes les étapes de l’opération.</p>
      <p>C13N Group est habilité à travailler sur des sites Seveso et sur les bâtiments soumis au risque technologique.</p>

      <h4>Pour faciliter votre prise de décision : la projection du ROI de votre opération</h4>
      <p>À partir de vos indicateurs de performance et de notre connaissance de différents secteurs d’activités (industrie, hôtellerie, tertiaire, logement…), nous évaluons votre retour sur investissement. Ce calcul intègre aussi bien le coût de construction, de fonctionnement et d’entretien, que votre gain de productivité et de chiffre d’affaires. C’est une précieuse aide à la décision pour vos comités d’investissement.</p>
    </div>
  <?php
    endslot();
  endsnippet();
?>
