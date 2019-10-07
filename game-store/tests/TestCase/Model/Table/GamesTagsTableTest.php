<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GamesTagsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GamesTagsTable Test Case
 */
class GamesTagsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\GamesTagsTable
     */
    public $GamesTags;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.GamesTags',
        'app.Games',
        'app.Tags'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('GamesTags') ? [] : ['className' => GamesTagsTable::class];
        $this->GamesTags = TableRegistry::getTableLocator()->get('GamesTags', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->GamesTags);

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
