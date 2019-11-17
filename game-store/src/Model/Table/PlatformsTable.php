<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Platforms Model
 *
 * @property \App\Model\Table\GamesTable&\Cake\ORM\Association\BelongsToMany $Games
 *
 * @method \App\Model\Entity\Platform get($primaryKey, $options = [])
 * @method \App\Model\Entity\Platform newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Platform[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Platform|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Platform saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Platform patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Platform[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Platform findOrCreate($search, callable $callback = null, $options = [])
 */
class PlatformsTable extends Table
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

        $this->setTable('platforms');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Games', [
            'foreignKey' => 'platform_id',
            'targetForeignKey' => 'game_id',
            'joinTable' => 'games_platforms'
        ]);

        $this->hasMany('Subplatforms', ['foreignKey' => 'platform_id']);
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
            ->maxLength('name', 30)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        return $validator;
    }
}
