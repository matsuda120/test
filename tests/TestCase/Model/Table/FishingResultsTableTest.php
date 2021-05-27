<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FishingResultsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FishingResultsTable Test Case
 */
class FishingResultsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FishingResultsTable
     */
    public $FishingResults;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.FishingResults',
        'app.Weathers',
        'app.Prefectures',
        'app.FishingTypes',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('FishingResults') ? [] : ['className' => FishingResultsTable::class];
        $this->FishingResults = TableRegistry::getTableLocator()->get('FishingResults', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FishingResults);

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
