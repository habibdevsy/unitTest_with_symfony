<?php

namespace App\Tests;

use App\AutoMapping;
use App\Entity\Images;
use App\Manager\ImageManager;
use App\Request\CreateImageRequest;
use App\Respons\CreateImageResponse;
use App\Service\ImageService;
use App\Tests\fixtures\values;
use PHPUnit\Framework\TestCase;

class ImageUnitTest extends TestCase
{
    private $mockImageManager;
    private $autoMapping;

    protected function setUp()
    {
        $this->mockImageManager = $this->createMock(ImageManager::class);
        $this->autoMapping = new AutoMapping();
    }

    /**
     * @dataProvider provideCreate
     */
    public function testCreateWithDataProvider(
        string $expected,
        string $actual
    ) {
        $CreateImageResponse = new CreateImageResponse();
        $CreateImageResponse->image = $expected;

        $Images = new Images();
        $Images->image = $actual;

        $CreateImageRequest = new CreateImageRequest();

        $this->mockImageManager
            ->method('create')
            ->willReturn($Images);

        $imageService = new ImageService($this->mockImageManager, $this->autoMapping);

        $this->assertEquals($CreateImageResponse, $imageService->create($CreateImageRequest));

    }

    /**
     * return string[][]     
     */
    public function provideCreate()
    {
        $result = new values();
        return $result->provideCreate();
    }
}
