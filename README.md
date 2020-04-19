# :palm_tree: Palmtree NameConverter

## Requirements
* PHP >= 5.6

## Installation

Use composer to add the package to your dependencies:
```bash
composer require palmtree/form
```

## Usage Example

```php
$converter = new SnakeCaseToHumanNameConverter();
$converter->normalize('hello_world'); // Returns Hello World
$converter->denormalize('Hello World'); // Returns hello_world
```

## License

Released under the [MIT license](LICENSE)
