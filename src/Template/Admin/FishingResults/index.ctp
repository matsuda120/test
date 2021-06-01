<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FishingResult[]|\Cake\Collection\CollectionInterface $fishingResults
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Fishing Result'), ['action' => 'add']) ?></li>
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
<div class="fishingResults index large-9 medium-8 columns content">
    <h3><?= __('Fishing Results') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fishing_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('time_from') ?></th>
                <th scope="col"><?= $this->Paginator->sort('time_to') ?></th>
                <th scope="col"><?= $this->Paginator->sort('weather_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('temperature') ?></th>
                <th scope="col"><?= $this->Paginator->sort('water_temperature') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prefecture_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('city') ?></th>
                <th scope="col"><?= $this->Paginator->sort('spot') ?></th>
                <th scope="col"><?= $this->Paginator->sort('water_depth') ?></th>
                <th scope="col"><?= $this->Paginator->sort('water_depth_unit') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fish_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fish_caught_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('length') ?></th>
                <th scope="col"><?= $this->Paginator->sort('length_unit') ?></th>
                <th scope="col"><?= $this->Paginator->sort('weight') ?></th>
                <th scope="col"><?= $this->Paginator->sort('weight_unit') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fishing_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lure_feed_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lure_feed') ?></th>
                <th scope="col"><?= $this->Paginator->sort('note') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fishingResults as $fishingResult): ?>
            <tr>
                <td><?= $this->Number->format($fishingResult->id) ?></td>
                <td><?= h($fishingResult->fishing_date) ?></td>
                <td><?= h($fishingResult->time_from) ?></td>
                <td><?= h($fishingResult->time_to) ?></td>
                <td><?= $fishingResult->has('weather') ? $this->Html->link($fishingResult->weather->title, ['controller' => 'Weathers', 'action' => 'view', $fishingResult->weather->id]) : '' ?></td>
                <td><?= $this->Number->format($fishingResult->temperature) ?></td>
                <td><?= $this->Number->format($fishingResult->water_temperature) ?></td>
                <td><?= $fishingResult->has('prefecture') ? $this->Html->link($fishingResult->prefecture->title, ['controller' => 'Prefectures', 'action' => 'view', $fishingResult->prefecture->id]) : '' ?></td>
                <td><?= h($fishingResult->city) ?></td>
                <td><?= h($fishingResult->spot) ?></td>
                <td><?= $this->Number->format($fishingResult->water_depth) ?></td>
                <td><?= h($fishingResult->water_depth_unit) ?></td>
                <td><?= h($fishingResult->fish_type) ?></td>
                <td><?= h($fishingResult->fish_caught_time) ?></td>
                <td><?= $this->Number->format($fishingResult->length) ?></td>
                <td><?= h($fishingResult->length_unit) ?></td>
                <td><?= $this->Number->format($fishingResult->weight) ?></td>
                <td><?= h($fishingResult->weight_unit) ?></td>
                <td><?= $this->Number->format($fishingResult->quantity) ?></td>
                <td><?= $fishingResult->has('fishing_type') ? $this->Html->link($fishingResult->fishing_type->title, ['controller' => 'FishingTypes', 'action' => 'view', $fishingResult->fishing_type->id]) : '' ?></td>
                <td><?= h($fishingResult->lure_feed_name) ?></td>
                <td><?= h($fishingResult->lure_feed) ?></td>
                <td><?= h($fishingResult->note) ?></td>
                <td><?= $fishingResult->has('user') ? $this->Html->link($fishingResult->user->name, ['controller' => 'Users', 'action' => 'view', $fishingResult->user->id]) : '' ?></td>
                <td><?= h($fishingResult->created) ?></td>
                <td><?= h($fishingResult->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $fishingResult->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $fishingResult->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $fishingResult->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fishingResult->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
