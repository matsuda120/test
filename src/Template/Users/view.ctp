<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<!-- 【松浦　6/15】 -->


<!-- タイトル -->
<h3><?= __('マイページ') ?></h3>
<table class="vertical-table">
    <tr>
        <th scope="row"><?= __('ユーザーＩＤ') ?></th>
        <td><?= h($user->userid) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('名前') ?></th>
        <td><?= h($user->name) . 'さん' ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('釣り歴') ?></th>
        <td><?= h($user->fishing_history) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('年齢') ?></th>
        <td><?= $this->Number->format($user->age) . '歳' ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('メールアドレス') ?></th>
        <td><?= h($user->email) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('') ?></th>
        <td><?= $this->Html->link(__('修正'), ['action' => 'edit', $user->id]) ?>
            <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $user->id], ['confirm' => __('会員情報（No.{0}) を削除してよろしいでしょうか？', $user->id)]) ?>
        </td>
    </tr>

</table>


<br>



<!-- 画面タイトル -->
<h3><?= __('釣果登録履歴') ?></h3>

<!-- 釣果　一覧表示　テーブル -->
<?php if (!empty($user->fishing_results)) : ?>
    <table class="design10">
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
            <th scope="col" class="actions"><?= __('') ?></th>
        </tr>
        <?php foreach ($user->fishing_results as $fishingResults) : ?>
            <tr>
                <td><?= h($fishingResults->id) ?></td>
                <td><?= h($fishingResults->fishing_date->i18nFormat('yyyy年MM月dd日')) ?></td>
                <td><?= h($fishingResults->time_from->i18nFormat('HH:mm')) ?></td>
                <td><?= h($fishingResults->time_to->i18nFormat('HH:mm')) ?></td>
                <td><?= h($fishingResults->weather->title) ?></td>
                <td><?= h($fishingResults->temperature) . '℃' ?></td>
                <td><?= h($fishingResults->water_temperature) . '℃' ?></td>
                <td><?= h($fishingResults->prefecture->title) ?></td>
                <td><?= h($fishingResults->city) ?></td>
                <td><?= h($fishingResults->spot) ?></td>
                <td><?= h($fishingResults->water_depth) . h($fishingResults->water_depth_unit) ?></td>
                <td><?= h($fishingResults->fish_type) ?></td>
                <td><?= h($fishingResults->fish_caught_time->i18nFormat('HH:mm')) ?></td>
                <td><?= h($fishingResults->length) . h($fishingResults->length_unit) ?></td>
                <td><?= h($fishingResults->weight) . h($fishingResults->weight_unit) ?></td>
                <td><?= h($fishingResults->quantity) ?></td>
                <td><?= h($fishingResults->fishing_type->title) ?></td>
                <td><?= h($fishingResults->lure_feed_name) . h($fishingResults->lure_feed) ?></td>
                <td><?= $this->Text->truncate(($fishingResults->note), 10, array(
                        'ellipsis' => '...', 'exact' => true, 'html' => true
                    )) ?></td>

                <td class="">
                    <?= $this->Html->link(__('詳細'), ['controller' => 'FishingResults', 'action' => 'view', $fishingResults->id]) ?>
                    <?= $this->Html->link(__('修正'), ['controller' => 'FishingResults', 'action' => 'edit', $fishingResults->id]) ?>
                    <?= $this->Form->postLink(__('削除'), ['controller' => 'FishingResults', 'action' => 'delete', $fishingResults->id], ['confirm' => __('釣果情報(No.{0}) を削除してよろしいでしょうか？', $fishingResults->id)]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>