<?php

namespace Palmtree\NameConverter;

class SnakeCaseToCamelCaseNameConverter implements NameConverterInterface
{
    /**
     * Converts a string like 'my_input' to 'myInput'.
     *
     * @param string $input
     *
     * @return string
     */
    public function normalize($input)
    {
        return lcfirst(str_replace('_', '', ucwords($input, '_')));
    }

    /**
     * Converts a string like 'myInput' to 'my_input'.
     *
     * @param $input
     *
     * @return string
     */
    public function denormalize($input)
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
