<?php

declare(strict_types=1);

namespace Palmtree\NameConverter\Tests;

use Palmtree\NameConverter\SnakeCaseToCamelCaseNameConverter;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class SnakeCaseToCamelCaseNameConverterTest extends TestCase
{
    private SnakeCaseToCamelCaseNameConverter $converter;

    protected function setUp(): void
    {
        $this->converter = new SnakeCaseToCamelCaseNameConverter();
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
            'simple_case' => ['my_input', 'myInput'],
            'single_word' => ['myinput', 'myinput'],
            'multiple_underscores' => ['my_long_input_name', 'myLongInputName'],
            'leading_underscore' => ['_my_input', 'myInput'],
            'trailing_underscore' => ['my_input_', 'myInput'],
            'consecutive_underscores' => ['my__input', 'myInput'],
            'all_lowercase' => ['simple', 'simple'],
            'uppercase_after_underscore' => ['my_Input', 'myInput'],
        ];
    }

    public static function denormalizeDataProvider(): array
    {
        return [
            'simple_case' => ['myInput', 'my_input'],
            'single_word' => ['simple', 'simple'],
            'multiple_capitals' => ['myLongInputName', 'my_long_input_name'],
            'leading_capital' => ['MyInput', 'my_input'],
            'consecutive_capitals' => ['myXMLInput', 'my_x_m_l_input'],
            'all_lowercase' => ['myinput', 'myinput'],
            'all_uppercase' => ['CAPS', 'c_a_p_s'],
        ];
    }
}

