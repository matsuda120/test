<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FishingResult[]|\Cake\Collection\CollectionInterface $fishingResults
 */

?>

<!-- 【松浦　6/15】 -->

<div class="fishingResults form large-12 medium-8 columns content">
    <h3><?= __('釣果検索') ?></h3>

    <?php if (!empty($results)) { ?>
        <p>
            <font color="#ff0000"><?= $msg1 ?></font>
        </p>
    <?php  } ?>

    <?= $this->Form->create() ?>
    <fieldset>
        <?= $this->Form->label('fishing_date', '釣りをした日付：　入力された日付以降のデータが出力', ['class' => 'custom-control-label']);  ?>
        <?= $this->Form->text('fishing_date', ['type' => 'date', 'class' => 'custom-control-text']); ?>
        <?= $this->Form->label('time_from', '釣り開始時間：　入力された時間以降のデータが出力', ['class' => 'custom-control-label']);  ?>
        <?= $this->Form->text('time_from', ['type' => 'time', 'class' => 'custom-control-text', 'empty' => true]); ?>
        <?= $this->Form->control('weather', ['type' => 'datalistJs', 'label' => '天気', 'options' => $weathers, 'empty' => true]); ?>
        <?= $this->Form->control('prefecture', ['type' => 'datalistJs', 'label' => '都道府県', 'options' => $prefectures, 'empty' => true]); ?>
        <?= $this->Form->control('city', ['type' => 'datalistJs', 'label' => '市町村', 'options' => $cityLists, 'empty' => true]); ?>
        <?= $this->Form->control('spot', ['type' => 'datalistJs', 'label' => 'スポット', 'options' => $spotLists]); ?>
        <?= $this->Form->control('fish_type', ['type' => 'datalistJs', 'label' => '魚種', 'options' => $fishLists, 'empty' => true]); ?>
        <?= $this->Form->label('fish_caught_time', '釣った時間：　入力された時間以降のデータが出力', ['class' => 'custom-control-label']);  ?>
        <?= $this->Form->text('fish_caught_time', ['type' => 'time', 'class' => 'custom-control-text', 'empty' => true]); ?>
        <?= $this->Form->control('fishing_type', ['label' => '釣種', 'options' => $fishingTypes, 'empty' => true]); ?>
        <?= $this->Form->control('lure_feed_name', ['type' => 'datalistJs', 'label' => 'ルアー／えさ名称', 'options' => $lureFeedNameLists, 'empty' => true]); ?>
        <?= $this->Form->control('lure_feed', ['label' => 'ルアー／えさ', 'options' => ["ルアー" => "ルアー", "えさ" => "えさ"], "empty" => true]); ?>
        <?= $this->Form->control('userid', ['label' => 'ユーザーID', 'type' => 'datalistJs', 'options' => $userLists, 'empty' => true]); ?>
        <?= $this->Form->button('検索') ?>
        <?= $this->Form->end() ?>
    </fieldset>
</div>


<?php if (!empty($results)) { ?>
    <h3><?= __('検索結果') ?></h3>
    <table class="design10">
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
            <th scope="col"><?= '魚種' ?></th>
            <th scope="col"><?= '長さ' ?></th>
            <th scope="col"><?= '重さ' ?></th>
            <th scope="col"><?= '匹数' ?></th>
            <th scope="col"><?= '魚種' ?></th>
            <th scope="col"><?= '釣種' ?></th>
            <th scope="col"><?= 'ルアー／えさ' ?></th>
            <th scope="col"><?= '備考' ?></th>
            <th scope="col"><?= 'ユーザーID' ?></th>
            <th scope="col" class="actions"><?= __('') ?></th>
        </tr>


        <?php foreach ($results as $fishingResult) : ?>
            <tr>
                <td><?= $this->Number->format($fishingResult->id) ?></td>
                <td><?= h($fishingResult->fishing_date->i18nFormat('yyyy年MM月dd日')) ?></td>
                <td><?= h($fishingResult->time_from->i18nFormat('HH:mm')) ?></td>
                <td><?= h($fishingResult->time_to->i18nFormat('HH:mm')) ?></td>
                <td><?= h($fishingResult->weather->title) ?></td>
                <td><?= $this->Number->format($fishingResult->temperature) . '℃' ?></td>
                <td><?= $this->Number->format($fishingResult->water_temperature) . '℃' ?></td>
                <td><?= h($fishingResult->prefecture->title) ?></td>
                <td><?= h($fishingResult->city) ?></td>
                <td><?= h($fishingResult->spot) ?></td>
                <td><?= $this->Number->format($fishingResult->water_depth) . h($fishingResult->water_depth_unit) ?></td>
                <td><?= h($fishingResult->fish_type) ?></td>
                <td><?= h($fishingResult->fish_caught_time->i18nFormat('HH:mm')) ?></td>
                <td><?= $this->Number->format($fishingResult->length) . h($fishingResult->length_unit) ?></td>
                <td><?= $this->Number->format($fishingResult->weight) . h($fishingResult->weight_unit) ?></td>
                <td><?= $this->Number->format($fishingResult->quantity) ?></td>
                <td><?= h($fishingResult->fishing_type->title) ?></td>
                <td><?= h($fishingResult->lure_feed_name) . h($fishingResult->lure_feed) ?></td>
                <td><?= $this->Text->truncate(($fishingResult->note), 10, array(
                        'ellipsis' => '...', 'exact' => true, 'html' => true
                    )) ?></td>
                <td><?= h($fishingResult->user->userid) ?></td>

                <td class="">
                    <?php $userid = $this->request->getSession()->read('Auth.User.id'); ?>
                    <?php if ($this->request->getSession()->read('Auth.User.id') && $userid == $fishingResult->user->id) : ?>
                        <?= $this->Html->link(__('詳細'), ['action' => 'view', $fishingResult->id]) ?>
                        <?= $this->Html->link(__('修正'), ['action' => 'edit', $fishingResult->id]) ?>
                        <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $fishingResult->id], ['confirm' => __('釣果情報(No.{0}) を削除してよろしいでしょうか？', $fishingResult->id)]) ?>
                    <?php else : ?>
                        <?= $this->Html->link(__('詳細'), ['action' => 'view', $fishingResult->id]) ?>
                    <?php endif; ?>
                </td>

            </tr>
        <?php endforeach; ?>
    </table>
<?php } ?>