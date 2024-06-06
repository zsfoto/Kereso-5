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
 * Persons Model
 *
 * @property \App\Model\Table\CompaniesTable&\Cake\ORM\Association\BelongsTo $Companies
 * @property \App\Model\Table\EmailsTable&\Cake\ORM\Association\HasMany $Emails
 * @property \App\Model\Table\PersonopeningsTable&\Cake\ORM\Association\HasMany $Personopenings
 * @property \App\Model\Table\PhonesTable&\Cake\ORM\Association\HasMany $Phones
 *
 * @method \App\Model\Entity\Person newEmptyEntity()
 * @method \App\Model\Entity\Person newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Person> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Person get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Person findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Person patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Person> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Person|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Person saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Person>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Person>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Person>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Person> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Person>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Person>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Person>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Person> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin \Cake\ORM\Behavior\CounterCacheBehavior
 */
class PersonsTable extends Table
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

        $this->setTable('persons');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('CounterCache', [
            'Companies' => ['person_count'],
        ]);

        $this->belongsTo('Companies', [
            'foreignKey' => 'company_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Emails', [
            'foreignKey' => 'person_id',
        ]);
        $this->hasMany('Personopenings', [
            'foreignKey' => 'person_id',
        ]);
        $this->hasMany('Phones', [
            'foreignKey' => 'person_id',
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
            ->nonNegativeInteger('company_id')
            ->notEmptyString('company_id');

        $validator
            ->scalar('name')
            ->maxLength('name', 250)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('slug')
            ->maxLength('slug', 250)
            ->requirePresence('slug', 'create')
            ->notEmptyString('slug');

        $validator
            ->scalar('title')
            ->maxLength('title', 250)
            ->allowEmptyString('title');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        $validator
            ->email('email')
            ->allowEmptyString('email');

        $validator
            ->scalar('email2')
            ->maxLength('email2', 100)
            ->allowEmptyString('email2');

        $validator
            ->scalar('keywords')
            ->maxLength('keywords', 1000)
            ->requirePresence('keywords', 'create')
            ->notEmptyString('keywords');

        $validator
            ->scalar('keywords_slug')
            ->maxLength('keywords_slug', 1000)
            ->requirePresence('keywords_slug', 'create')
            ->notEmptyString('keywords_slug');

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

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['company_id'], 'Companies'), ['errorField' => '0']);

        return $rules;
    }
}
