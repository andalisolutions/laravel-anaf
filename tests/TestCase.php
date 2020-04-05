<?php

namespace Andali\Anaf\Tests;

use Andali\Anaf\AnafServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function tearDown(): void
    {
        parent::tearDown();
    }

    protected function getPackageProviders($app)
    {
        return AnafServiceProvider::class;
    }
}
