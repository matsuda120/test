<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FishingResult $fishingResult
 */
?>

<!-- メニュー -->
<nav class="large-3 medium-4 columns" id="actions-sidebar">
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

<div class="fishingResults form large-9 medium-8 columns content">
    
    <!-- 画面タイトル -->
    <h3><?= __('釣果修正') ?></h3>
    
    <!-- 釣果　修正　フォーム -->
    <?= $this->Form->create($fishingResult) ?>
    <fieldset>
        <legend><?= '管理番号 ： '.h($fishingResult->id) ?></legend>
        <?php

            echo $this->Form->control('fishing_date', [
                'label' => '日付',
                'required' => true,
                'monthNames' => false,
                'minYear' => date('Y')-1,
                'maxYear' => date('Y'),
            ]);

            echo $this->Form->control('time_from',['label' => '釣り開始時間']);
            echo $this->Form->control('time_to',['label' => '釣り終了時間']);
            echo $this->Form->control('weather_id', ['label' => '天気', 'options' => $weathers, 'empty' => true]);
            echo $this->Form->control('temperature',['label' => '気温']);
            echo $this->Form->control('water_temperature',['label' => '水温']);
            echo $this->Form->control('prefecture_id', ['label' => '都道府県', 'options' => $prefectures, 'empty' => true]);
            echo $this->Form->control('city',['type' => 'datalistJs', 'label' => '市町村', 'options' => $cityLists, 'empty' => true]);
            echo $this->Form->control('spot',['type' => 'datalistJs', 'label' => 'スポット', 'options' => $spotLists, 'empty' => true]);
            echo $this->Form->control('water_depth',['label' => '水深']);
            echo $this->Form->control('water_depth_unit',['label' => '水深の単位', 'options' => $unitMLists]);
            echo $this->Form->control('fish_type',['type' => 'datalistJs', 'label' => '魚種', 'options' => $fishLists, 'empty' => true]);
            echo $this->Form->control('fish_caught_time',['label' => '釣った時間']);
            echo $this->Form->control('length',['label' => '長さ']);
            echo $this->Form->control('length_unit',['label' => '長さの単位', 'options' => $unitMLists]);
            echo $this->Form->control('weight',['label' => '重さ']);
            echo $this->Form->control('weight_unit',['label' => '重さの単位', 'options' => $unitGLists]);
            echo $this->Form->control('quantity',['label' => '匹数']);
            echo $this->Form->control('fishing_type_id', ['options' => $fishingTypes, 'empty' => true]);
            echo $this->Form->control('lure_feed_name',['type' => 'datalistJs', 'label' => 'ルアー／えさ名称', 'options' => $lureFeedNameLists, 'empty' => true]);
            echo $this->Form->control('lure_feed',['label' => 'ルアー／えさ', 'options' => $lureFeedLists]);
            echo $this->Form->control('note',['label' => '備考']);

            //ユーザーIDは出力しない
            $this->Form->control('user_id', ['options' => $users, 'empty' => true]); 

        ?>
    </fieldset>
    <?= $this->Form->button(__('完了')) ?>
    <?= $this->Form->end() ?>
</div>