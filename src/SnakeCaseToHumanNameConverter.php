<?php

declare(strict_types=1);

namespace Palmtree\NameConverter;

class SnakeCaseToHumanNameConverter implements NameConverterInterface
{
    public function normalize(string $input): string
    {
        return ucwords(trim(str_replace('_', ' ', $input)));
    }

    public function denormalize(string $input): string
    {
        return strtolower(str_replace(' ', '_', trim($input)));
    }
}
