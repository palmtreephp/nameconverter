<?php

namespace Palmtree\NameConverter;

class SnakeCaseToHumanNameConverter implements NameConverterInterface
{
    public function normalize($input)
    {
        return ucwords(trim(str_replace('_', ' ', $input)));
    }

    public function denormalize($input)
    {
        return strtolower(str_replace(' ', '_', $input));
    }
}
