<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GamesPlatformsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GamesPlatformsTable Test Case
 */
class GamesPlatformsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\GamesPlatformsTable
     */
    public $GamesPlatforms;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.GamesPlatforms',
        'app.Games',
        'app.Platforms'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('GamesPlatforms') ? [] : ['className' => GamesPlatformsTable::class];
        $this->GamesPlatforms = TableRegistry::getTableLocator()->get('GamesPlatforms', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->GamesPlatforms);

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
