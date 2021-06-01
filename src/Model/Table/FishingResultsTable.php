<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FishingResults Model
 *
 * @property \App\Model\Table\WeathersTable&\Cake\ORM\Association\BelongsTo $Weathers
 * @property \App\Model\Table\PrefecturesTable&\Cake\ORM\Association\BelongsTo $Prefectures
 * @property \App\Model\Table\FishingTypesTable&\Cake\ORM\Association\BelongsTo $FishingTypes
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\FishingResult get($primaryKey, $options = [])
 * @method \App\Model\Entity\FishingResult newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FishingResult[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FishingResult|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FishingResult saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FishingResult patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FishingResult[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FishingResult findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FishingResultsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('fishing_results');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Weathers', [
            'foreignKey' => 'weather_id',
        ]);
        $this->belongsTo('Prefectures', [
            'foreignKey' => 'prefecture_id',
        ]);
        $this->belongsTo('FishingTypes', [
            'foreignKey' => 'fishing_type_id',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');
            
        $validator
            ->date('fishing_date')
            ->requirePresence('fishing_date', 'create')
            ->notEmptyDate('fishing_date');

        $validator
            ->time('time_from')
            ->allowEmptyTime('time_from');

        $validator
            ->time('time_to')
            ->allowEmptyTime('time_to');

        $validator
            ->decimal('temperature')
            ->allowEmptyString('temperature');

        $validator
            ->decimal('water_temperature')
            ->allowEmptyString('water_temperature');

        $validator
            ->scalar('city')
            ->maxLength('city', 50)
            ->allowEmptyString('city');

        $validator
            ->scalar('spot')
            ->maxLength('spot', 50)
            ->requirePresence('spot', 'create')
            ->notEmptyString('spot');

        $validator
            ->nonNegativeInteger('water_depth')
            ->allowEmptyString('water_depth');

        $validator
            ->scalar('water_depth_unit')
            ->maxLength('water_depth_unit', 2)
            ->allowEmptyString('water_depth_unit');

        $validator
            ->scalar('fish_type')
            ->maxLength('fish_type', 25)
            ->requirePresence('fish_type', 'create')
            ->notEmptyString('fish_type');

        $validator
            ->time('fish_caught_time')
            ->allowEmptyTime('fish_caught_time');

        $validator
            ->decimal('length')
            ->greaterThanOrEqual('length', 0)
            ->allowEmptyString('length');

        $validator
            ->scalar('length_unit')
            ->maxLength('length_unit', 2)
            ->allowEmptyString('length_unit');

        $validator
            ->decimal('weight')
            ->greaterThanOrEqual('weight', 0)
            ->allowEmptyString('weight');

        $validator
            ->scalar('weight_unit')
            ->maxLength('weight_unit', 2)
            ->allowEmptyString('weight_unit');

        $validator
            ->nonNegativeInteger('quantity')
            ->allowEmptyString('quantity');

        $validator
            ->scalar('lure_feed_name')
            ->maxLength('lure_feed_name', 25)
            ->allowEmptyString('lure_feed_name');

        $validator
            ->scalar('lure_feed')
            ->maxLength('lure_feed', 5)
            ->allowEmptyString('lure_feed');

        $validator
            ->scalar('note')
            ->maxLength('note', 255)
            ->allowEmptyString('note');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['weather_id'], 'Weathers'));
        $rules->add($rules->existsIn(['prefecture_id'], 'Prefectures'));
        $rules->add($rules->existsIn(['fishing_type_id'], 'FishingTypes'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
