<?php

namespace App\Tests\fixtures;

use PHPUnit\Framework\TestCase;

class values extends TestCase
{
    /**
     * return string[][]  // <-- this is method return array
     */
    public function provideCreate(): array// <-- here enter 'title'=>['expected','actual']

    {
        return [
            'one' => ['image1', 'image1'],
            'two' => ['image2', 'image2'],
            'three' => ['image3', 'image3'],
        ];
    }

}
