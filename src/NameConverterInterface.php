<?php

namespace Palmtree\NameConverter;

interface NameConverterInterface
{
    public function normalize(string $input): string;

    public function denormalize(string $input): string;
}
