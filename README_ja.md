# BVP Trimmer

[English](./README.md) | [日本語](./README_ja.md)

[![Build Status](https://github.com/shimomo/bvp-trimmer/workflows/Tests/badge.svg)](https://github.com/shimomo/bvp-trimmer/actions?query=workflow%3Atests)
[![codecov](https://codecov.io/gh/shimomo/bvp-trimmer/graph/badge.svg?token=27E93D01MN)](https://codecov.io/gh/shimomo/bvp-trimmer)
[![PHP Version Require](https://poser.pugx.org/bvp/trimmer/require/php)](https://packagist.org/packages/bvp/trimmer)
[![Latest Stable Version](https://poser.pugx.org/bvp/trimmer/v/stable)](https://packagist.org/packages/bvp/trimmer)
[![Latest Unstable Version](https://poser.pugx.org/bvp/trimmer/v/unstable)](https://packagist.org/packages/bvp/trimmer)
[![License](https://poser.pugx.org/bvp/trimmer/license)](https://packagist.org/packages/bvp/trimmer)

BVP Trimmer は、PHP 組み込みの trim / ltrim / rtrim 関数を拡張し、配列やオブジェクトにも適用可能にするユーティリティパッケージです。

## 特徴
- 配列のすべての文字列要素を再帰的にトリム
- オブジェクトのプロパティ（getter / setter 経由）をトリム
- ネストされた配列・オブジェクトにも対応
- trim / ltrim / rtrim を同様の使い勝手で提供

## インストール方法
```bash
composer require bvp/trimmer
```

## 使用方法
```php
<?php

require __DIR__ . '/vendor/autoload.php';

use BVP\Trimmer\Trimmer;
```

### 文字列に対して
```php
Trimmer::trim(' trimmer ');                // "trimmer"
Trimmer::trim(' @trimmer@ ', "\x20\x40");  // "trimmer"

Trimmer::ltrim(' trimmer ');               // "trimmer "
Trimmer::ltrim(' @trimmer@ ', "\x20\x40"); // "trimmer@ "

Trimmer::rtrim(' trimmer ');               // " trimmer"
Trimmer::rtrim(' @trimmer@ ', "\x20\x40"); // " @trimmer"
```

### 配列に対して
```php
Trimmer::trim([' trimmerA ']);
// => ["trimmerA"]

Trimmer::trim([' trimmerA ', [' trimmerB ']]);
// => ["trimmerA", ["trimmerB"]]

Trimmer::trim([' trimmerA ', 1, 1.0, true, null]);
// => ["trimmerA", 1, 1.0, true, null]

Trimmer::trim([' trimmerA ', [' trimmerB ', 1, 1.0, true, null]]);
// => ["trimmerA", ["trimmerB", 1, 1.0, true, null]]
```

ltrim, rtrim も同様に使用可能ですが、冗長を避けるためここでは省略しています。

### オブジェクトに対して
プロパティのトリムは getter / setter が定義されている必要があります。ネストしたオブジェクトにも対応します。

```php
$objectA = new class {
    private string $propertyA = ' trimmerA ';
    private string $propertyB = ' trimmerB '; // このプロパティはトリムされません。
    public function getPropertyA(): string { return $this->propertyA; }
    public function setPropertyA(string $value): void { $this->propertyA = $value; }
    public function getPropertyB(): string { return $this->propertyB; }
};

Trimmer::trim($objectA);
// $propertyA がトリムされ、$propertyB はそのままです。
```

ネストされたオブジェクトも処理可能
```php
$objectB = new class($objectA) {
    private string $propertyC = ' trimmerC ';
    private string $propertyD = ' trimmerD '; // このプロパティはトリムされません。
    private object $objectA;
    public function __construct(object $objectA) {
        $this->objectA = $objectA;
    }
    public function getPropertyC(): string { return $this->propertyC; }
    public function setPropertyC(string $value): void { $this->propertyC = $value; }
    public function getPropertyD(): string { return $this->propertyD; }
    public function getObjectA(): object { return $this->objectA; }
};

Trimmer::trim($objectB);
// $propertyC と $objectA->propertyA がトリムされます。$propertyD と $objectA->propertyB はそのままです。
```

ltrim, rtrim も同様に使用可能ですが、冗長を避けるためここでは省略しています。

## 備考
`Trimmer::trim`, `Trimmer::ltrim`, `Trimmer::rtrim` はすべて **非破壊的** です（新しい値を返します）。

## ライセンス
このパッケージは [MIT license](LICENSE) のもとで公開されています。
