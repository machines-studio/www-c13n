<?php
  $uid = uniqid();
  $image ??= null;
  $mask ??= 1;
  if (!$image) return;
?>

<svg
  class='mask'
  data-mask='<?= $mask ?>'
  width='546'
  height='821'
  viewBox='0 -20 546 841'
  fill='none'
  xmlns='http://www.w3.org/2000/svg'
  xmlns:xlink='http://www.w3.org/1999/xlink'
>
  <path fill='url(#pattern_<?= $uid ?>_1)' d='M272.505 112C422.347 112 544 233.982 544 384.229V820H1V384.239C1 233.982 122.653 112 272.505 112Z' stroke='currentColor' stroke-miterlimit='10'/>
  <path fill='url(#pattern_<?= $uid ?>_2)' d='M38.3587 410.51C14.6077 450.866 0.999972 497.899 0.999972 548.104C0.999972 698.27 122.779 820 272.995 820C423.211 820 545 698.27 545 548.104C545 497.899 531.382 450.866 507.641 410.51C531.382 370.144 545 323.111 545 272.896C545 122.73 423.221 1 272.995 1C122.769 1 0.999972 122.73 0.999972 272.896C0.999972 323.111 14.6177 370.144 38.3587 410.51Z' stroke='currentColor' stroke-miterlimit='10'/>

  <defs>
    <pattern id='pattern_<?= $uid ?>_1' width='1' height='1'>
      <use xlink:href='#image_<?= $uid ?>' />
    </pattern>

    <pattern id='pattern_<?= $uid ?>_2' width='1' height='1'>
      <use xlink:href='#image_<?= $uid ?>' />
    </pattern>

    <image
      id='image_<?= $uid ?>'
      width='100%'
      preserveAspectRatio='none'
      xlink:href='<?= $image->url() ?>'
    />
  </defs>
</svg>
