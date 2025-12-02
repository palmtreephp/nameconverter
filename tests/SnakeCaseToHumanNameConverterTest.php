<?php

declare(strict_types=1);

namespace Palmtree\NameConverter\Tests;

use Palmtree\NameConverter\SnakeCaseToHumanNameConverter;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class SnakeCaseToHumanNameConverterTest extends TestCase
{
    private SnakeCaseToHumanNameConverter $converter;

    protected function setUp(): void
    {
        $this->converter = new SnakeCaseToHumanNameConverter();
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

    /**
     * @return array<string, array{0: string, 1: string}>
     */
    public static function normalizeDataProvider(): array
    {
        return [
            'simple_case' => ['my_input', 'My Input'],
            'single_word' => ['myinput', 'Myinput'],
            'multiple_underscores' => ['my_long_input_name', 'My Long Input Name'],
            'leading_underscore' => ['_my_input', 'My Input'],
            'trailing_underscore' => ['my_input_', 'My Input'],
            'consecutive_underscores' => ['my__input', 'My  Input'],
        ];
    }

    /**
     * @return array<string, array{0: string, 1: string}>
     */
    public static function denormalizeDataProvider(): array
    {
        return [
            'simple_case' => ['My Input', 'my_input'],
            'single_word' => ['Myinput', 'myinput'],
            'multiple_words' => ['My Long Input Name', 'my_long_input_name'],
            'leading_space' => [' My Input', 'my_input'],
            'trailing_space' => ['My Input ', 'my_input'],
        ];
    }
}

