<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Abstracts\DataService;
use App\Exceptions\DataServiceModelNotSet;
use Tests\TestCase;

class DataServiceTest extends TestCase
{
    public function testModelMustBeSet(): void
    {
        $this->expectException(DataServiceModelNotSet::class);

        $service = new class () extends DataService {
            // Intentionally not set the Data Service Model
        };

        $service->all();
    }
}
