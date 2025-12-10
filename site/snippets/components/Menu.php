<a
  id='home'
  href='<?= $site->url() ?>'
  title='<?= t('menu.go-home') ?>'
  class='<?= r($page->isHomepage(), 'is-active') ?>'
  >
  <?php snippet('svg/logo') ?>
</a>

<nav class='menu'>
  <div class='menu__wrapper'>
    <menu class='menu__items'>
      <?php foreach ($site->children()->listed() as $child) : ?>
        <li class='menu__item'>
          <?php snippet('html/link', $child) ?>
        </li>
      <?php endforeach ?>
    </menu>
  </div>
</nav>
