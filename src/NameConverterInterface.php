<?php

declare(strict_types=1);

namespace Palmtree\NameConverter;

interface NameConverterInterface
{
    public function normalize(string $input): string;

    public function denormalize(string $input): string;
}
