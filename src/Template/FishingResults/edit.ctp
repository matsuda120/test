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
            echo $this->Form->control('fishing_date');
            echo $this->Form->control('time_from', ['empty' => true]);
            echo $this->Form->control('time_to', ['empty' => true]);
            echo $this->Form->control('weather_id', ['options' => $weathers, 'empty' => true]);
            echo $this->Form->control('temperature');
            echo $this->Form->control('water_temperature');
            echo $this->Form->control('prefecture_id', ['options' => $prefectures, 'empty' => true]);
            echo $this->Form->control('city');
            echo $this->Form->control('spot');
            echo $this->Form->control('water_depth');
            echo $this->Form->control('water_depth_unit');
            echo $this->Form->control('fish_type');
            echo $this->Form->control('fish_caught_time', ['empty' => true]);
            echo $this->Form->control('length');
            echo $this->Form->control('length_unit');
            echo $this->Form->control('weight');
            echo $this->Form->control('weight_unit');
            echo $this->Form->control('quantity');
            echo $this->Form->control('fishing_type_id', ['options' => $fishingTypes, 'empty' => true]);
            echo $this->Form->control('lure_feed_name');
            echo $this->Form->control('lure_feed');

            echo $this->Form->control('lure_feed');
            
            echo $this->Form->select(
                'lure_feed',
                ['（えさ）', '（ルアー）'],
                ['empty' => '選択してください'], ['default' => 'lure_feed']
            );
            


            $list = [
                [ 'text' => '（えさ）', 'value' => 1 ],
                [ 'text' => '（ルアー）', 'value' => 2 ],
            ];
            // セレクトボックス
            echo $this->Form->control('lure_feed', [
                'default' => 'lure_feed',
                'type' => 'select',
                'label' => 'ルアー？えさ？',
                'options' => $list,
                'multiple' => false,
                'empty' => '選択してください'
            ]);

            

            echo $this->Form->control('note');

        ?>
    </fieldset>
    <?= $this->Form->button(__('完了')) ?>
    <?= $this->Form->end() ?>
</div>



<!-- echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]); -->

