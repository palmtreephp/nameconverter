<?php

namespace Palmtree\NameConverter;

class SnakeCaseToCamelCaseNameConverter implements NameConverterInterface
{
    /**
     * @var bool
     */
    private $lowerCamelCase;

    /**
     * @param bool $lowerCamelCase Use lowerCamelCase style
     */
    public function __construct(array $attributes = null, $lowerCamelCase = true)
    {
        $this->lowerCamelCase = $lowerCamelCase;
    }

    /**
     * Converts a string like 'my_input' to 'myInput'
     *
     * @param string $input
     *
     * @return string
     */
    public function normalize($input)
    {
        $output = lcfirst(str_replace('_', '', ucwords($input, '_')));

        return $output;
    }

    /**
     * Converts a string like 'myInput' to 'my_input'
     *
     * @param $input
     *
     * @return string
     */
    public function denormalize($input)
    {
        $lcPropertyName = lcfirst($input);
        $snakeCasedName = '';

        $len = strlen($lcPropertyName);
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
