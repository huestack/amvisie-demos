<?php

/*@var $this \Amvisie\Core\Web\View */
/*@var $this->html \Amvisie\Core\Web\HtmlHelper */

use Huestack\Demo\Resources\ContactResource;

$this->useModel(\Huestack\Demo\Models\ContactModel::class);

?>
<?php  ?>
<h1><?= ContactResource::get('header'); ?></h1>
<div class="reset-align">
    <?php $this->html->beginForm('contact', 'home', array('enctype' => 'multipart/form-data'));?>
    <div class="form-group">
    <?php
    $this->html->labelFor('name');
    $this->html->textBoxFor('name',  array('class' => 'form-control'));
    $this->html->validateMessage('name');
     ?>
    </div>
    <div class="form-group">
    <?php
    $this->html->labelFor('email');
    $this->html->emailFor('email',  array('class' => 'form-control'));
    $this->html->validateMessage('email');
     ?>
    </div>
    <div class="form-group">
    <?php
    $this->html->labelFor('message');
    $this->html->textAreaFor('message',  array('class' => 'form-control', 'rows' => 5));
    $this->html->validateMessage('message');
     ?>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-secondary">Send</button>
    </div>
    <?php $this->html->endForm();?>
</div>

<?php $this->startSection('script'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
<script>
    window.onload = function(){
        $("form").validate();
    }
</script>
<?php $this->endSection(); ?>