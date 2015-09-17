<?php
# Plugin: check_mikrotik_disk

$opt[1] = "--vertical-label \"Size in Bytes\" --base 1024 -l 0 --title \"$NAGIOS_DISP_SERVICEDESC on $hostname\" ";
$ds_name[1] = "Memory Usage";

$def[1] = rrd::def("var1", $RRDFILE[1], $DS[1]);
$def[1] .= rrd::cdef("var1_b", "var1,1024,*");
$def[1] .= rrd::def("var2", $RRDFILE[2], $DS[2]);
$def[1] .= rrd::cdef("var2_b", "var2,1024,*");

$def[1] .= rrd::area("var2_b", "#0066B3", "Total\t");
$def[1] .= rrd::gprint("var2_b", array("LAST", "AVERAGE", "MAX"), "%.2lf %sB");

$def[1] .= rrd::area("var1_b", "#00CC00", "Used\t");
$def[1] .= rrd::gprint("var1_b", array("LAST", "AVERAGE", "MAX"), "%.2lf %sB");

?>