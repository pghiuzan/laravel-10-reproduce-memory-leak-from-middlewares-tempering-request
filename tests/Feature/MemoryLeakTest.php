<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;

class MemoryLeakTest extends TestCase
{
    private const int NUMBER_OF_ITERATIONS = 10000;

    /**
     * @dataProvider providesMemoryLeakTestIterations
     */
    public function testItDoesntRunOutOfMemory(int $iterationCount): void
    {
        $response = $this->get('/');

        $response->assertOk();
    }

    public static function providesMemoryLeakTestIterations(): array
    {
        return array_map(
            fn (int $iterationNumber): array => [$iterationNumber],
            range(0, self::NUMBER_OF_ITERATIONS),
        );
    }
}
