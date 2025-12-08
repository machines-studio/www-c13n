<nav class='menu'>
  <div class='menu__wrapper'>
    <a
      id='home'
      href='<?= $site->url() ?>'
      title='<?= t('menu.go-home') ?>'
      class='<?= r($page->isHomepage(), 'is-active') ?>'
    >
      <?php snippet('svg/logo') ?>
    </a>

    <menu class='menu__items'>
      <?php foreach ($site->children()->listed() as $child) : ?>
        <li class='menu__item'>
          <?php snippet('html/link', $child) ?>
        </li>
      <?php endforeach ?>
    </menu>
  </div>
</nav>
