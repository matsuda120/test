<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FishingType[]|\Cake\Collection\CollectionInterface $fishingTypes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Fishing Type'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fishing Results'), ['controller' => 'FishingResults', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fishing Result'), ['controller' => 'FishingResults', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fishingTypes index large-9 medium-8 columns content">
    <h3><?= __('Fishing Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fishingTypes as $fishingType): ?>
            <tr>
                <td><?= $this->Number->format($fishingType->id) ?></td>
                <td><?= h($fishingType->title) ?></td>
                <td><?= h($fishingType->created) ?></td>
                <td><?= h($fishingType->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $fishingType->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $fishingType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $fishingType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fishingType->id)]) ?>
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
