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
 * Phones Model
 *
 * @method \App\Model\Entity\Phone newEmptyEntity()
 * @method \App\Model\Entity\Phone newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Phone> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Phone get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Phone findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Phone patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Phone> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Phone|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Phone saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Phone>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Phone>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Phone>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Phone> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Phone>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Phone>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Phone>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Phone> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PhonesTable extends Table
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

        $this->setTable('phones');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->nonNegativeInteger('person_id')
            ->requirePresence('person_id', 'create')
            ->notEmptyString('person_id');

        $validator
            ->scalar('phone_country')
            ->maxLength('phone_country', 3)
            ->allowEmptyString('phone_country');

        $validator
            ->scalar('phone_area')
            ->maxLength('phone_area', 2)
            ->allowEmptyString('phone_area');

        $validator
            ->scalar('phone_number')
            ->maxLength('phone_number', 15)
            ->allowEmptyString('phone_number');

        $validator
            ->scalar('phone_annex')
            ->maxLength('phone_annex', 5)
            ->allowEmptyString('phone_annex');

        $validator
            ->integer('pos')
            ->notEmptyString('pos');

        $validator
            ->boolean('visible')
            ->notEmptyString('visible');

        $validator
            ->scalar('action')
            ->maxLength('action', 3)
            ->notEmptyString('action');

        return $validator;
    }
}
