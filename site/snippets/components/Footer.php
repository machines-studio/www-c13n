<?php
  // TODO[dyanmic]
  $left = $site->footerLeft()->kirbytext();
  $right = $site->footerRight()->kirbytext();

  $items = [
    page('legals'),
    page('sitemap'),
    tt('footer.copyright', ['year' => 2025])
  ];

?>

<?php snippet('components/Section', [
  'tag' => 'footer',
  'attributes' => [
    'class' => 'footer'
  ]
], slots: true) ?>
  <?php slot('title') ?>
    <?php snippet('html/link', [
      'url' => page('contact')?->url(),
      'title' => t('footer.contact'),
      'active' => page('contact')?->isActive(),
      'attributes' => [
        'id' => 'contact'
      ]
    ]) ?>
  <?php endslot() ?>

  <?php slot('content') ?>
    <div class='footer__content'>
      <div class='footer__main'>
        <div class='footer__left'><?= $left ?></div>
        <div class='footer__right'>
          <?= $right ?>
          <div class='footer__socials'>
            <?php snippet('html/link', [
              // TODO[panel]
              'url' => 'https://instagram.com/example',
              'title' => snippet('svg/instagram', [], true)
            ]) ?>

            <?php snippet('html/link', [
              // TODO[panel]
              'url' => 'https://linkedin.com/example',
              'title' => snippet('svg/linkedin', [], true)
            ]) ?>
          </div>
        </div>
      </div>

      <ul class='footer__links'>
        <?php foreach ($items as $item) : ?>
          <?php if (!$item) continue ?>
          <li class='footer__link'>
            <?= is_string($item)
              ? $item
              : snippet('html/link', $item, true)
            ?>
          </li>
        <?php endforeach ?>
      </ul>
    </div>

    <a href='#top'>
      <?php snippet('svg/logo') ?>
    </a>
  <?php endslot() ?>
<?php endsnippet() ?>
