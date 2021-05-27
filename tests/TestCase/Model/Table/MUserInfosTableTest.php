<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MUserInfosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MUserInfosTable Test Case
 */
class MUserInfosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MUserInfosTable
     */
    public $MUserInfos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.MUserInfos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MUserInfos') ? [] : ['className' => MUserInfosTable::class];
        $this->MUserInfos = TableRegistry::getTableLocator()->get('MUserInfos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MUserInfos);

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
