<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FilesGames Model
 *
 * @property \App\Model\Table\GamesTable&\Cake\ORM\Association\BelongsTo $Games
 * @property \App\Model\Table\FilesTable&\Cake\ORM\Association\BelongsTo $Files
 *
 * @method \App\Model\Entity\FilesGame get($primaryKey, $options = [])
 * @method \App\Model\Entity\FilesGame newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FilesGame[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FilesGame|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FilesGame saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FilesGame patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FilesGame[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FilesGame findOrCreate($search, callable $callback = null, $options = [])
 */
class FilesGamesTable extends Table
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

        $this->setTable('files_games');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Games', [
            'foreignKey' => 'game_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Files', [
            'foreignKey' => 'file_id',
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
        $rules->add($rules->existsIn(['game_id'], 'Games'));
        $rules->add($rules->existsIn(['file_id'], 'Files'));

        return $rules;
    }
}
