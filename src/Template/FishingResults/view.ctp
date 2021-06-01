<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FishingResult $fishingResult
 */
?>

<!-- メニューの記述 -->
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('メニュー') ?></li>
        <li><?= $this->Html->link(__('検索'), ['action' => 'search']) ?></li>
        <li><?= $this->Html->link(__('項目切替'), ['action' => 'columchange']) ?></li>
      
        <li><?= $this->Html->link(__('釣果一覧'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('釣果登録'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('釣果修正'), ['action' => 'edit', $fishingResult->id]) ?> </li>
        <li><?= $this->Form->postLink(__('釣果削除'), ['action' => 'delete', $fishingResult->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fishingResult->id)]) ?> </li>
        

        <!-- <li>?= $this->Html->link(__('List Weathers'), ['controller' => 'Weathers', 'action' => 'index']) ?> </li>
        <li>?= $this->Html->link(__('New Weather'), ['controller' => 'Weathers', 'action' => 'add']) ?> </li>
        <li>?= $this->Html->link(__('List Prefectures'), ['controller' => 'Prefectures', 'action' => 'index']) ?> </li>
        <li>?= $this->Html->link(__('New Prefecture'), ['controller' => 'Prefectures', 'action' => 'add']) ?> </li>
        <li>?= $this->Html->link(__('List Fishing Types'), ['controller' => 'FishingTypes', 'action' => 'index']) ?> </li>
        <li>?= $this->Html->link(__('New Fishing Type'), ['controller' => 'FishingTypes', 'action' => 'add']) ?> </li>
        <li>?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li>?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li> -->
    </ul>
</nav>

<div class="fishingResults view large-9 medium-8 columns content">
    <h3><?= __('釣果詳細') ?></h3>
    <!-- <h3>?= h($fishingResult->id) ?></h3> -->

    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('日付') ?></th>
            <td><?= h($fishingResult->fishing_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('釣り開始時間') ?></th>
            <td><?= h($fishingResult->time_from) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('釣り終了時間') ?></th>
            <td><?= h($fishingResult->time_to) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('天気') ?></th>
            <td><?= $fishingResult->has('weather') ? $this->Html->link($fishingResult->weather->title, ['controller' => 'Weathers', 'action' => 'view', $fishingResult->weather->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('気温') ?></th>
            <td><?= $this->Number->format($fishingResult->temperature) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('水温') ?></th>
            <td><?= $this->Number->format($fishingResult->water_temperature) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('都道府県') ?></th>
            <td><?= $fishingResult->has('prefecture') ? $this->Html->link($fishingResult->prefecture->title, ['controller' => 'Prefectures', 'action' => 'view', $fishingResult->prefecture->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('市町村') ?></th>
            <td><?= h($fishingResult->city) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('スポット') ?></th>
            <td><?= h($fishingResult->spot) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('水深') ?></th>
            <td><?= $this->Number->format($fishingResult->water_depth) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('水深の単位') ?></th>
            <td><?= h($fishingResult->water_depth_unit) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('魚種') ?></th>
            <td><?= h($fishingResult->fish_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('釣った時間') ?></th>
            <td><?= h($fishingResult->fish_caught_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('長さ') ?></th>
            <td><?= $this->Number->format($fishingResult->length) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('長さの単位') ?></th>
            <td><?= h($fishingResult->length_unit) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('重さ') ?></th>
            <td><?= $this->Number->format($fishingResult->weight) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('重さの単位') ?></th>
            <td><?= h($fishingResult->weight_unit) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('匹数') ?></th>
            <td><?= $this->Number->format($fishingResult->quantity) ?></td>
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
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($fishingResult->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($fishingResult->modified) ?></td>
        </tr>
    </table>
</div>
