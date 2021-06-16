<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>

<!--  【松浦　6/16】 -->

<div class="users index large-9 medium-8 columns content">
    <?= $this->Html->link(__('戻る'), ['controller' => 'FishingResults', 'action' => 'index']) ?>
</div>

<!-- 
<div class="users index large-9 medium-8 columns content">
    <h3>?= __('釣果情報一覧') ?></h3>

    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col">?= $this->Paginator->sort('id') ?></th>
                <th scope="col">?= $this->Paginator->sort('userid') ?></th>
                <th scope="col">?= $this->Paginator->sort('name') ?></th>
                <th scope="col">?= $this->Paginator->sort('age') ?></th>
                <th scope="col">?= $this->Paginator->sort('fishing_history') ?></th>
                <th scope="col">?= $this->Paginator->sort('email') ?></th>
                <th scope="col">?= $this->Paginator->sort('password') ?></th>
                <th scope="col" class="actions">?= __('Actions') ?></th>
            </tr>
        </thead>

        <tbody>
            ?php foreach ($users as $user) : ?>
                <tr>
                    <td>?= $this->Number->format($user->id) ?></td>
                    <td>?= h($user->userid) ?></td>
                    <td>?= h($user->name) ?></td>
                    <td>?= $this->Number->format($user->age) ?></td>
                    <td>?= h($user->fishing_history) ?></td>
                    <td>?= h($user->email) ?></td>
                    <td>?= h($user->password) ?></td>
                    <td class="actions">
                        ?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                        ?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                        ?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                    </td>
                </tr>
            ?php endforeach; ?>
        </tbody>

    </table>

    <div class="paginator">
        <ul class="pagination">
            ?= $this->Paginator->first('<< ' . __('first')) ?>
            ?= $this->Paginator->prev('< ' . __('previous')) ?>
            ?= $this->Paginator->numbers() ?>
            ?= $this->Paginator->next(__('next') . ' >') ?>
            ?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p>?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>

</div> -->