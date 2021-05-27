<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WeathersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WeathersTable Test Case
 */
class WeathersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\WeathersTable
     */
    public $Weathers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Weathers',
        'app.FishingResults',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Weathers') ? [] : ['className' => WeathersTable::class];
        $this->Weathers = TableRegistry::getTableLocator()->get('Weathers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Weathers);

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
