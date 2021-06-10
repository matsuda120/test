<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FishingResult $fishingResult
 */
?>

<!-- メニュー -->
<nav class="large-1 medium-1 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('メニュー') ?></li>
        <li><?= $this->Html->link(__('検索'), ['action' => 'search']) ?></li>
        <li><?= $this->Html->link(__('項目切替'), ['action' => 'columchange']) ?></li>  
        <li><?= $this->Html->link(__('釣果一覧'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('釣果登録'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('釣果修正'), ['action' => 'edit', $fishingResult->id]) ?> </li>
        <li><?= $this->Form->postLink(__('釣果削除'), ['action' => 'delete', $fishingResult->id], ['confirm' => __('釣果情報(No.{0}) を削除してよろしいでしょうか？', $fishingResult->id)]) ?> </li>        
    </ul>
</nav>

<div class="fishingResults view large-11 medium-8 columns content">
    
    <!-- 画面タイトル -->
    <h3><?= __('釣果詳細') ?></h3>

    <!-- 釣果　詳細　テーブル -->
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('管理番号') ?></th>
            <td><?= $this->Number->format($fishingResult->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('日付') ?></th>
            <td><?= h($fishingResult->fishing_date->i18nFormat('yyyy年MM月dd日')) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('釣り開始時間') ?></th>
            <td><?= h($fishingResult->time_from->i18nFormat('HH:mm')) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('釣り終了時間') ?></th>
            <td><?= h($fishingResult->time_to->i18nFormat('HH:mm')) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('天気') ?></th>
            <td><?= h($fishingResult->weather->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('気温') ?></th>
            <td><?= $this->Number->format($fishingResult->temperature) ?>℃</td>
        </tr>
        <tr>
            <th scope="row"><?= __('水温') ?></th>
            <td><?= $this->Number->format($fishingResult->water_temperature) ?>℃</td>
        </tr>
        <tr>
            <th scope="row"><?= __('都道府県') ?></th>
            <td><?= h($fishingResult->prefecture->title) ?></td>
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
            <td><?= h($fishingResult->fish_caught_time->i18nFormat('HH:mm')) ?></td>
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
            <th scope="row"><?= __('釣種') ?></th>
            <td><?= h($fishingResult->fishing_type->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ルアー／えさ名称') ?></th>
            <td><?= h($fishingResult->lure_feed_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ルアー／えさ') ?></th>
            <td><?= h($fishingResult->lure_feed) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('備考') ?></th>
            <td><?= h($fishingResult->note) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ユーザーID') ?></th>
            <td><?= h($fishingResult->user->userid) ?></td>
        </tr>
        
    </table>

    <!-- 元のページに戻る -->

    <!-- <div>
    <h3>Delete Person</h3>
    ?= $this->Form->create($person) ?>
    <fieldset>
        <p>ID: ?= h($person->id); ?></p>
        <p>NAME: ?= h($person->name); ?></p>
        <p>AGE: ?= h($person->age); ?></p>
        <p>MAIL: ?= h($person->mail); ?></p>
   </fieldset>
    ?= $this->Form->button('Submit') ?>
    ?= $this->Form->end() ?>
</div> -->


</div>
