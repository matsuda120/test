<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Weather $weather
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $weather->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $weather->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Weathers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Fishing Results'), ['controller' => 'FishingResults', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fishing Result'), ['controller' => 'FishingResults', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="weathers form large-9 medium-8 columns content">
    <?= $this->Form->create($weather) ?>
    <fieldset>
        <legend><?= __('Edit Weather') ?></legend>
        <?php
            echo $this->Form->control('title');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
