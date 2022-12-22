<?php

/** @var \Kirby\Cms\App $kirby */
/** @var \Kirby\Cms\Site $site */

$data = [
  // 'blocks' => page('angebote/yogadachs')->text()->toResolvedBlocks()->toArray(),
  'layouts' => page('ueber-uns')->layout()->toResolvedLayouts()->toArray(),
];

echo \Kirby\Data\Json::encode($data);
