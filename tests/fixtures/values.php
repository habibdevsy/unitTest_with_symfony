<?php

namespace App\Tests\fixtures;

use PHPUnit\Framework\TestCase;

class values extends TestCase
{
    /**
     * return string[][]  
     */
    public function provideCreate(): array

    {
        return [
            'one' => ['image1', 'image1'],
            'two' => ['image2', 'image2'],
            'three' => ['image3', 'image3'],
        ];
    }

}
