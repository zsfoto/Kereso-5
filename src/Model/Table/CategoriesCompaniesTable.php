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
 * CategoriesCompanies Model
 *
 * @property \App\Model\Table\CategoriesTable&\Cake\ORM\Association\BelongsTo $Categories
 * @property \App\Model\Table\CompaniesTable&\Cake\ORM\Association\BelongsTo $Companies
 *
 * @method \App\Model\Entity\CategoriesCompany newEmptyEntity()
 * @method \App\Model\Entity\CategoriesCompany newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\CategoriesCompany> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CategoriesCompany get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\CategoriesCompany findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\CategoriesCompany patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\CategoriesCompany> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CategoriesCompany|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\CategoriesCompany saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\CategoriesCompany>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CategoriesCompany>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CategoriesCompany>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CategoriesCompany> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CategoriesCompany>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CategoriesCompany>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CategoriesCompany>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CategoriesCompany> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CategoriesCompaniesTable extends Table
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

        $this->setTable('categories_companies');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER',
        ]);
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
            ->nonNegativeInteger('category_id')
            ->notEmptyString('category_id');

        $validator
            ->nonNegativeInteger('company_id')
            ->notEmptyString('company_id');

        $validator
            ->integer('pos')
            ->notEmptyString('pos');

        $validator
            ->nonNegativeInteger('visible')
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
        $rules->add($rules->isUnique(['category_id', 'company_id']), ['errorField' => '0']);
        $rules->add($rules->existsIn(['category_id'], 'Categories'), ['errorField' => '1']);
        $rules->add($rules->existsIn(['company_id'], 'Companies'), ['errorField' => '2']);

        return $rules;
    }
}
