<?php

namespace Palmtree\NameConverter;

interface NameConverterInterface
{
    public function normalize($input);

    public function denormalize($output);
}
