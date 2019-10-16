<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FilesGamesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FilesGamesTable Test Case
 */
class FilesGamesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FilesGamesTable
     */
    public $FilesGames;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.FilesGames',
        'app.Games',
        'app.Files'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('FilesGames') ? [] : ['className' => FilesGamesTable::class];
        $this->FilesGames = TableRegistry::getTableLocator()->get('FilesGames', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FilesGames);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
