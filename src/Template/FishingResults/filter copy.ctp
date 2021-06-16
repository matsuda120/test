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

        <!-- 釣果　一覧表示　テーブル -->
        <table cellpadding="0" cellspacing="0">

            <!-- 釣果　一覧表示　項目 -->
            <thead>
                <tr>
                    <th scope="col"><?= 'FishingResults.id', ['label' => '管理番号'] ?></th>
                    <th scope="col"><?= 'fishing_date', ['label' => '日付'] ?></th>
                    <th scope="col"><?= 'time_from', ['label' => '釣り開始時間'] ?></th>
                    <th scope="col"><?= 'time_to', ['label' => '釣り終了時間'] ?></th>
                    <th scope="col"><?= 'weather', ['label' => '天気'] ?></th>
                    <th scope="col"><?= 'temperature', ['label' => '気温'] ?></th>
                    <th scope="col"><?= 'water_temperature', ['label' => '水温'] ?></th>
                    <th scope="col"><?= 'prefecture_id', ['label' => '都道府県'] ?></th>
                    <th scope="col"><?= 'city', ['label' => '市町村'] ?></th>
                    <th scope="col"><?= 'spot', ['label' => 'スポット'] ?></th>
                    <th scope="col"><?= 'water_depth', ['label' => '水深'] ?></th>
                    <th scope="col"><?= 'fish_type', ['label' => '魚種'] ?></th>
                    <th scope="col"><?= 'fish_caught_time', ['label' => '釣った時間'] ?></th>
                    <th scope="col"><?= 'length', ['label' => '長さ'] ?></th>
                    <th scope="col"><?= 'weight', ['label' => '重さ'] ?></th>
                    <th scope="col"><?= 'quantity', ['label' => '匹数'] ?></th>
                    <th scope="col"><?= 'fishing_type_id', ['label' => '釣種'] ?></th>
                    <th scope="col"><?= 'lure_feed_name', ['label' => 'ルアー／えさ'] ?></th>
                    <th scope="col"><?= 'note', ['label' => '備考'] ?></th>
                    <th scope="col"><?= 'user_id', ['label' => 'ユーザーID'] ?></th>
                    <th scope="col" class="actions"><?= __('') ?></th>
                </tr>
            </thead>

            <!-- 釣果　一覧　情報 -->
            <tbody>
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
            <?php } ?>
            </tbody>
        </table>

</div>