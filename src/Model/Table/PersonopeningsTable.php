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
 * Personopenings Model
 *
 * @method \App\Model\Entity\Personopening newEmptyEntity()
 * @method \App\Model\Entity\Personopening newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Personopening> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Personopening get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Personopening findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Personopening patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Personopening> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Personopening|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Personopening saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Personopening>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Personopening>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Personopening>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Personopening> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Personopening>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Personopening>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Personopening>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Personopening> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PersonopeningsTable extends Table
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

        $this->setTable('personopenings');
        $this->setDisplayField('name');
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
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('open_from')
            ->maxLength('open_from', 20)
            ->requirePresence('open_from', 'create')
            ->notEmptyString('open_from');

        $validator
            ->scalar('open_to')
            ->maxLength('open_to', 20)
            ->requirePresence('open_to', 'create')
            ->notEmptyString('open_to');

        $validator
            ->scalar('open_comment')
            ->maxLength('open_comment', 250)
            ->allowEmptyString('open_comment');

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
