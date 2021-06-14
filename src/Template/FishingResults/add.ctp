<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FishingResult $fishingResult
 */
?>

<!-- 【松浦　6/14】 -->

<div class="fishingResults form large-12 medium-8columns content">

    <!-- 画面タイトル -->
    <h3><?= __('釣果登録') ?></h3>

    <?= $this->Form->create($fishingResult) ?>
    <fieldset>
        <legend><?= '' ?></legend>
        <?php

        echo $this->Form->label('fishing_date', '日付', ['class' => 'custom-control-label']);
        echo $this->Form->text('fishing_date', ['type' => 'date', 'class' => 'custom-control-text']);

        echo $this->Form->label('time_from', '釣り開始時間', ['class' => 'custom-control-label']);
        echo $this->Form->text('time_from', ['type' => 'time', 'class' => 'custom-control-text', 'empty' => true]);

        echo $this->Form->label('time_to', '釣り終了時間', ['class' => 'custom-control-label']);
        echo $this->Form->text('time_to', ['type' => 'time', 'class' => 'custom-control-text', 'empty' => true]);

        echo $this->Form->control('weather_id', ['type' => 'datalistJs', 'label' => '天気', 'options' => $weathers, 'empty' => true]);
        echo $this->Form->control('temperature', ['label' => '気温', 'empty' => true]);
        echo $this->Form->control('water_temperature', ['label' => '水温', 'empty' => true]);
        echo $this->Form->control('prefecture_id', ['type' => 'datalistJs', 'label' => '都道府県', 'options' => $prefectures, 'empty' => true]);
        echo $this->Form->control('city', ['type' => 'datalistJs', 'label' => '市町村', 'options' => $cityLists, 'empty' => true]);
        echo $this->Form->control('spot', ['type' => 'datalistJs', 'label' => 'スポット', 'options' => $spotLists]);
        echo $this->Form->control('water_depth', ['label' => '水深', 'empty' => true]);
        echo $this->Form->control('water_depth_unit', ['type' => 'select', 'label' => '水深の単位', 'options' => ["cm" => 'cm', "m" => 'm'], 'empty' => true]);
        echo $this->Form->control('fish_type', ['type' => 'datalistJs', 'options' => $fishLists, 'label' => '魚種']);

        echo $this->Form->label('fish_caught_time', '釣った時間', ['class' => 'custom-control-label']);
        echo $this->Form->text('fish_caught_time', ['type' => 'time', 'class' => 'custom-control-text', 'empty' => true]);

        echo $this->Form->control('length', ['label' => '長さ', 'empty' => true]);
        echo $this->Form->control('length_unit', ['type' => 'select', 'label' => '長さの単位', 'options' => ["cm" => 'cm', "m" => 'm'], 'empty' => true]);
        echo $this->Form->control('weight', ['label' => '重さ', 'empty' => true]);
        echo $this->Form->control('weight_unit', ['type' => 'select', 'label' => '重さの単位', 'options' => ["g" => 'g', "kg" => 'kg'], 'empty' => true]);
        echo $this->Form->control('quantity', ['label' => '匹数', 'empty' => true]);
        echo $this->Form->control('fishing_type_id', ['label' => '釣種', 'options' => $fishingTypes, 'empty' => true]);
        echo $this->Form->control('lure_feed_name', ['type' => 'datalistJs', 'label' => 'ルアー／えさ名称', 'options' => $lureFeedNameLists, 'empty' => true]);
        echo $this->Form->control('lure_feed', ['type' => 'select', 'label' => 'ルアー／えさ', 'options' => ['（えさ）' => '（えさ）', "（ルアー）" => '（ルアー）'], 'empty' => true]);
        echo $this->Form->control('note', ['type' => 'textarea', 'label' => '備考', 'empty' => true]);
        echo $this->Form->control('user_id', ["type" => "hidden"]);

        //空白のままか説明書きをするか
        //'empty' => '選択してください'

        //アドミン権限？
        //echo $this->Form->control($this->request->getSession()->read('Auth.User.userid'));

        ?>
    </fieldset>
    <?= $this->Form->button(__('登録')) ?>
    <?= $this->Form->end() ?>
</div>