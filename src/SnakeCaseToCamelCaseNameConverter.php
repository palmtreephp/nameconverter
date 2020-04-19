<?php

namespace Palmtree\NameConverter;

class SnakeCaseToCamelCaseNameConverter implements NameConverterInterface
{
    /**
     * Converts a string like 'my_input' to 'myInput'.
     */
    public function normalize(string $input): string
    {
        return lcfirst(str_replace('_', '', ucwords($input, '_')));
    }

    /**
     * Converts a string like 'myInput' to 'my_input'.
     */
    public function denormalize(string $input): string
    {
        $lcPropertyName = lcfirst($input);
        $snakeCasedName = '';

        $len = \strlen($lcPropertyName);
        for ($i = 0; $i < $len; ++$i) {
            if (ctype_upper($lcPropertyName[$i])) {
                $snakeCasedName .= '_' . strtolower($lcPropertyName[$i]);
            } else {
                $snakeCasedName .= strtolower($lcPropertyName[$i]);
            }
        }

        return $snakeCasedName;
    }
}
