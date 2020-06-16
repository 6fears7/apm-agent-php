--TEST--
Boolean configuration option value 0 (in this case using environment variable) should be interpreted as false
--SKIPIF--
<?php if ( ! extension_loaded( 'elasticapm' ) ) die( 'skip'.'Extension elasticapm must be installed' ); ?>
--ENV--
ELASTIC_APM_ENABLED=0
ELASTIC_APM_LOG_LEVEL_STDERR=OFF
--FILE--
<?php
declare(strict_types=1);
require __DIR__ . '/../tests_util/tests_util.php';

elasticApmAssertSame("getenv('ELASTIC_APM_ENABLED')", getenv('ELASTIC_APM_ENABLED'), '0');

elasticApmAssertSame('elasticapm_is_enabled()', elasticapm_is_enabled(), false);

echo 'Test completed'
?>
--EXPECT--
Test completed
