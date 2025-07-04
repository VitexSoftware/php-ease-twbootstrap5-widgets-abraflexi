<?php

namespace Test\AbraFlexi\ui\TWB5;

use AbraFlexi\ui\TWB5\EmbedResponsivePDF;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2025-06-26 at 09:26:11.
 */
class EmbedResponsivePDFTest extends \PHPUnit\Framework\TestCase {

    /**
     * @var EmbedResponsivePDF
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void {
        $this->object = new EmbedResponsivePDF();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown(): void {
        
    }

    public function testObjectPdfIsGeneratedCorrectly()
    {
        $mockSource = $this->createMock(\AbraFlexi\RO::class);
        $mockSource->expects($this->once())
            ->method('getEvidence')
            ->willReturn('invoice');
        $mockSource->expects($this->once())
            ->method('getMyKey')
            ->willReturn('123');

        // Patch: skip addUrlParams, just check for expected substrings
        $embed = new EmbedResponsivePDF($mockSource, 'customfeeder.php', 'testreport');
        $reflection = new \ReflectionClass($embed);
        $contentProperty = $reflection->getParentClass()->getProperty('content');
        $contentProperty->setAccessible(true);
        $content = $contentProperty->getValue($embed);
        $this->assertStringContainsString('<object', $content);
        $this->assertStringContainsString('customfeeder.php', $content);
        $this->assertStringContainsString('evidence=invoice', $content);
        $this->assertStringContainsString('id=123', $content);
        $this->assertStringContainsString('report-name=testreport', $content);
    }

    public function testDefaultFeederIsUsed()
    {
        $mockSource = $this->createMock(\AbraFlexi\RO::class);
        $mockSource->expects($this->once())
            ->method('getEvidence')
            ->willReturn('invoice');
        $mockSource->expects($this->once())
            ->method('getMyKey')
            ->willReturn('456');

        $embed = new EmbedResponsivePDF($mockSource);
        $reflection = new \ReflectionClass($embed);
        $contentProperty = $reflection->getParentClass()->getProperty('content');
        $contentProperty->setAccessible(true);
        $content = $contentProperty->getValue($embed);
        $this->assertStringContainsString('getpdf.php', $content);
        $this->assertStringContainsString('evidence=invoice', $content);
        $this->assertStringContainsString('id=456', $content);
    }
}
