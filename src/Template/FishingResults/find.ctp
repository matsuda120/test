<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FishingResult[]|\Cake\Collection\CollectionInterface $fishingResults
 */
?>

<!-- メニュー -->
<nav class="large-1 medium-1 columns" id="actions-sidebar">
<ul class="side-nav">
        <li class="heading"><?= __('メニュー') ?></li>
        <li><?= $this->Html->link(__('検索'), ['action' => 'find']) ?></li>
        <li><?= $this->Html->link(__('項目切替'), ['action' => 'columchange']) ?></li>
        <li><?= $this->Html->link(__('釣果一覧'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('釣果登録'), ['action' => 'add']) ?> </li>
</nav>

<div class="fishingResults index large-11 medium-8 columns content">
    
    <!-- 画面タイトル -->
    <h3><?= __('釣果検索') ?></h3>
    <!-- ?= $msg ?> -->
    <?= $this->Form->create() ?>
    <fieldset>

        <!-- 項目検索 -->

        <?= $this->Form->label('fishing_date', '釣りをした日付：　入力された日付以降のデータが出力', ['class' => 'custom-control-label']);  ?>
        <?= $this->Form->text('fishing_date', ['type' => 'date', 'class' => 'custom-control-text']); ?>

        <?= $this->Form->label('time_from', '釣り開始時間：　入力された時間以降のデータが出力', ['class' => 'custom-control-label']);  ?>
        <?= $this->Form->text('time_from', ['type' => 'time', 'class' => 'custom-control-text', 'empty' => true]); ?>

        <?= $this->Form->control('prefecture', ['label' => '都道府県']); ?>
        <?= $this->Form->control('city', ['label' => '市町村']); ?>
        <?= $this->Form->control('spot', ['label' => 'スポット']); ?>
        <?= $this->Form->control('fish_type', ['label' => '魚種']); ?>

        <?= $this->Form->label('fish_caught_time', '釣った時間：　入力された時間以降のデータが出力', ['class' => 'custom-control-label']);  ?>
        <?= $this->Form->text('fish_caught_time', ['type' => 'time', 'class' => 'custom-control-text', 'empty' => true]); ?>

        <?= $this->Form->control('fishing_type', ['label' => '釣種']); ?>
        <?= $this->Form->control('lure_feed_name', ['label' => 'ルアー／えさ名称']); ?>
        <?= $this->Form->control('lure_feed', ['label' => 'ルアー／えさ']); ?>
        <?= $this->Form->control('userid', ['label' => 'ユーザーID']); ?>
       
        <!-- <= $this -> Form -> input  ( "unit", [ "type" => "select",
                                            　      "options" => [ "cm" => "cm", "m" => "m"], 
                                                    "empty" => true ] );?> -->
        
        <?= $this->Form->button('Submit') ?>
        <?= $this->Form->end() ?>
    </fieldset>

    <!-- 釣果　一覧表示　テーブル -->
    <table cellpadding="0" cellspacing="0"> 
        
        <!-- 釣果　一覧表示　項目 -->
        <thead>
            <tr>
                <th scope="col"><?= '管理番号' ?></th>
                <th scope="col"><?= '日付' ?></th>
                <th scope="col"><?= '釣り開始時間' ?></th>
                <th scope="col"><?= '釣り終了時間' ?></th>
                <th scope="col"><?= '天気' ?></th>
                <th scope="col"><?= '気温' ?></th>
                <th scope="col"><?= '水温' ?></th>
                <th scope="col"><?= '都道府県' ?></th>
                <th scope="col"><?= '市町村' ?></th>
                <th scope="col"><?= 'スポット' ?></th>
                <th scope="col"><?= '水深' ?></th>
                <th scope="col"><?= '水深の単位' ?></th>
                <th scope="col"><?= '魚種' ?></th>
                <th scope="col"><?= '長さ' ?></th>
                <th scope="col"><?= '長さの単位' ?></th>
                <th scope="col"><?= '重さ' ?></th>
                <th scope="col"><?= '重さの単位' ?></th>
                <th scope="col"><?= '匹数' ?></th>
                <th scope="col"><?= '魚種' ?></th>
                <th scope="col"><?= '釣種' ?></th>
                <th scope="col"><?= 'ルアー／えさ名称' ?></th>
                <th scope="col"><?= 'ルアー／えさ' ?></th>
                <th scope="col"><?= '備考' ?></th>
                <th scope="col"><?= 'ユーザーID' ?></th>
                <th scope="col" class="actions"><?= __('') ?></th>
            </tr>
        </thead>        

        <!-- 釣果　一覧　情報 -->
        <tbody>
            <!-- メモ -->
            <!-- $userは配列だからforeachで展開 -->　<!-- h($・・・)　→　htmlspecialchars関数 -->
            <?php if(!empty($results)){ ?>
            <?php foreach ($results as $fishingResult): ?>
                        
            <tr>
                <td><?= $this->Number->format($fishingResult->id) ?></td>
                <td><?= h($fishingResult->fishing_date->i18nFormat('yyyy年MM月dd日')) ?></td>
                <td><?= h($fishingResult->time_from->i18nFormat('HH:mm')) ?></td>
                <td><?= h($fishingResult->time_to->i18nFormat('HH:mm')) ?></td>
                <td><?= h($fishingResult->weather->title) ?></td>
                <td><?= $this->Number->format($fishingResult->temperature).'℃' ?></td>
                <td><?= $this->Number->format($fishingResult->water_temperature).'℃' ?></td>
                <td><?= h($fishingResult->prefecture->title) ?></td>
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
                <td><?= h($fishingResult->fishing_type->title) ?></td>
                <td><?= h($fishingResult->lure_feed_name) ?></td>
                <td><?= h($fishingResult->lure_feed) ?></td>
                <td><?= $this->Text->truncate(($fishingResult->note), 10, array(
                        'ellipsis' => '...', 'exact' => true, 'html' => true)) ?></td>
                <td><?= h($fishingResult->user->userid) ?></td>
                
                <td class="メニュー">
                    <?= $this->Html->link(__('詳細'), ['action' => 'view', $fishingResult->id]) ?>
                    <?= $this->Html->link(__('修正'), ['action' => 'edit', $fishingResult->id]) ?>
                    <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $fishingResult->id], ['confirm' => __('釣果情報(No.{0}) を削除してよろしいでしょうか？', $fishingResult->id)]) ?>        
                </td>

            </tr>
            <?php endforeach; ?>
            
            <?php } ?>
        </tbody>
    </table>

</div>