<?php
class test {
  function stream_stat() {
    echo "stat\n";
    return array(0);
  }
  function url_stat($path) {
    echo "url\n";
    return array(0);
  }
}

<<__EntryPoint>>
function main_realpath_no_streams() {
stream_register_wrapper("test", "test");
var_dump(realpath("test://hello"));
echo "neither stream_stat nor url_stat\n";
}
