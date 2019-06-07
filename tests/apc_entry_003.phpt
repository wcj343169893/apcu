--TEST--
APC: apcu_entry (fatal error)
--SKIPIF--
<?php require_once(dirname(__FILE__) . '/skipif.inc'); ?>
--INI--
apc.enabled=1
apc.enable_cli=1
--FILE--
<?php
$value = apcu_entry("test", function($key) {
    // Fatal error
    class X implements Y {}
});
?>
--EXPECTF--
Fatal error: Interface 'Y' not found in %s on line %d
