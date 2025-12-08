<nav class='breadcrumb'>
  <ul>
    <?php foreach ($site->breadcrumb() as $crumb) : ?>
      <li>
        <?php snippet('html/link', $crumb) ?>
      </li>
    <?php endforeach ?>
  </ul>
</nav>
