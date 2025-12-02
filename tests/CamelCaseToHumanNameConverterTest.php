<?php

declare(strict_types=1);

namespace Palmtree\NameConverter\Tests;

use Palmtree\NameConverter\CamelCaseToHumanNameConverter;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class CamelCaseToHumanNameConverterTest extends TestCase
{
    private CamelCaseToHumanNameConverter $converter;

    protected function setUp(): void
    {
        $this->converter = new CamelCaseToHumanNameConverter();
    }

    #[DataProvider('normalizeDataProvider')]
    public function testNormalize(string $input, string $expected): void
    {
        $result = $this->converter->normalize($input);
        $this->assertSame($expected, $result);
    }

    #[DataProvider('denormalizeDataProvider')]
    public function testDenormalize(string $input, string $expected): void
    {
        $result = $this->converter->denormalize($input);
        $this->assertSame($expected, $result);
    }

    public static function normalizeDataProvider(): array
    {
        return [
            'simple_case'          => ['myInput', 'My Input'],
            'single_word'          => ['myinput', 'Myinput'],
            'multiple_capitals'    => ['myLongInputName', 'My Long Input Name'],
            'leading_capital'      => ['MyInput', 'My Input'],
            'consecutive_capitals' => ['myXMLInput', 'My X M L Input'],
            'all_lowercase'        => ['simple', 'Simple'],
            'all_uppercase'        => ['CAPS', 'C A P S'],
        ];
    }

    public static function denormalizeDataProvider(): array
    {
        return [
            'simple_case'    => ['My Input', 'myInput'],
            'single_word'    => ['Simple', 'simple'],
            'multiple_words' => ['My Long Input Name', 'myLongInputName'],
            'leading_space'  => [' My Input', 'myInput'],
            'trailing_space' => ['My Input ', 'myInput'],
            'all_lowercase'  => ['my input', 'myInput'],
        ];
    }
}

