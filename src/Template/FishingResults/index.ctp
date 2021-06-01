<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FishingResult[]|\Cake\Collection\CollectionInterface $fishingResults
 */
?>

<!-- メニューの記述 -->
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('メニュー') ?></li>
        <li><?= $this->Html->link(__('検索'), ['controller' => 'FishingResults', 'action' => 'search']) ?></li>
        <li><?= $this->Html->link(__('項目切替'), ['controller' => 'FishingResults', 'action' => 'columchange']) ?></li>
        <li><?= $this->Html->link(__('釣果登録'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('釣果修正'), ['action' => 'edit']) ?></li>
        <li><?= $this->Html->link(__('釣果削除'), ['action' => 'delete']) ?></li>
    </ul>
</nav>

<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading">?= __('Actions') ?></li>
        <li>?= $this->Html->link(__('New Fishing Result'), ['action' => 'add']) ?></li>
        <li>?= $this->Html->link(__('List Weathers'), ['controller' => 'Weathers', 'action' => 'index']) ?></li>
        <li>?= $this->Html->link(__('New Weather'), ['controller' => 'Weathers', 'action' => 'add']) ?></li>
        <li>?= $this->Html->link(__('List Prefectures'), ['controller' => 'Prefectures', 'action' => 'index']) ?></li>
        <li>?= $this->Html->link(__('New Prefecture'), ['controller' => 'Prefectures', 'action' => 'add']) ?></li>
        <li>?= $this->Html->link(__('List Fishing Types'), ['controller' => 'FishingTypes', 'action' => 'index']) ?></li>
        <li>?= $this->Html->link(__('New Fishing Type'), ['controller' => 'FishingTypes', 'action' => 'add']) ?></li>
        <li>?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li>?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav> -->

<!-- タイトル -->
<div class="fishingResults index large-9 medium-8 columns content">
    <h3><?= __('釣果一覧') ?></h3>
    
    <!-- 釣果一覧表示 -->
    <table cellpadding="0" cellspacing="0">
       
        <!-- 項目 -->
        <thead>
            <tr>
                <!-- <th scope="col">?= $this->Paginator->sort('id') ?></th> -->
                <th scope="col"><?= $this->Paginator->sort('日付') ?></th>
                <th scope="col"><?= $this->Paginator->sort('釣り開始時間') ?></th>
                <th scope="col"><?= $this->Paginator->sort('釣り終了時間') ?></th>
                <th scope="col"><?= $this->Paginator->sort('天気') ?></th>
                <th scope="col"><?= $this->Paginator->sort('気温') ?></th>
                <th scope="col"><?= $this->Paginator->sort('水温') ?></th>
                <th scope="col"><?= $this->Paginator->sort('都道府県') ?></th>
                <th scope="col"><?= $this->Paginator->sort('市町村') ?></th>
                <th scope="col"><?= $this->Paginator->sort('スポット') ?></th>
                <th scope="col"><?= $this->Paginator->sort('水深') ?></th>
                <th scope="col"><?= $this->Paginator->sort('水深の単位') ?></th>
                <th scope="col"><?= $this->Paginator->sort('魚種') ?></th>
                <th scope="col"><?= $this->Paginator->sort('釣った時間') ?></th>
                <th scope="col"><?= $this->Paginator->sort('長さ') ?></th>
                <th scope="col"><?= $this->Paginator->sort('長さの単位') ?></th>
                <th scope="col"><?= $this->Paginator->sort('重さ') ?></th>
                <th scope="col"><?= $this->Paginator->sort('重さの単位') ?></th>
                <th scope="col"><?= $this->Paginator->sort('匹数') ?></th>
                <th scope="col"><?= $this->Paginator->sort('釣種') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ルアー／えさ名称') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ルアー／えさ') ?></th>
                <th scope="col"><?= $this->Paginator->sort('備考') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ユーザーID') ?></th>
                <!-- <th scope="col">?= $this->Paginator->sort('created') ?></th> -->
                <!-- <th scope="col">?= $this->Paginator->sort('modified') ?></th> -->
                <th scope="col" class="actions"><?= __('☆') ?></th>
            </tr>
        </thead>
        
        <!-- 釣果一覧 -->
        <tbody>

            <!-- $userは配列だからforeachで展開 -->
            <!-- h($・・・)　→　htmlspecialchars関数 -->
            <?php foreach ($fishingResults as $fishingResult): ?>
            <tr>
                <!-- <td>?= $this->Number->format($fishingResult->id) ?></td> -->
                <td><?= h($fishingResult->fishing_date->i18nFormat('yyyy年MM月dd日')) ?></td>
                <td><?= h($fishingResult->time_from->i18nFormat('HH:mm')) ?></td>
                <td><?= h($fishingResult->time_to->i18nFormat('HH:mm')) ?></td>
                <td><?= $fishingResult->has('weather') ? $this->Html->link($fishingResult->weather->title, ['controller' => 'Weathers', 'action' => 'view', $fishingResult->weather->id]) : '' ?></td>
                <td><?= $this->Number->format($fishingResult->temperature) ?></td>
                <td><?= $this->Number->format($fishingResult->water_temperature) ?></td>
                <td><?= $fishingResult->has('prefecture') ? $this->Html->link($fishingResult->prefecture->title, ['controller' => 'Prefectures', 'action' => 'view', $fishingResult->prefecture->id]) : '' ?></td>
                <td><?= h($fishingResult->city) ?></td>
                <td><?= h($fishingResult->spot) ?></td>
                <td><?= $this->Number->format($fishingResult->water_depth) ?></td>
                <td><?= h($fishingResult->water_depth_unit) ?></td>
                <td><?= h($fishingResult->fish_type) ?></td>
                <td><?= h($fishingResult->fish_caught_time->i18nFormat('HH:mm')) ?></td>
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
                <!-- <td>?= h($fishingResult->created) ?></td> -->
                <!-- <td>?= h($fishingResult->modified) ?></td> -->
                <td class="☆">
                    <?= $this->Html->link(__('詳細'), ['action' => 'view', $fishingResult->id]) ?>
                    <?= $this->Html->link(__('修正'), ['action' => 'edit', $fishingResult->id]) ?>
                    <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $fishingResult->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fishingResult->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('≪')) ?>
            <?= $this->Paginator->prev('< ' . __('前ページ')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('次ページ') . ' >') ?>
            <?= $this->Paginator->last(__('≫') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
