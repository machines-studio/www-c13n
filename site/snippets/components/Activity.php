<?php
  $item ??= null;
  if (!$item) return;

  snippet('html/link', [
    'url' => $item->url(),
    'title' => [
      Html::tag('span', $item->title()),
      snippet('svg/activities/' . $item->uid(), [], true)
    ],
    'attributes' => ['class' => 'activity']
  ]);
