<?php
/*@var $this \Amvisie\Core\Web\View */
/*@var $this->html \Amvisie\Core\Web\HtmlHelper */

use Huestack\Demo\Resources\LoginResource;

$this->useModel(\Huestack\Demo\Models\LoginModel::class);
?>
<h1><?= LoginResource::get('header')?></h1>
<div class="container">
    <?php $this->html->beginForm(); ?>
    <div class="form-group row">
        <?php $this->html->labelFor('email', array('class' => 'col-sm-2 col-form-label')); ?>
        <div class="col-sm-10">
            <?php 
                $this->html->emailFor('email', array('class' => 'form-control'));
                $this->html->validateMessage('email');
            ?>
        </div>
    </div>
    <div class="form-group row">
        <?php $this->html->labelFor('password', array('class' => 'col-sm-2 col-form-label')); ?>
        <div class="col-sm-10">
            <?php 
                $this->html->passwordFor('password', array('class' => 'form-control'));
                $this->html->validateMessage('password');
            ?>
        </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Sign in</button>
      </div>
    </div>
    <?php $this->html->endForm(); ?>
</div>