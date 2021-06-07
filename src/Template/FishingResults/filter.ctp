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
        <li><?= $this->Html->link(__('検索'), ['action' => 'find']) ?></li>
        <li><?= $this->Html->link(__('項目切替'), ['action' => 'filter']) ?></li>  
        <li><?= $this->Html->link(__('釣果一覧'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('釣果登録'), ['action' => 'add']) ?> </li>
    </ul>
</nav>

<div class="fishingResults form large-9 medium-8 columns content">

    <!-- 画面タイトル -->
    <h3><?= __('釣果登録') ?></h3>

    <?= $this->Form->create($fishingResult) ?>
    <fieldset>
        <legend><?= 'ここに何書こう？' ?></legend>
        <?php

            echo $this->Form->label('fishing_date', '日付', ['class' => 'custom-control-label']); 
            echo $this->Form->text('fishing_date', ['type' => 'date', 'class' => 'custom-control-text']);
            
            echo $this->Form->label('time_from', '釣り開始時間', ['class' => 'custom-control-label']); 
            echo $this->Form->text('time_from', ['type' => 'time', 'class' => 'custom-control-text']);

            echo $this->Form->label('time_to', '釣り終了時間', ['class' => 'custom-control-label']); 
            echo $this->Form->text('time_to', ['type' => 'time', 'class' => 'custom-control-text']);

            echo $this->Form->control('weather_id', ['type' => 'datalistJs', 'label' => '天気', 'options' => $weathers, 'empty' => true]);
            echo $this->Form->control('temperature',['label' => '気温']);
            echo $this->Form->control('water_temperature',['label' => '水温']);
            echo $this->Form->control('prefecture_id', ['type' => 'datalistJs', 'label' => '都道府県', 'options' => $prefectures, 'empty' => true]);
            echo $this->Form->control('city',['type' => 'datalistJs', 'label' => '市町村', 'options' => $cityLists, 'empty' => true]);
            echo $this->Form->control('spot',['type' => 'datalistJs', 'label' => 'スポット', 'options' => $spotLists, 'empty' => true]);
            echo $this->Form->control('water_depth',['label' => '水深']);
            echo $this->Form->control('water_depth_unit',['label' => '水深の単位', 'options' => $unitMLists, 'empty' => true]);
            echo $this->Form->control('fish_type',['type' => 'datalistJs', 'label' => '魚種', 'options' => $fishLists, 'empty' => true]);
            echo $this->Form->control('fish_caught_time',['label' => '釣った時間']);
            echo $this->Form->control('length',['label' => '長さ']);
            echo $this->Form->control('length_unit',['label' => '長さの単位', 'options' => $unitMLists, 'empty' => true]);
            echo $this->Form->control('weight',['label' => '重さ']);
            echo $this->Form->control('length_unit',['label' => '重さの単位', 'options' => $unitGLists, 'empty' => true]);
            echo $this->Form->control('quantity',['label' => '匹数']);
            echo $this->Form->control('fishing_type_id', ['type' => 'datalistJs', 'label' => '釣種', 'options' => $fishingTypes, 'empty' => true]);
            echo $this->Form->control('lure_feed', ['type' => 'datalistJs', 'label' => 'ルアー／えさ', 'options' => $lureFeedLists, 'empty' => true]);
            echo $this->Form->control('lure_feed_name',['type' => 'datalistJs', 'label' => 'ルアー／えさ名称', 'options' => $lureFeedNameLists, 'empty' => true]);
            echo $this->Form->control('note',['label' => '備考']);
            $this->Form->control('user_id');
        
            //空白のままか説明書きをするか
            //'empty' => '選択してください'

            //アドミン権限？
            //echo $this->Form->control($this->request->getSession()->read('Auth.User.userid'));

        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
