<?php
use Huestack\Demo\Resources\HomeResource;

$this->setTitle("Home");
?>

<h1 class="cover-heading">Amvisie Web Demo.</h1>
<p class="lead"><?= HomeResource::get('description') ?></p>
<p class="lead">
  <a href="#" class="btn btn-lg btn-secondary"><?= HomeResource::get('learnCaption') ?></a>
</p>
<div>
    <?= $this->request->get('id')?>
</div>