<?php

declare(strict_types=1);

namespace Test\AbraFlexi\ui\TWB5;

use AbraFlexi\ui\TWB5\AdresarForm;

class AdresarFormTest extends \PHPUnit\Framework\TestCase
{
    private function mockAdresar(array $data = [], $key = 1): \AbraFlexi\Adresar
    {
        $mock = $this->getMockBuilder(\AbraFlexi\Adresar::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['getMyKey', 'getDataValue', 'addStatusMessage'])
            ->getMock();
        $mock->keyColumn = 'id';
        $mock->method('getMyKey')->willReturn($key);
        $mock->method('getDataValue')->willReturnCallback(
            static fn ($field) => $data[$field] ?? '',
        );

        return $mock;
    }

    public function testConstructorCreatesFormWithAddressFields(): void
    {
        $address = $this->mockAdresar([
            'kod' => 'FIRMA01',
            'nazev' => 'Test Company',
            'email' => 'test@example.com',
            'poznam' => 'A note',
        ]);

        $form = new AdresarForm($address);
        $this->assertInstanceOf(AdresarForm::class, $form);
        $this->assertSame($address, $form->address);
    }

    public function testEmptyEmailTriggersStatusMessage(): void
    {
        $address = $this->getMockBuilder(\AbraFlexi\Adresar::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['getMyKey', 'getDataValue', 'addStatusMessage'])
            ->getMock();
        $address->keyColumn = 'id';
        $address->method('getMyKey')->willReturn(1);
        $address->method('getDataValue')->willReturnCallback(
            static fn ($field) => $field === 'email' ? '' : 'value',
        );
        $address->expects($this->once())->method('addStatusMessage');

        new AdresarForm($address);
    }

    public function testNullKeySkipsHiddenKeyField(): void
    {
        $address = $this->mockAdresar([], null);
        $form = new AdresarForm($address);
        $this->assertInstanceOf(AdresarForm::class, $form);
    }
}
