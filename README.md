# Trimmer

[![Build Status](https://github.com/BoatraceVentureProject/Trimmer/workflows/Tests/badge.svg)](https://github.com/BoatraceVentureProject/Trimmer/actions?query=workflow%3Atests)
[![codecov](https://codecov.io/gh/BoatraceVentureProject/Trimmer/graph/badge.svg?token=Z1cc7LFuPV)](https://codecov.io/gh/BoatraceVentureProject/Trimmer)
[![Latest Stable Version](https://poser.pugx.org/bvp/trimmer/v/stable)](https://packagist.org/packages/bvp/trimmer)
[![Latest Unstable Version](https://poser.pugx.org/bvp/trimmer/v/unstable)](https://packagist.org/packages/bvp/trimmer)
[![License](https://poser.pugx.org/bvp/trimmer/license)](https://packagist.org/packages/bvp/trimmer)

The BVP Trimmer package extends PHP's internal functions trim, ltrim, and rtrim to also be applicable to arrays and objects.

## Installation
```bash
composer require bvp/trimmer
```

## Usage
```php
<?php

require __DIR__ . '/vendor/autoload.php';

use BVP\Trimmer\Trimmer;
```

### For strings
```php
var_dump(Trimmer::trim(' trimmer '));                // string(7) "trimmer"
var_dump(Trimmer::trim(' @trimmer@ ', "\x20\x40"));  // string(7) "trimmer"

var_dump(Trimmer::ltrim(' trimmer '));               // string(8) "trimmer "
var_dump(Trimmer::ltrim(' @trimmer@ ', "\x20\x40")); // string(9) "trimmer@ "

var_dump(Trimmer::rtrim(' trimmer '));               // string(8) " trimmer"
var_dump(Trimmer::rtrim(' @trimmer@ ', "\x20\x40")); // string(9) " @trimmer"
```

### For arrays
```php
var_dump(Trimmer::trim([' trimmerA ']));
/*------------------------------
array(1) {
  [0]=>string(8) "trimmerA"
}
------------------------------*/

var_dump(Trimmer::trim([' trimmerA ', [' trimmerB ']]));
/*------------------------------
array(2) {
  [0]=>string(8) "trimmerA"
  [1]=>array(1) {
    [0]=>string(8) "trimmerB"
  }
}
------------------------------*/

var_dump(Trimmer::trim([' trimmerA ', 1, 1.0, true, null]));
/*------------------------------
array(5) {
  [0]=>string(8) "trimmerA"
  [1]=>int(1)
  [2]=>float(1)
  [3]=>bool(true)
  [4]=>NULL
}
------------------------------*/

var_dump(Trimmer::trim([' trimmerA ', [' trimmerB ', 1, 1.0, true, null]]));
/*------------------------------
array(2) {
  [0]=>string(8) "trimmerA"
  [1]=>array(5) {
    [0]=>string(8) "trimmerB"
    [1]=>int(1)
    [2]=>float(1)
    [3]=>bool(true)
    [4]=>NULL
  }
}
------------------------------*/

// We will omit examples for ltrim and rtrim to keep the documentation concise.
```

### For objects
Trimming properties requires both getters and setters. For objects within objects, getters for the inner object are also required.

```php
$objectA = new class {
    private string $propertyA = ' trimmerA ';
    private string $propertyB = ' trimmerB '; // This property is not subject to trimming.
    public function getPropertyA(): string { return $this->propertyA; }
    public function setPropertyA(string $value): void { $this->propertyA = $value; }
    public function getPropertyB(): string { return $this->propertyB; }
};

var_dump(Trimmer::trim($objectA));
/*------------------------------
object(class@anonymous)#2 (2) {
  ["propertyA":"class@anonymous":private]=>string(8) "trimmerA"
  ["propertyB":"class@anonymous":private]=>string(10) " trimmerB "
}
------------------------------*/

$objectB = new class($objectA) {
    private string $propertyC = ' trimmerC ';
    private string $propertyD = ' trimmerD '; // This property is not subject to trimming.
    private object $objectA;
    public function __construct(object $objectA) {
        $this->objectA = $objectA;
    }
    public function getPropertyC(): string { return $this->propertyC; }
    public function setPropertyC(string $value): void { $this->propertyC = $value; }
    public function getPropertyD(): string { return $this->propertyD; }
    public function getObjectA(): object { return $this->objectA; }
};

var_dump(Trimmer::trim($objectB));
/*------------------------------
object(class@anonymous)#6 (3) {
  ["propertyC":"class@anonymous":private]=>string(8) "trimmerC"
  ["propertyD":"class@anonymous":private]=>string(10) " trimmerD "
  ["objectA":"class@anonymous":private]=>object(class@anonymous)#2 (2) {
    ["propertyA":"class@anonymous":private]=>string(8) "trimmerA"
    ["propertyB":"class@anonymous":private]=>string(10) " trimmerB "
  }
}
------------------------------*/

// We will omit examples for ltrim and rtrim to keep the documentation concise.
```

## License
The BVP Trimmer package is open source software licensed under the [MIT license](LICENSE).
