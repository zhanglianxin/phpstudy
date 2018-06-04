<?php

// http://php.net/manual/en/language.operators.comparison.php#language.operators.comparison.ternary
// http://php.net/manual/en/migration70.new-features.php#migration70.new-features.null-coalesce-op

$a = 1;
$b = 'b';

var_dump($a ?? $b); // 1
var_dump($a ?: $b); // 1
echo PHP_EOL;

$a = 0;

var_dump($a ?? $b); // 0
var_dump($a ?: $b); // "b"
echo PHP_EOL;

$a = null;

var_dump($a ?? $b); // "b"
var_dump($a ?: $b); // "b"
echo PHP_EOL;

$a = false;

var_dump($a ?? $b); // false
var_dump($a ?: $b); // "b"
echo PHP_EOL;

$a = [];

var_dump($a ?? $b); // []
var_dump($a ?: $b); // "b"
echo PHP_EOL;

var_dump(2 > 1 ?? 3); // true
var_dump(2 > 1 ?: 3); // true
echo PHP_EOL;

var_dump(0 > 1 ?? 3); // false
var_dump(0 > 1 ?: 3); // 3
