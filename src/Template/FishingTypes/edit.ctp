<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FishingType $fishingType
 */
?>

<div class="fishingTypes form large-3 medium-8 columns content">
    <?= $this->Form->create($fishingType) ?>
    <fieldset>
        <legend><?= __('修正フォーム') ?></legend>
        <?php
        echo $this->Form->control('title', ['label' => '']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('完了')) ?>
    <?= $this->Form->end() ?>
</div>

<div class="back large-12 medium-8 columns content">
    <?= $this->Html->link(__('戻る'), ['controller' => 'Users', 'action' => 'admin']) ?>
</div>