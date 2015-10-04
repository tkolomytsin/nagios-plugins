<?php
# Plugin: check_iferrors_freebsd

$opt[1] = "--vertical-label \"events/sec\" --base 1024 -l 0 --title \"$NAGIOS_DISP_SERVICEDESC on $hostname\" ";
$ds_name[1] = "Errors & Collisions";

$def[1] = rrd::def("var1", $RRDFILE[1], $DS[1]);
$def[1] .= rrd::def("var2", $RRDFILE[2], $DS[2]);
$def[1] .= rrd::def("var3", $RRDFILE[3], $DS[3]);
$def[1] .= rrd::area("var1", "#00CC00", "Input Errors\t");
$def[1] .= rrd::gprint("var1", array("LAST", "AVERAGE", "MAX"), "%.2lf %se/s");
$def[1] .= rrd::line1("var2", "#0066B3", "Output Errors\t");
$def[1] .= rrd::gprint("var2", array("LAST", "AVERAGE", "MAX"), "%.2lf %se/s");
$def[1] .= rrd::line1("var3", "#FF8000", "Collisions\t\t");
$def[1] .= rrd::gprint("var3", array("LAST", "AVERAGE", "MAX"), "%.2lf %se/s");

?>