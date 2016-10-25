<?php

namespace Palmtree\NameConverter;

class SnakeCaseToHumanNameConverter {
	public function normalize( $propertyName ) {
		return ucwords( trim( str_replace( '_', ' ', $propertyName ) ) );
	}

	public function denormalize( $propertyName ) {
		return strtolower( str_replace( ' ', '_', $propertyName ) );
	}
}
