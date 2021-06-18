<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FishingResult[]|\Cake\Collection\CollectionInterface $fishingResults
 */

?>

<!-- 【松浦　6/17】 -->

<script type="text/javascript">
    window.onload = function() {
        var array = ["id", "dat", "tif", "tit", "wea", "tem", "wte", "pre", "cit", "spo", "dep", "fty", "fct", "len", "wei", "qty", "fgt", "lfn", "not", "uid", "act"];
        for (var j = 0; j < array.length; j++) {
            var id = array[j] + "_display";
            var obj = array[j] + "_check";
            var CELL = document.getElementById(id);
            var TABLE = CELL.parentNode.parentNode.parentNode;
            for (var i = 0; TABLE.rows[i]; i++) {
                TABLE.rows[i].cells[CELL.cellIndex].style.display = (document.getElementById(obj).checked) ? '' : 'none';
            }
        }
    }

    function checkbox_cell(obj, id) {
        var CELL = document.getElementById(id);
        var TABLE = CELL.parentNode.parentNode.parentNode;
        for (var i = 0; TABLE.rows[i]; i++) {
            TABLE.rows[i].cells[CELL.cellIndex].style.display = (obj.checked) ? '' : 'none';
        }
    }
</script>

<!-- <style>
    /* table.onoff{
    display:none;
}
input[type="checkbox"]:checked + table{
  display:block; }*/
    .clicktxt {
        color: #ffffff;
        background-color: #854734;
        padding: 15px;
        border-radius: 10px;
    }

    .switchdsp input {
        display: none;
    }

    .switchdsp .onoff {
        padding: 0px 10px 0px 10px;
        height: 0;
        overflow: hidden;
        transition: 0.9s;
        opacity: 0;
    }

    .switchdsp input:checked~.onoff {
        padding: 0px 25px 0px 25px;
        height: auto;
        opacity: 1;
    }
</style> -->

<!-- <label for="menu">表示切替</label>
<input type="checkbox" id="menu"> -->

<!-- 
チェックボックス：<input type="checkbox"> -->





<!-- <style type="text/css">
    #sample2 th {
        display: block;
        float: left;
        width: 110px;
    }
</style>
<div id="sample2">
    <th><input type="checkbox" id="idx_check" onclick="checkbox_cell(this,'id_display')" checked="checked">管理番号</th>
    <th><input type="checkbox" id="dat_check" onclick="checkbox_cell(this,'dat_display')" checked="checked">日付</th>
    <th><input type="checkbox" id="tif_check" onclick="checkbox_cell(this,'tif_display')" checked="checked">釣り開始時間</th>
    <th><input type="checkbox" id="tit_check" onclick="checkbox_cell(this,'tit_display')" checked="checked">釣り終了時間</th>
    <th><input type="checkbox" id="wea_check" onclick="checkbox_cell(this,'wea_display')" checked="checked">天気</th>
    <th><input type="checkbox" id="tem_check" onclick="checkbox_cell(this,'tem_display')" checked="checked">気温</th>
    <th><input type="checkbox" id="wte_check" onclick="checkbox_cell(this,'wte_display')" checked="checked">水温</th>
    <th><input type="checkbox" id="pre_check" onclick="checkbox_cell(this,'pre_display')" checked="checked">都道府県</th>
    <th><input type="checkbox" id="cit_check" onclick="checkbox_cell(this,'cit_display')" checked="checked">市町村</th>
    <th><input type="checkbox" id="spo_check" onclick="checkbox_cell(this,'spo_display')" checked="checked">スポット</th>
    <th><input type="checkbox" id="dep_check" onclick="checkbox_cell(this,'dep_display')" checked="checked">水深</th>
    <th><input type="checkbox" id="fty_check" onclick="checkbox_cell(this,'fty_display')" checked="checked">魚種</th>
    <th><input type="checkbox" id="fct_check" onclick="checkbox_cell(this,'fct_display')" checked="checked">釣った時間</th>
    <th><input type="checkbox" id="len_check" onclick="checkbox_cell(this,'len_display')" checked="checked">長さ</th>
    <th><input type="checkbox" id="wei_check" onclick="checkbox_cell(this,'wei_display')" checked="checked">重さ</th>
    <th><input type="checkbox" id="qty_check" onclick="checkbox_cell(this,'qty_display')" checked="checked">匹数</th>
    <th><input type="checkbox" id="fgt_check" onclick="checkbox_cell(this,'fgt_display')" checked="checked">釣種</th>
    <th><input type="checkbox" id="lfn_check" onclick="checkbox_cell(this,'lfn_display')" checked="checked">ルアー／えさ</th>
    <th><input type="checkbox" id="not_check" onclick="checkbox_cell(this,'not_display')" checked="checked">備考</th>
    <th><input type="checkbox" id="uid_check" onclick="checkbox_cell(this,'uid_display')" checked="checked">ユーザーID</th>
    <th><input type="checkbox" id="act_check" onclick="checkbox_cell(this,'act_display')" checked="checked">メニュー</th>
</div> -->


<style>

</style>

<form class="checkcheck">
    <ul>
        <li>

            <p class="check">
                <label><input type="checkbox" id="idx_check" onclick="checkbox_cell(this,'id_display')" checked="checked">管理番号</label>
                <label><input type="checkbox" id="dat_check" onclick="checkbox_cell(this,'dat_display')" checked="checked">日付</label>
                <label><input type="checkbox" id="tif_check" onclick="checkbox_cell(this,'tif_display')" checked="checked">釣り開始時間</label>
                <label><input type="checkbox" id="tit_check" onclick="checkbox_cell(this,'tit_display')" checked="checked">釣り終了時間</label>
                <label><input type="checkbox" id="wea_check" onclick="checkbox_cell(this,'wea_display')" checked="checked">天気</label>
                <label><input type="checkbox" id="tem_check" onclick="checkbox_cell(this,'tem_display')" checked="checked">気温</label>
                <label><input type="checkbox" id="wte_check" onclick="checkbox_cell(this,'wte_display')" checked="checked">水温</label>
                <label><input type="checkbox" id="pre_check" onclick="checkbox_cell(this,'pre_display')" checked="checked">都道府県</label>
                <label><input type="checkbox" id="cit_check" onclick="checkbox_cell(this,'cit_display')" checked="checked">市町村</label>
                <label><input type="checkbox" id="spo_check" onclick="checkbox_cell(this,'spo_display')" checked="checked">スポット</label>
                <label><input type="checkbox" id="dep_check" onclick="checkbox_cell(this,'dep_display')" checked="checked">水深</label>
                <label><input type="checkbox" id="fty_check" onclick="checkbox_cell(this,'fty_display')" checked="checked">魚種</label>
                <label><input type="checkbox" id="fct_check" onclick="checkbox_cell(this,'fct_display')" checked="checked">釣った時間</label>
                <label><input type="checkbox" id="len_check" onclick="checkbox_cell(this,'len_display')" checked="checked">長さ</label>
                <label><input type="checkbox" id="wei_check" onclick="checkbox_cell(this,'wei_display')" checked="checked">重さ</label>
                <label><input type="checkbox" id="qty_check" onclick="checkbox_cell(this,'qty_display')" checked="checked">匹数</label>
                <label><input type="checkbox" id="fgt_check" onclick="checkbox_cell(this,'fgt_display')" checked="checked">釣種</label>
                <label><input type="checkbox" id="lfn_check" onclick="checkbox_cell(this,'lfn_display')" checked="checked">ルアー／えさ</label>
                <label><input type="checkbox" id="not_check" onclick="checkbox_cell(this,'not_display')" checked="checked">備考</label>
                <label><input type="checkbox" id="uid_check" onclick="checkbox_cell(this,'uid_display')" checked="checked">ユーザーID</label>
                <label><input type="checkbox" id="act_check" onclick="checkbox_cell(this,'act_display')" checked="checked">メニュー</label>
            </p>
            </div>
        </li>
    </ul>

    <!-- <label for="l-1">
    <span class="clicktxt">表示切替</span>
</label>
<input type="checkbox" id="l-1"> -->
    <!-- 
    <table class="design10">
        <tr>
            <th><input type="checkbox" id="idx_check" onclick="checkbox_cell(this,'id_display')" checked="checked">管理番号</th>
            <th><input type="checkbox" id="dat_check" onclick="checkbox_cell(this,'dat_display')" checked="checked">日付</th>
            <th><input type="checkbox" id="tif_check" onclick="checkbox_cell(this,'tif_display')" checked="checked">釣り開始時間</th>
            <th><input type="checkbox" id="tit_check" onclick="checkbox_cell(this,'tit_display')" checked="checked">釣り終了時間</th>
            <th><input type="checkbox" id="wea_check" onclick="checkbox_cell(this,'wea_display')" checked="checked">天気</th>
            <th><input type="checkbox" id="tem_check" onclick="checkbox_cell(this,'tem_display')" checked="checked">気温</th>
            <th><input type="checkbox" id="wte_check" onclick="checkbox_cell(this,'wte_display')" checked="checked">水温</th>
            <th><input type="checkbox" id="pre_check" onclick="checkbox_cell(this,'pre_display')" checked="checked">都道府県</th>
            <th><input type="checkbox" id="cit_check" onclick="checkbox_cell(this,'cit_display')" checked="checked">市町村</th>
            <th><input type="checkbox" id="spo_check" onclick="checkbox_cell(this,'spo_display')" checked="checked">スポット</th>
            <th><input type="checkbox" id="dep_check" onclick="checkbox_cell(this,'dep_display')" checked="checked">水深</th>
            <th><input type="checkbox" id="fty_check" onclick="checkbox_cell(this,'fty_display')" checked="checked">魚種</th>
            <th><input type="checkbox" id="fct_check" onclick="checkbox_cell(this,'fct_display')" checked="checked">釣った時間</th>
            <th><input type="checkbox" id="len_check" onclick="checkbox_cell(this,'len_display')" checked="checked">長さ</th>
            <th><input type="checkbox" id="wei_check" onclick="checkbox_cell(this,'wei_display')" checked="checked">重さ</th>
            <th><input type="checkbox" id="qty_check" onclick="checkbox_cell(this,'qty_display')" checked="checked">匹数</th>
            <th><input type="checkbox" id="fgt_check" onclick="checkbox_cell(this,'fgt_display')" checked="checked">釣種</th>
            <th><input type="checkbox" id="lfn_check" onclick="checkbox_cell(this,'lfn_display')" checked="checked">ルアー／えさ</th>
            <th><input type="checkbox" id="not_check" onclick="checkbox_cell(this,'not_display')" checked="checked">備考</th>
            <th><input type="checkbox" id="uid_check" onclick="checkbox_cell(this,'uid_display')" checked="checked">ユーザーID</th>
            <th><input type="checkbox" id="act_check" onclick="checkbox_cell(this,'act_display')" checked="checked">メニュー</th>
        </tr>

    </table> -->



    <table class="design10">
        <th scope="col" id="id_display"><?= $this->Paginator->sort('FishingResults.id', ['label' => '管理番号']) ?></th>
        <th scope="col" id="dat_display"><?= $this->Paginator->sort('fishing_date', ['label' => '日付']) ?></th>
        <th scope="col" id="tif_display"><?= $this->Paginator->sort('time_from', ['label' => '釣り開始時間']) ?></th>
        <th scope="col" id="tit_display"><?= $this->Paginator->sort('time_to', ['label' => '釣り終了時間']) ?></th>
        <th scope="col" id="wea_display"><?= $this->Paginator->sort('weather_id', ['label' => '天気']) ?></th>
        <th scope="col" id="tem_display"><?= $this->Paginator->sort('temperature', ['label' => '気温']) ?></th>
        <th scope="col" id="wte_display"><?= $this->Paginator->sort('water_temperature', ['label' => '水温']) ?></th>
        <th scope="col" id="pre_display"><?= $this->Paginator->sort('prefecture_id', ['label' => '都道府県']) ?></th>
        <th scope="col" id="cit_display"><?= $this->Paginator->sort('city', ['label' => '市町村']) ?></th>
        <th scope="col" id="apo_display"><?= $this->Paginator->sort('spot', ['label' => 'スポット']) ?></th>
        <th scope="col" id="dep_display"><?= $this->Paginator->sort('water_depth', ['label' => '水深']) ?></th>
        <th scope="col" id="fty_display"><?= $this->Paginator->sort('fish_type', ['label' => '魚種']) ?></th>
        <th scope="col" id="fct_display"><?= $this->Paginator->sort('fish_caught_time', ['label' => '釣った時間']) ?></th>
        <th scope="col" id="len_display"><?= $this->Paginator->sort('length', ['label' => '長さ']) ?></th>
        <th scope="col" id="wei_display"><?= $this->Paginator->sort('weight', ['label' => '重さ']) ?></th>
        <th scope="col" id="qty_display"><?= $this->Paginator->sort('quantity', ['label' => '匹数']) ?></th>
        <th scope="col" id="fgt_display"><?= $this->Paginator->sort('fishing_type_id', ['label' => '釣種']) ?></th>
        <th scope="col" id="lfn_display"><?= $this->Paginator->sort('lure_feed_name', ['label' => 'ルアー／えさ']) ?></th>
        <th scope="col" id="not_display"><?= $this->Paginator->sort('note', ['label' => '備考']) ?></th>
        <th scope="col" id="uid_display"><?= $this->Paginator->sort('user_id', ['label' => 'ユーザーID']) ?></th>
        <th scope="col" id="act_display" class="actions"><?= __('') ?></th>

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
    </table>

    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('≪')) ?>
            <?= $this->Paginator->prev('< ' . __('前ページ')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('次ページ') . ' >') ?>
            <?= $this->Paginator->last(__('≫') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('{{page}} / {{pages}} ページを表示  現在 {{current}} / {{count}}件を表示')]) ?></p>
    </div>

    </div>