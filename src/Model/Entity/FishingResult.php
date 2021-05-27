<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FishingResult Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $fishing_date
 * @property \Cake\I18n\FrozenTime|null $time_from
 * @property \Cake\I18n\FrozenTime|null $time_to
 * @property int|null $weather_id
 * @property float|null $temperature
 * @property float|null $water_temperature
 * @property int|null $prefecture_id
 * @property string|null $city
 * @property string $spot
 * @property int|null $water_depth
 * @property string|null $water_depth_unit
 * @property string $fish_type
 * @property \Cake\I18n\FrozenTime|null $fish_caught_time
 * @property float|null $length
 * @property string|null $length_unit
 * @property float|null $weight
 * @property string|null $weight_unit
 * @property int|null $quantity
 * @property int|null $fishing_type_id
 * @property string|null $lure_feed_name
 * @property string|null $lure_feed
 * @property string|null $note
 * @property int|null $user_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Weather $weather
 * @property \App\Model\Entity\Prefecture $prefecture
 * @property \App\Model\Entity\FishingType $fishing_type
 * @property \App\Model\Entity\User $user
 */
class FishingResult extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'fishing_date' => true,
        'time_from' => true,
        'time_to' => true,
        'weather_id' => true,
        'temperature' => true,
        'water_temperature' => true,
        'prefecture_id' => true,
        'city' => true,
        'spot' => true,
        'water_depth' => true,
        'water_depth_unit' => true,
        'fish_type' => true,
        'fish_caught_time' => true,
        'length' => true,
        'length_unit' => true,
        'weight' => true,
        'weight_unit' => true,
        'quantity' => true,
        'fishing_type_id' => true,
        'lure_feed_name' => true,
        'lure_feed' => true,
        'note' => true,
        'user_id' => true,
        'created' => true,
        'modified' => true,
        'weather' => true,
        'prefecture' => true,
        'fishing_type' => true,
        'user' => true,
    ];
}
