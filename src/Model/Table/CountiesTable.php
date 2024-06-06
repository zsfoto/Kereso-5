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
 * Counties Model
 *
 * @property \App\Model\Table\CitiesTable&\Cake\ORM\Association\HasMany $Cities
 *
 * @method \App\Model\Entity\County newEmptyEntity()
 * @method \App\Model\Entity\County newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\County> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\County get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\County findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\County patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\County> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\County|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\County saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\County>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\County>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\County>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\County> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\County>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\County>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\County>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\County> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CountiesTable extends Table
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

        $this->setTable('counties');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Cities', [
            'foreignKey' => 'county_id',
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
            ->scalar('name')
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('shortname')
            ->maxLength('shortname', 2)
            ->requirePresence('shortname', 'create')
            ->notEmptyString('shortname');

        $validator
            ->scalar('capitalcity')
            ->maxLength('capitalcity', 50)
            ->requirePresence('capitalcity', 'create')
            ->notEmptyString('capitalcity');

        $validator
            ->scalar('region')
            ->maxLength('region', 100)
            ->requirePresence('region', 'create')
            ->notEmptyString('region');

        $validator
            ->integer('pos')
            ->notEmptyString('pos');

        $validator
            ->boolean('visible')
            ->notEmptyString('visible');

        $validator
            ->nonNegativeInteger('city_count')
            ->notEmptyString('city_count');

        $validator
            ->scalar('action')
            ->maxLength('action', 3)
            ->notEmptyString('action');

        return $validator;
    }
}
