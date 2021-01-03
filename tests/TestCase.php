<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Testing\TestResponse;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use PHPUnit\Framework\Assert;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutExceptionHandling();

        // get data passed to view
        TestResponse::macro('data', function ($key) {
            return $this->original->getData()[$key];
        });

        EloquentCollection::macro('assertEquals', function($items) {
            Assert::assertCount($items->count(), $this);
        });
    }
}
