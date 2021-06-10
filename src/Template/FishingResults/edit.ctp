<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FishingResult $fishingResult
 */
echo $this->Html->css('index');
echo $this->Html->css('ikenodesign');
?>
<!-- メニュー -->
<div class="h-menu">
     <input id="h-menu_checkbox" class="h-menuCheckbox" type="checkbox">
      <label class="h-menu_icon" for="h-menu_checkbox"><span class="hamburger-icon"></span></label>
      <label id="h-menu_black" class="h-menuCheckbox" for="h-menu_checkbox"></label>
      <div id="h-menu_content">
        <ul>
        <li><?= $this->Html->link(__('検索'), ['action' => 'find']) ?></li>
        <li><?= $this->Html->link(__('項目切替'), ['action' => 'filter']) ?></li>
        <li><?= $this->Html->link(__('釣果一覧'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('釣果登録'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('釣果修正'), ['action' => 'edit', $fishingResult->id]) ?> </li>
        <li><?= $this->Form->postLink(__('釣果削除'), ['action' => 'delete', $fishingResult->id], ['confirm' => __('釣果情報(No.{0}) を削除してよろしいでしょうか？', $fishingResult->id)]) ?> </li>
        </ul>
      </div>
</div>        

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
            echo $this->Form->control('time_from',['label' => '釣り開始時間', 'empty' => true]);
            echo $this->Form->control('time_to',['label' => '釣り終了時間', 'empty' => true]);

            echo $this->Form->control('weather_id', ['label' => '天気', 'options' => $weathers, 'empty' => true]);
            echo $this->Form->control('temperature',['label' => '気温', 'empty' => true]);
            echo $this->Form->control('water_temperature',['label' => '水温', 'empty' => true]);
            echo $this->Form->control('prefecture_id', ['label' => '都道府県', 'options' => $prefectures, 'empty' => true]);
            echo $this->Form->control('city',['label' => '市町村', 'empty' => true]);
            echo $this->Form->control('spot',['label' => 'スポット']);
            echo $this->Form->control('water_depth',['label' => '水深', 'empty' => true]);
            echo $this->Form->control('water_depth_unit',['label' => '水深の単位', 'options' => ["cm" => 'cm', "m" =>'m'], 'empty' => true]);
            echo $this->Form->control('fish_type',['label' => '魚種']);
            echo $this->Form->control('fish_caught_time',['label' => '釣った時間', 'empty' => true]);
            echo $this->Form->control('length',['label' => '長さ', 'empty' => true]);
            echo $this->Form->control('length_unit',['label' => '長さの単位', 'options' => ["cm" => 'cm', "m" =>'m'], 'empty' => true]);
            echo $this->Form->control('weight',['label' => '重さ', 'empty' => true]);
            echo $this->Form->control('weight_unit',['label' => '重さの単位', 'options' => ["g" => 'g', "kg" =>'kg'], 'empty' => true]);
            echo $this->Form->control('quantity',['label' => '匹数', 'empty' => true]);
            echo $this->Form->control('fishing_type_id', ['label' => '釣種', 'options' => $fishingTypes, 'empty' => true]);
            echo $this->Form->control('lure_feed_name',['label' => 'ルアー／えさ名称', 'empty' => true]);
            echo $this->Form->control('lure_feed',['label' => 'ルアー／えさ', 'options' => ["（えさ）" =>'（えさ）', "（ルアー）" =>'（ルアー）'], 'empty' => true]);
            echo $this->Form->control('note', ['label' => '備考', 'empty' => true]);
            echo $this->Form->control('user_id', ["type" => "hidden"] ); 
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>