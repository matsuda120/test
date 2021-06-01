<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FishingResult $fishingResult
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Fishing Result'), ['action' => 'edit', $fishingResult->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Fishing Result'), ['action' => 'delete', $fishingResult->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fishingResult->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Fishing Results'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fishing Result'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Weathers'), ['controller' => 'Weathers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Weather'), ['controller' => 'Weathers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Prefectures'), ['controller' => 'Prefectures', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Prefecture'), ['controller' => 'Prefectures', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Fishing Types'), ['controller' => 'FishingTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fishing Type'), ['controller' => 'FishingTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="fishingResults view large-9 medium-8 columns content">
    <h3><?= h($fishingResult->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Weather') ?></th>
            <td><?= $fishingResult->has('weather') ? $this->Html->link($fishingResult->weather->title, ['controller' => 'Weathers', 'action' => 'view', $fishingResult->weather->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prefecture') ?></th>
            <td><?= $fishingResult->has('prefecture') ? $this->Html->link($fishingResult->prefecture->title, ['controller' => 'Prefectures', 'action' => 'view', $fishingResult->prefecture->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= h($fishingResult->city) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Spot') ?></th>
            <td><?= h($fishingResult->spot) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Water Depth Unit') ?></th>
            <td><?= h($fishingResult->water_depth_unit) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fish Type') ?></th>
            <td><?= h($fishingResult->fish_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Length Unit') ?></th>
            <td><?= h($fishingResult->length_unit) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Weight Unit') ?></th>
            <td><?= h($fishingResult->weight_unit) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fishing Type') ?></th>
            <td><?= $fishingResult->has('fishing_type') ? $this->Html->link($fishingResult->fishing_type->title, ['controller' => 'FishingTypes', 'action' => 'view', $fishingResult->fishing_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lure Feed Name') ?></th>
            <td><?= h($fishingResult->lure_feed_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lure Feed') ?></th>
            <td><?= h($fishingResult->lure_feed) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Note') ?></th>
            <td><?= h($fishingResult->note) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $fishingResult->has('user') ? $this->Html->link($fishingResult->user->name, ['controller' => 'Users', 'action' => 'view', $fishingResult->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($fishingResult->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Temperature') ?></th>
            <td><?= $this->Number->format($fishingResult->temperature) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Water Temperature') ?></th>
            <td><?= $this->Number->format($fishingResult->water_temperature) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Water Depth') ?></th>
            <td><?= $this->Number->format($fishingResult->water_depth) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Length') ?></th>
            <td><?= $this->Number->format($fishingResult->length) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Weight') ?></th>
            <td><?= $this->Number->format($fishingResult->weight) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($fishingResult->quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fishing Date') ?></th>
            <td><?= h($fishingResult->fishing_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Time From') ?></th>
            <td><?= h($fishingResult->time_from) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Time To') ?></th>
            <td><?= h($fishingResult->time_to) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fish Caught Time') ?></th>
            <td><?= h($fishingResult->fish_caught_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($fishingResult->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($fishingResult->modified) ?></td>
        </tr>
    </table>
</div>
