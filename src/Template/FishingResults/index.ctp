<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FishingResult[]|\Cake\Collection\CollectionInterface $fishingResults
 */
?>

<!-- 【松浦　6/14】 -->

<div class="fishingResults index large-12 medium-8 columns content">

    <!-- 画面タイトル -->
    <h3><?= __('釣果一覧') ?></h3>

    <!-- 釣果　一覧表示　テーブル -->
    <table cellpadding="0" cellspacing="0">

        <!-- 釣果　一覧表示　項目 -->
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('FishingResults.id', ['label' => '管理番号']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('fishing_date', ['label' => '日付']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('time_from', ['label' => '釣り開始時間']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('time_to', ['label' => '釣り終了時間']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('weather_id', ['label' => '天気']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('temperature', ['label' => '気温']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('water_temperature', ['label' => '水温']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('prefecture_id', ['label' => '都道府県']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('city', ['label' => '市町村']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('spot', ['label' => 'スポット']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('water_depth', ['label' => '水深']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('fish_type', ['label' => '魚種']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('fish_caught_time', ['label' => '釣った時間']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('length', ['label' => '長さ']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('weight', ['label' => '重さ']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity', ['label' => '匹数']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('fishing_type_id', ['label' => '釣種']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('lure_feed_name', ['label' => 'ルアー／えさ']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('note', ['label' => '備考']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id', ['label' => 'ユーザーID']) ?></th>
                <th scope="col" class="actions"><?= __('') ?></th>
            </tr>
        </thead>

        <!-- 釣果　一覧　情報 -->
        <tbody>
            <?php foreach ($fishingResults as $fishingResult) : ?>
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
        </tbody>
    </table>

    <!-- ページ送り -->
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('≪')) ?>
            <?= $this->Paginator->prev('< ' . __('前ページ')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('次ページ') . ' >') ?>
            <?= $this->Paginator->last(__('≫') . ' >>') ?>
        </ul>

        <p><?= $this->Paginator->counter(['format' => __(' ページ：「 {{page}} / {{pages}} ページを表示」　釣果記録：「 合計 {{count}} 件, 現在 {{current}} 件を表示」 ')]) ?></p>
    </div>

</div>