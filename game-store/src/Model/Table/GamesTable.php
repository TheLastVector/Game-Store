<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Games Model
 *
 * @property \App\Model\Table\PlatformsTable&\Cake\ORM\Association\BelongsToMany $Platforms
 * @property \App\Model\Table\TagsTable&\Cake\ORM\Association\BelongsToMany $Tags
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsToMany $Users
 *
 * @method \App\Model\Entity\Game get($primaryKey, $options = [])
 * @method \App\Model\Entity\Game newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Game[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Game|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Game saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Game patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Game[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Game findOrCreate($search, callable $callback = null, $options = [])
 */
class GamesTable extends Table
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

        $this->setTable('games');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Files', [
            'foreignKey' => 'game_id',
            'targetForeignKey' => 'file_id',
            'joinTable' => 'files_games'
        ]);
        $this->belongsToMany('Platforms', [
            'foreignKey' => 'game_id',
            'targetForeignKey' => 'platform_id',
            'joinTable' => 'games_platforms'
        ]);
        $this->belongsToMany('Tags', [
            'foreignKey' => 'game_id',
            'targetForeignKey' => 'tag_id',
            'joinTable' => 'games_tags'
        ]);
        $this->belongsToMany('Users', [
            'foreignKey' => 'game_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'games_users'
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
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->decimal('price')
            ->requirePresence('price', 'create')
            ->notEmptyString('price');

        $validator
            ->integer('number_of_players')
            ->allowEmpty('number_of_players');
            /*->requirePresence('number_of_players', 'create')*/
            /*->notEmptyString('number_of_players');*/

        $validator
            ->scalar('description')
            ->maxLength('description', 1000)
            ->allowEmpty('description');
            /*->requirePresence('description', 'create')*/
            /*->notEmptyString('description');*/

        $validator
            ->integer('release_date')
            ->requirePresence('release_date', 'create')
            ->notEmptyString('release_date');

        return $validator;
    }
}
