<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FishingResult $fishingResult
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $fishingResult->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $fishingResult->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Fishing Results'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Weathers'), ['controller' => 'Weathers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Weather'), ['controller' => 'Weathers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Prefectures'), ['controller' => 'Prefectures', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Prefecture'), ['controller' => 'Prefectures', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fishing Types'), ['controller' => 'FishingTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fishing Type'), ['controller' => 'FishingTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fishingResults form large-9 medium-8 columns content">
    <?= $this->Form->create($fishingResult) ?>
    <fieldset>
        <legend><?= __('Edit Fishing Result') ?></legend>
        <?php
            echo $this->Form->control('fishing_date');
            echo $this->Form->control('time_from', ['empty' => true]);
            echo $this->Form->control('time_to', ['empty' => true]);
            echo $this->Form->control('weather_id', ['options' => $weathers, 'empty' => true]);
            echo $this->Form->control('temperature');
            echo $this->Form->control('water_temperature');
            echo $this->Form->control('prefecture_id', ['options' => $prefectures, 'empty' => true]);
            echo $this->Form->control('city');
            echo $this->Form->control('spot');
            echo $this->Form->control('water_depth');
            echo $this->Form->control('water_depth_unit');
            echo $this->Form->control('fish_type');
            echo $this->Form->control('fish_caught_time', ['empty' => true]);
            echo $this->Form->control('length');
            echo $this->Form->control('length_unit');
            echo $this->Form->control('weight');
            echo $this->Form->control('weight_unit');
            echo $this->Form->control('quantity');
            echo $this->Form->control('fishing_type_id', ['options' => $fishingTypes, 'empty' => true]);
            echo $this->Form->control('lure_feed_name');
            echo $this->Form->control('lure_feed');
            echo $this->Form->control('note');
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
