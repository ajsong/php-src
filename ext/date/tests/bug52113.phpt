--TEST--
Bug #52113 (Seg fault while creating (by unserialization) DatePeriod)
--INI--
date.timezone=UTC
--FILE--
<?php
$start = new DateTime('2003-01-02 08:00:00');
$end = new DateTime('2003-01-02 12:00:00');
$diff = $start->diff($end);
$p = new DatePeriod($start, $diff, 2);
$diff_s = serialize($diff);
var_dump($diff, $diff_s);
var_export($diff);

$diff_un = unserialize($diff_s);
$p = new DatePeriod($start, $diff_un, 2);
var_dump($diff_un, $p);

$unser = \DateInterval::__set_state(array(
   'y' => 7,
   'm' => 6,
   'd' => 5,
   'h' => 4,
   'i' => 3,
   's' => 2,
   'f' => 0.876543,
   'invert' => 1,
   'days' => 2400,
));

$p = new DatePeriod($start, $diff_un, 2);
var_dump($unser, $p);

?>
--EXPECTF--
object(DateInterval)#%d (%d) {
  ["y"]=>
  int(0)
  ["m"]=>
  int(0)
  ["d"]=>
  int(0)
  ["h"]=>
  int(4)
  ["i"]=>
  int(0)
  ["s"]=>
  int(0)
  ["f"]=>
  float(0)
  ["invert"]=>
  int(0)
  ["days"]=>
  int(0)
  ["from_string"]=>
  bool(false)
}
string(164) "O:12:"DateInterval":10:{s:1:"y";i:0;s:1:"m";i:0;s:1:"d";i:0;s:1:"h";i:4;s:1:"i";i:0;s:1:"s";i:0;s:1:"f";d:0;s:6:"invert";i:0;s:4:"days";i:0;s:11:"from_string";b:0;}"
\DateInterval::__set_state(array(
   'y' => 0,
   'm' => 0,
   'd' => 0,
   'h' => 4,
   'i' => 0,
   's' => 0,
   'f' => 0.0,
   'invert' => 0,
   'days' => 0,
   'from_string' => false,
))object(DateInterval)#%d (%d) {
  ["y"]=>
  int(0)
  ["m"]=>
  int(0)
  ["d"]=>
  int(0)
  ["h"]=>
  int(4)
  ["i"]=>
  int(0)
  ["s"]=>
  int(0)
  ["f"]=>
  float(0)
  ["invert"]=>
  int(0)
  ["days"]=>
  int(0)
  ["from_string"]=>
  bool(false)
}
object(DatePeriod)#%d (%d) {
  ["start"]=>
  object(DateTime)#%d (%d) {
    ["date"]=>
    string(26) "2003-01-02 08:00:00.000000"
    ["timezone_type"]=>
    int(3)
    ["timezone"]=>
    string(3) "UTC"
  }
  ["current"]=>
  NULL
  ["end"]=>
  NULL
  ["interval"]=>
  object(DateInterval)#%d (%d) {
    ["y"]=>
    int(0)
    ["m"]=>
    int(0)
    ["d"]=>
    int(0)
    ["h"]=>
    int(4)
    ["i"]=>
    int(0)
    ["s"]=>
    int(0)
    ["f"]=>
    float(0)
    ["invert"]=>
    int(0)
    ["days"]=>
    int(0)
    ["from_string"]=>
    bool(false)
  }
  ["recurrences"]=>
  int(3)
  ["include_start_date"]=>
  bool(true)
  ["include_end_date"]=>
  bool(false)
}
object(DateInterval)#%d (%d) {
  ["y"]=>
  int(7)
  ["m"]=>
  int(6)
  ["d"]=>
  int(5)
  ["h"]=>
  int(4)
  ["i"]=>
  int(3)
  ["s"]=>
  int(2)
  ["f"]=>
  float(0.876543)
  ["invert"]=>
  int(1)
  ["days"]=>
  int(2400)
  ["from_string"]=>
  bool(false)
}
object(DatePeriod)#%d (%d) {
  ["start"]=>
  object(DateTime)#%d (%d) {
    ["date"]=>
    string(26) "2003-01-02 08:00:00.000000"
    ["timezone_type"]=>
    int(3)
    ["timezone"]=>
    string(3) "UTC"
  }
  ["current"]=>
  NULL
  ["end"]=>
  NULL
  ["interval"]=>
  object(DateInterval)#%d (%d) {
    ["y"]=>
    int(0)
    ["m"]=>
    int(0)
    ["d"]=>
    int(0)
    ["h"]=>
    int(4)
    ["i"]=>
    int(0)
    ["s"]=>
    int(0)
    ["f"]=>
    float(0)
    ["invert"]=>
    int(0)
    ["days"]=>
    int(0)
    ["from_string"]=>
    bool(false)
  }
  ["recurrences"]=>
  int(3)
  ["include_start_date"]=>
  bool(true)
  ["include_end_date"]=>
  bool(false)
}
