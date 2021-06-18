<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FishingResult $fishingResult
 */
?>

<!-- 【松浦　6/14】 -->

<!-- タイトル -->
<h3><?= __('釣果詳細') ?></h3>

<!-- 釣果　詳細　テーブル -->
<table class="vertical-table">
    <tr>
        <th scope="row"><?= __('管理番号') ?></th>
        <td><?= $this->Number->format($fishingResult->id) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('日付') ?></th>
        <td><?= h($fishingResult->fishing_date->i18nFormat('yyyy年MM月dd日')) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('釣り開始時間') ?></th>
        <td><?= h($fishingResult->time_from->i18nFormat('HH:mm')) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('釣り終了時間') ?></th>
        <td><?= h($fishingResult->time_to->i18nFormat('HH:mm')) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('天気') ?></th>
        <td><?= h($fishingResult->weather->title) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('気温') ?></th>
        <td><?= $this->Number->format($fishingResult->temperature) . '℃' ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('水温') ?></th>
        <td><?= $this->Number->format($fishingResult->water_temperature) . '℃' ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('都道府県') ?></th>
        <td><?= h($fishingResult->prefecture->title) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('市町村') ?></th>
        <td><?= h($fishingResult->city) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('スポット') ?></th>
        <td><?= h($fishingResult->spot) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('水深') ?></th>
        <td><?= $this->Number->format($fishingResult->water_depth) . h($fishingResult->water_depth_unit) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('魚種') ?></th>
        <td><?= h($fishingResult->fish_type) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('釣った時間') ?></th>
        <td><?= h($fishingResult->fish_caught_time->i18nFormat('HH:mm')) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('長さ') ?></th>
        <td><?= $this->Number->format($fishingResult->length) . h($fishingResult->length_unit) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('重さ') ?></th>
        <td><?= $this->Number->format($fishingResult->weight) . h($fishingResult->weight_unit) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('匹数') ?></th>
        <td><?= $this->Number->format($fishingResult->quantity) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('釣種') ?></th>
        <td><?= h($fishingResult->fishing_type->title) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('ルアー／えさ') ?></th>
        <td><?= h($fishingResult->lure_feed_name) . h($fishingResult->lure_feed) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('備考') ?></th>
        <td><?= h($fishingResult->note) ?></td>
    </tr>

</table>

<br>

<!-- タイトル -->
<h3><?= __('会員詳細') ?></h3>

<!-- 釣果　詳細　テーブル -->
<table class="vertical-table">

    <tr>
        <th scope="row"><?= __('ユーザーID') ?></th>
        <td><?= h($fishingResult->user->userid) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('名前') ?></th>
        <td><?= h($fishingResult->user->name) . 'さん' ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('釣り歴') ?></th>
        <td><?= h($fishingResult->user->fishing_history) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('年齢') ?></th>
        <td><?= $this->Number->format($fishingResult->user->age) . '歳' ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('メールアドレス') ?></th>
        <td><?= h($fishingResult->user->email) ?></td>
    </tr>
</table>

</div>