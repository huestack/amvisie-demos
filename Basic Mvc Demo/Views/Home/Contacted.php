<?php

use \Huestack\Demo\Resources\ContactResource;

$this->useModel(Huestack\Demo\Models\ContactModel::class);
?>
<h1>
    <?= ContactResource::header(); ?>
</h1>
<div>
    <?php $this->response->text(ContactResource::mailSent(), $this->model->name); ?>
</div>