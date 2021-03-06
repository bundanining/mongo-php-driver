--TEST--
Decimal128: [basx319] Engineering notation tests
--DESCRIPTION--
Generated by scripts/convert-bson-corpus-tests.php

DO NOT EDIT THIS FILE
--FILE--
<?php

require_once __DIR__ . '/../utils/tools.php';

$bson = hex2bin('180000001364000A00000000000000000000000000463000');

// BSON to Canonical BSON
echo bin2hex(fromPHP(toPHP($bson))), "\n";

// BSON to Canonical extJSON
echo json_canonicalize(toExtendedJSON($bson)), "\n";

$json = '{"d" : {"$numberDecimal" : "10e3"}}';

// extJSON to Canonical extJSON
echo json_canonicalize(toExtendedJSON(fromJSON($json))), "\n";

$canonicalJson = '{"d" : {"$numberDecimal" : "1.0E+4"}}';

// Canonical extJSON to Canonical extJSON
echo json_canonicalize(toExtendedJSON(fromJSON($canonicalJson))), "\n";

// extJSON to Canonical BSON
echo bin2hex(fromJSON($json)), "\n";

// Canonical extJSON to Canonical BSON
echo bin2hex(fromJSON($canonicalJson)), "\n";

?>
===DONE===
<?php exit(0); ?>
--EXPECT--
180000001364000a00000000000000000000000000463000
{"d":{"$numberDecimal":"1.0E+4"}}
{"d":{"$numberDecimal":"1.0E+4"}}
{"d":{"$numberDecimal":"1.0E+4"}}
180000001364000a00000000000000000000000000463000
180000001364000a00000000000000000000000000463000
===DONE===