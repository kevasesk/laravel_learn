<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class PageTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_sum()
    {
        $this->assertEquals(
            10,
            \App\Models\Page::sum(10,0)
        );
    }
}
