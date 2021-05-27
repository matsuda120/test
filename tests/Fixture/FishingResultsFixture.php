<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FishingResultsFixture
 */
class FishingResultsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'fishing_date' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'time_from' => ['type' => 'time', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'time_to' => ['type' => 'time', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'weather_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'temperature' => ['type' => 'decimal', 'length' => 3, 'precision' => 1, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'water_temperature' => ['type' => 'decimal', 'length' => 3, 'precision' => 1, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'prefecture_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'city' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'spot' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'water_depth' => ['type' => 'integer', 'length' => 3, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'water_depth_unit' => ['type' => 'string', 'length' => 2, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'fish_type' => ['type' => 'string', 'length' => 25, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'fish_caught_time' => ['type' => 'time', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'length' => ['type' => 'decimal', 'length' => 3, 'precision' => 1, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => ''],
        'length_unit' => ['type' => 'string', 'length' => 2, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'weight' => ['type' => 'decimal', 'length' => 3, 'precision' => 1, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => ''],
        'weight_unit' => ['type' => 'string', 'length' => 2, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'quantity' => ['type' => 'integer', 'length' => 3, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'fishing_type_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'lure_feed_name' => ['type' => 'string', 'length' => 25, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'lure_feed' => ['type' => 'string', 'length' => 5, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'note' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'weather_key' => ['type' => 'index', 'columns' => ['weather_id'], 'length' => []],
            'prefecture_key' => ['type' => 'index', 'columns' => ['prefecture_id'], 'length' => []],
            'fishing_type_key' => ['type' => 'index', 'columns' => ['fishing_type_id'], 'length' => []],
            'user_key' => ['type' => 'index', 'columns' => ['user_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fishing_type_key' => ['type' => 'foreign', 'columns' => ['fishing_type_id'], 'references' => ['fishing_types', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'prefecture_key' => ['type' => 'foreign', 'columns' => ['prefecture_id'], 'references' => ['prefectures', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'user_key' => ['type' => 'foreign', 'columns' => ['user_id'], 'references' => ['users', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'weather_key' => ['type' => 'foreign', 'columns' => ['weather_id'], 'references' => ['weathers', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'fishing_date' => '2021-05-26',
                'time_from' => '16:46:39',
                'time_to' => '16:46:39',
                'weather_id' => 1,
                'temperature' => 1.5,
                'water_temperature' => 1.5,
                'prefecture_id' => 1,
                'city' => 'Lorem ipsum dolor sit amet',
                'spot' => 'Lorem ipsum dolor sit amet',
                'water_depth' => 1,
                'water_depth_unit' => 'Lo',
                'fish_type' => 'Lorem ipsum dolor sit a',
                'fish_caught_time' => '16:46:39',
                'length' => 1.5,
                'length_unit' => 'Lo',
                'weight' => 1.5,
                'weight_unit' => 'Lo',
                'quantity' => 1,
                'fishing_type_id' => 1,
                'lure_feed_name' => 'Lorem ipsum dolor sit a',
                'lure_feed' => 'Lor',
                'note' => 'Lorem ipsum dolor sit amet',
                'user_id' => 1,
                'created' => '2021-05-26 16:46:39',
                'modified' => '2021-05-26 16:46:39',
            ],
        ];
        parent::init();
    }
}
