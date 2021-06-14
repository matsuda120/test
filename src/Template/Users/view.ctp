<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Userid') ?></th>
            <td><?= h($user->userid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($user->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fishing History') ?></th>
            <td><?= h($user->fishing_history) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Age') ?></th>
            <td><?= $this->Number->format($user->age) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= $user->deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Fishing Results') ?></h4>
        <?php if (!empty($user->fishing_results)) : ?>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Fishing Date') ?></th>
                    <th scope="col"><?= __('Time From') ?></th>
                    <th scope="col"><?= __('Time To') ?></th>
                    <th scope="col"><?= __('Weather Id') ?></th>
                    <th scope="col"><?= __('Temperature') ?></th>
                    <th scope="col"><?= __('Water Temperature') ?></th>
                    <th scope="col"><?= __('Prefecture Id') ?></th>
                    <th scope="col"><?= __('City') ?></th>
                    <th scope="col"><?= __('Spot') ?></th>
                    <th scope="col"><?= __('Water Depth') ?></th>
                    <th scope="col"><?= __('Water Depth Unit') ?></th>
                    <th scope="col"><?= __('Fish Type') ?></th>
                    <th scope="col"><?= __('Fish Caught Time') ?></th>
                    <th scope="col"><?= __('Length') ?></th>
                    <th scope="col"><?= __('Length Unit') ?></th>
                    <th scope="col"><?= __('Weight') ?></th>
                    <th scope="col"><?= __('Weight Unit') ?></th>
                    <th scope="col"><?= __('Quantity') ?></th>
                    <th scope="col"><?= __('Fishing Type Id') ?></th>
                    <th scope="col"><?= __('Lure Feed Name') ?></th>
                    <th scope="col"><?= __('Lure Feed') ?></th>
                    <th scope="col"><?= __('Note') ?></th>
                    <th scope="col"><?= __('User Id') ?></th>
                    <th scope="col"><?= __('Created') ?></th>
                    <th scope="col"><?= __('Modified') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($user->fishing_results as $fishingResults) : ?>
                    <tr>
                        <td><?= h($fishingResults->id) ?></td>
                        <td><?= h($fishingResults->fishing_date) ?></td>
                        <td><?= h($fishingResults->time_from) ?></td>
                        <td><?= h($fishingResults->time_to) ?></td>
                        <td><?= h($fishingResults->weather_id) ?></td>
                        <td><?= h($fishingResults->temperature) ?></td>
                        <td><?= h($fishingResults->water_temperature) ?></td>
                        <td><?= h($fishingResults->prefecture_id) ?></td>
                        <td><?= h($fishingResults->city) ?></td>
                        <td><?= h($fishingResults->spot) ?></td>
                        <td><?= h($fishingResults->water_depth) ?></td>
                        <td><?= h($fishingResults->water_depth_unit) ?></td>
                        <td><?= h($fishingResults->fish_type) ?></td>
                        <td><?= h($fishingResults->fish_caught_time) ?></td>
                        <td><?= h($fishingResults->length) ?></td>
                        <td><?= h($fishingResults->length_unit) ?></td>
                        <td><?= h($fishingResults->weight) ?></td>
                        <td><?= h($fishingResults->weight_unit) ?></td>
                        <td><?= h($fishingResults->quantity) ?></td>
                        <td><?= h($fishingResults->fishing_type_id) ?></td>
                        <td><?= h($fishingResults->lure_feed_name) ?></td>
                        <td><?= h($fishingResults->lure_feed) ?></td>
                        <td><?= h($fishingResults->note) ?></td>
                        <td><?= h($fishingResults->user_id) ?></td>
                        <td><?= h($fishingResults->created) ?></td>
                        <td><?= h($fishingResults->modified) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'FishingResults', 'action' => 'view', $fishingResults->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'FishingResults', 'action' => 'edit', $fishingResults->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'FishingResults', 'action' => 'delete', $fishingResults->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fishingResults->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
</div>