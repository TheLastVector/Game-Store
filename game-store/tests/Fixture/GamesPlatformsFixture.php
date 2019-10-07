<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * GamesPlatformsFixture
 */
class GamesPlatformsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'game_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'platform_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'game_id' => ['type' => 'index', 'columns' => ['game_id'], 'length' => []],
            'platform_id' => ['type' => 'index', 'columns' => ['platform_id'], 'length' => []],
            'game_id_2' => ['type' => 'index', 'columns' => ['game_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'games_platforms_ibfk_2' => ['type' => 'foreign', 'columns' => ['platform_id'], 'references' => ['platforms', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'games_platforms_ibfk_3' => ['type' => 'foreign', 'columns' => ['game_id'], 'references' => ['games', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'game_id' => 1,
                'platform_id' => 1
            ],
        ];
        parent::init();
    }
}
