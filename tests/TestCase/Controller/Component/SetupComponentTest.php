<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\SetupComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\SetupComponent Test Case
 */
class SetupComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\SetupComponent
     */
    protected $Setup;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Setup = new SetupComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Setup);

        parent::tearDown();
    }
}
