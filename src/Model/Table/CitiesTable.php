<?php
declare(strict_types=1);

namespace App\Model\Table;


use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * Cities Model
 *
 * @property \App\Model\Table\CountiesTable&\Cake\ORM\Association\BelongsTo $Counties
 * @property \App\Model\Table\CompaniesTable&\Cake\ORM\Association\HasMany $Companies
 *
 * @method \App\Model\Entity\City newEmptyEntity()
 * @method \App\Model\Entity\City newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\City> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\City get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\City findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\City patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\City> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\City|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\City saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\City>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\City>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\City>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\City> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\City>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\City>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\City>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\City> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin \Cake\ORM\Behavior\CounterCacheBehavior
 */
class CitiesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('cities');
        //$this->setDisplayField('name');
		$this->setDisplayField('zipAndName');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('CounterCache', [
            'Counties' => ['city_count'],
        ]);

        $this->belongsTo('Counties', [
            'foreignKey' => 'county_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Companies', [
            'foreignKey' => 'city_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->nonNegativeInteger('county_id')
            ->notEmptyString('county_id');

        $validator
            ->scalar('zip')
            ->maxLength('zip', 4)
            ->requirePresence('zip', 'create')
            ->notEmptyString('zip');

        $validator
            ->scalar('name')
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('latitude')
            ->maxLength('latitude', 20)
            ->requirePresence('latitude', 'create')
            ->notEmptyString('latitude');

        $validator
            ->scalar('longitude')
            ->maxLength('longitude', 20)
            ->requirePresence('longitude', 'create')
            ->notEmptyString('longitude');

        $validator
            ->integer('pos')
            ->notEmptyString('pos');

        $validator
            ->boolean('visible')
            ->notEmptyString('visible');

        $validator
            ->nonNegativeInteger('company_count')
            ->notEmptyString('company_count');

        $validator
            ->scalar('action')
            ->maxLength('action', 3)
            ->notEmptyString('action');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['county_id'], 'Counties'), ['errorField' => '0']);

        return $rules;
    }
}
