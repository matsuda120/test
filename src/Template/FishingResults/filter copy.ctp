<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FishingResult[]|\Cake\Collection\CollectionInterface $fishingResults
 */

?>

<!-- 【松浦　6/17】 -->

<script language="JavaScript">
    function a() {
        document.getElementById('t').style.visibility = "visible";
    }

    function b() {
        document.getElementById('t').style.visibility = "collapse";
    }
</script>

<form>
    <input type="button" value="表示" onclick="a()">
    <input type="button" value="非表示" onclick="b()">
</form>

<table border=1>
    <col span"1" id="t" style="visibility:collapse;">
    <tr>
        <th>題1</th>
        <th>題2</th>
    </tr>
    <tr>
        <td>データ1</td>
        <td>データ2</td>
    </tr>
</table>


<div class="fishingResults form large-12 medium-8 columns content">
    <h3><?= __('釣果表示項目切替') ?></h3>
    <?= $this->Form->create() ?>
    <fieldset>
        <?= $this->Form->multiCheckbox('id', ['label' => '管理番号']); ?>
        <?= $this->Form->multiCheckbox('fishing_date', ['label' => '日付']); ?>
        <?= $this->Form->multiCheckbox('time_from', ['label' => '釣り開始時間']); ?>
        <?= $this->Form->multiCheckbox('time_to', ['label' => '釣り終了時間']); ?>
        <?= $this->Form->multiCheckbox('weather', ['label' => '天気']); ?>
        <?= $this->Form->multiCheckbox('temperature', ['label' => '気温']); ?>
        <?= $this->Form->multiCheckbox('water_temperature', ['label' => '水温']); ?>
        <?= $this->Form->multiCheckbox('prefecture', ['label' => '都道府県']); ?>
        <?= $this->Form->multiCheckbox('city', ['label' => '市町村']); ?>
        <?= $this->Form->multiCheckbox('spot', ['label' => 'スポット']); ?>
        <?= $this->Form->multiCheckbox('water_depth', ['label' => '水深']); ?>
        <?= $this->Form->multiCheckbox('fish_type', ['label' => '魚種']); ?>
        <?= $this->Form->multiCheckbox('length', ['label' => '魚の長さ']); ?>
        <?= $this->Form->multiCheckbox('weight', ['label' => '魚の重さ']); ?>
        <?= $this->Form->multiCheckbox('quantity', ['label' => '匹数']); ?>
        <?= $this->Form->multiCheckbox('fish_caught_time', ['label' => '釣った時間']); ?>
        <?= $this->Form->multiCheckbox('fishing_type', ['label' => '釣種']); ?>
        <?= $this->Form->multiCheckbox('lure_feed_name', ['label' => 'ルアー／えさ名称']); ?>
        <?= $this->Form->multiCheckbox('lure_feed', ['label' => 'ルアー／えさ']); ?>
        <?= $this->Form->multiCheckbox('note', ['label' => '備考']); ?>
        <?= $this->Form->multiCheckbox('userid', ['label' => 'ユーザーID']); ?>
        <?= $this->Form->button('表示切替') ?>
        <?= $this->Form->end() ?>
    </fieldset>
</div>

<div class="fishingResults filteresults large-12 medium-8 columns content">

    <h3><?= __('表示切替結果') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>

                <?php if ($conditions == 'id') { ?><th scope="col"><?= '管理番号' ?></th><?php } ?>
                <?php if ($conditions == 'fishing_date') { ?><th scope="col"><?= '日付' ?></th><?php } ?>
                <?php if ($conditions == 'time_from') { ?><th scope="col"><?= '釣り開始時間' ?></th><?php } ?>
                <?php if ($conditions == 'time_to') { ?><th scope="col"><?= '釣り終了時間' ?></th><?php } ?>
                <?php if ($conditions == 'weather') { ?><th scope="col"><?= '天気' ?></th><?php } ?>
                <?php if ($conditions == 'temperature') { ?><th scope="col"><?= '気温' ?></th><?php } ?>
                <?php if ($conditions == 'water_temperature') { ?><th scope="col"><?= '水温' ?></th><?php } ?>
                <?php if ($conditions == 'prefecture') { ?><th scope="col"><?= '都道府県' ?></th><?php } ?>
                <?php if ($conditions == 'city') { ?><th scope="col"><?= '市町村' ?></th><?php } ?>
                <?php if ($conditions == 'spot') { ?><th scope="col"><?= 'スポット' ?></th><?php } ?>
                <?php if ($conditions == 'water_depth') { ?><th scope="col"><?= '水深' ?></th><?php } ?>
                <?php if ($conditions == 'fish_type') { ?><th scope="col"><?= '魚種' ?></th><?php } ?>
                <?php if ($conditions == 'length') { ?><th scope="col"><?= '長さ' ?></th><?php } ?>
                <?php if ($conditions == 'weight') { ?><th scope="col"><?= '重さ' ?></th><?php } ?>
                <?php if ($conditions == 'quantity') { ?><th scope="col"><?= '匹数' ?></th><?php } ?>
                <?php if ($conditions == 'fish_caught_time') { ?><th scope="col"><?= '釣った時間' ?></th><?php } ?>
                <?php if ($conditions == 'fishing_type') { ?><th scope="col"><?= '釣種' ?></th><?php } ?>
                <?php if ($conditions == 'lure_feed_name') { ?><th scope="col"><?= 'ルアー／えさ名称' ?></th><?php } ?>
                <?php if ($conditions == 'lure_feed') { ?><th scope="col"><?= 'ルアー／えさ' ?></th><?php } ?>
                <?php if ($conditions == 'note') { ?><th scope="col"><?= '備考' ?></th><?php } ?>
                <?php if ($conditions == 'userid') { ?><th scope="col"><?= 'ユーザーID' ?></th><?php } ?>
                <th scope="col" class="actions"><?= __('') ?></th>

            </tr>
        </thead>


        <tbody>
            <?php foreach ($results as $fishingResult) : ?>
                <tr>
                    <td><?= h($fishingResult->fishing_date->i18nFormat('yyyy年MM月dd日')) ?></td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</div>