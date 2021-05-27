<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Prefecture $prefecture
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Prefectures'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Fishing Results'), ['controller' => 'FishingResults', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fishing Result'), ['controller' => 'FishingResults', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="prefectures form large-9 medium-8 columns content">
    <?= $this->Form->create($prefecture) ?>
    <fieldset>
        <legend><?= __('Add Prefecture') ?></legend>
        <?php
            echo $this->Form->control('title');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
