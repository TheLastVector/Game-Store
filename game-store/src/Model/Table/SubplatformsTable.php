<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Subplatforms Model
 *
 * @property \App\Model\Table\PlatformsTable&\Cake\ORM\Association\BelongsTo $Platforms
 *
 * @method \App\Model\Entity\Subplatform get($primaryKey, $options = [])
 * @method \App\Model\Entity\Subplatform newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Subplatform[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Subplatform|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Subplatform saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Subplatform patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Subplatform[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Subplatform findOrCreate($search, callable $callback = null, $options = [])
 */
class SubplatformsTable extends Table
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

        $this->setTable('subplatforms');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Platforms', [
            'foreignKey' => 'platform_id',
            'joinType' => 'INNER'
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

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
        $rules->add($rules->existsIn(['platform_id'], 'Platforms'));

        return $rules;
    }
}
