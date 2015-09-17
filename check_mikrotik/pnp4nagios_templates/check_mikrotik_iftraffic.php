<?php
# Plugin: check_mikrotik_iftraffic

$opt[1] = "--vertical-label \"Bytes/sec\" --base 1024 -l 0 --title \"$NAGIOS_DISP_SERVICEDESC on $hostname\" ";
$ds_name[1] = "Interface Traffic";

$def[1] = rrd::def("var1", $RRDFILE[1], $DS[1]);
$def[1] .= rrd::def("var2", $RRDFILE[2], $DS[2]);
$def[1] .= rrd::area("var1", "#00CC00", "In\t");
$def[1] .= rrd::gprint("var1", array("LAST", "AVERAGE", "MAX"), "%.2lf %sb/s");
$def[1] .= rrd::line1("var2", "#0066B3", "Out\t");
$def[1] .= rrd::gprint("var2", array("LAST", "AVERAGE", "MAX"), "%.2lf %sb/s");

?>