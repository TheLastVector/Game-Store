<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PlatformsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PlatformsTable Test Case
 */
class PlatformsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PlatformsTable
     */
    public $Platforms;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Platforms',
        'app.Games'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Platforms') ? [] : ['className' => PlatformsTable::class];
        $this->Platforms = TableRegistry::getTableLocator()->get('Platforms', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Platforms);

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
}
