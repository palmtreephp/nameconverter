<?php

declare(strict_types=1);

namespace Palmtree\NameConverter;

class CamelCaseToHumanNameConverter implements NameConverterInterface
{
    public function normalize(string $input): string
    {
        // Insert spaces before uppercase letters and trim
        $spaced = preg_replace('/([A-Z])/', ' $1', $input);

        return ucwords(trim((string)$spaced));
    }

    public function denormalize(string $input): string
    {
        // Remove spaces and convert to camelCase
        $words = explode(' ', trim($input));
        $result = strtolower(array_shift($words));
        foreach ($words as $word) {
            $result .= ucfirst(strtolower($word));
        }

        return $result;
    }
}
