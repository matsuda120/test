<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FishingResult[]|\Cake\Collection\CollectionInterface $fishingResults
 */

?>

<!-- 【松浦　6/15】 -->

<div class="fishingResults form large-12 medium-8 columns content">

    <!-- 画面タイトル -->
    <h3><?= __('釣果表示項目切替') ?></h3>

    <?php if (!empty($results)) { ?>
        <p>
            <font color="#ff0000"><?= $msg1 ?></font>
        </p>
    <?php  } ?>

    <?= $this->Form->create() ?>
    <fieldset>

        <!-- 項目検索 -->

        <?= $this->Form->multiCheckbox('id', ['label' => '管理番号']); ?>
        <?= $this->Form->multiCheckbox('fishing_date', ['label' => '日付']); ?>
        <?= $this->Form->multiCheckbox('time_from', ['label' => '釣り開始時間']); ?>
        <?= $this->Form->multiCheckbox('time_to', ['label' => '釣り終了時間']); ?>
        <?= $this->Form->multiCheckbox('weather', ['label' => '天気']); ?>
        <?= $this->Form->multiCheckbox('', ['label' => '気温']); ?>
        <?= $this->Form->multiCheckbox('', ['label' => '水温']); ?>
        <?= $this->Form->multiCheckbox('prefecture', ['label' => '都道府県']); ?>
        <?= $this->Form->multiCheckbox('city', ['label' => '市町村']); ?>
        <?= $this->Form->multiCheckbox('spot', ['label' => 'スポット']); ?>
        <?= $this->Form->multiCheckbox('', ['label' => '水深']); ?>
        <?= $this->Form->multiCheckbox('fish_type', ['label' => '魚種']); ?>
        <?= $this->Form->multiCheckbox('', ['label' => '魚の長さ']); ?>
        <?= $this->Form->multiCheckbox('', ['label' => '魚の重さ']); ?>
        <?= $this->Form->multiCheckbox('', ['label' => '匹数']); ?>
        <?= $this->Form->multiCheckbox('fish_caught_time', ['label' => '釣った時間']); ?>
        <?= $this->Form->multiCheckbox('fishing_type', ['label' => '釣種']); ?>
        <?= $this->Form->multiCheckbox('lure_feed_name', ['label' => 'ルアー／えさ名称']); ?>
        <?= $this->Form->multiCheckbox('lure_feed', ['label' => 'ルアー／えさ']); ?>
        <?= $this->Form->multiCheckbox('userid', ['label' => 'ユーザーID']); ?>
        <?= $this->Form->button('表示切替') ?>
        <?= $this->Form->end() ?>
    </fieldset>
</div>



<div class="fishingResults filteresults large-12 medium-8 columns content">
    <?php if (!empty($results)) { ?>

        <!-- 画面タイトル -->
        <h3><?= __('検索結果') ?></h3>


    <?php } ?>
</div>