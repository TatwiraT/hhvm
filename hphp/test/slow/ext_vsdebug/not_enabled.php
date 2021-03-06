<?hh

require(__DIR__ . '/common.inc');

/*
 * Not enabled test: verify that if --mode vsdebug is not specified, the
 * VSDebug extension is not listening and the script executes without waiting
 * for the debugger.
 */
$descriptorspec = array(
   0 => array("pipe", "r"), // stdin
   1 => array("pipe", "w"), // stdout
   2 => array("pipe", "w")  // stderr
);

$cmd = getHhvmPath() . " " . __DIR__ . "/not_enabled.php.test";
$process = proc_open($cmd, $descriptorspec, &$pipes);
if (!is_resource($process)) {
  throw new UnexpectedValueException("Failed to open child process!");
}

$stdout = $pipes[1];
$stderr = $pipes[2];
echo stream_get_contents($stdout);
echo stream_get_contents($stderr);

foreach ($pipes as $pipe) {
  fclose($pipe);
}

proc_close($process);
