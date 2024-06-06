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
 * Companyopenings Model
 *
 * @property \App\Model\Table\CompaniesTable&\Cake\ORM\Association\BelongsTo $Companies
 *
 * @method \App\Model\Entity\Companyopening newEmptyEntity()
 * @method \App\Model\Entity\Companyopening newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Companyopening> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Companyopening get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Companyopening findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Companyopening patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Companyopening> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Companyopening|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Companyopening saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Companyopening>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Companyopening>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Companyopening>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Companyopening> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Companyopening>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Companyopening>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Companyopening>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Companyopening> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CompanyopeningsTable extends Table
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

        $this->setTable('companyopenings');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Companies', [
            'foreignKey' => 'company_id',
            'joinType' => 'INNER',
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
