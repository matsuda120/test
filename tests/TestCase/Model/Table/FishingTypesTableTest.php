<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FishingTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FishingTypesTable Test Case
 */
class FishingTypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FishingTypesTable
     */
    public $FishingTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.FishingTypes',
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
        $config = TableRegistry::getTableLocator()->exists('FishingTypes') ? [] : ['className' => FishingTypesTable::class];
        $this->FishingTypes = TableRegistry::getTableLocator()->get('FishingTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FishingTypes);

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
