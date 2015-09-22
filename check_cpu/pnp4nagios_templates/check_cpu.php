<?php
# Plugin: check_cpu

$opt[1] = "--vertical-label \"%\" -u 100 -l 0 --title \"$NAGIOS_DISP_SERVICEDESC on $hostname\" ";
$ds_name[1] = "CPU Usage";

$def[1] = rrd::def("var1", $RRDFILE[1], $DS[1]);
$def[1] .= rrd::def("var2", $RRDFILE[2], $DS[2]);
$def[1] .= rrd::def("var3", $RRDFILE[3], $DS[3]);
$def[1] .= rrd::area("var3", "#00CC00", "System\t", "stack1");
$def[1] .= rrd::gprint("var3", array("LAST", "AVERAGE", "MAX"), "%.lf");
$def[1] .= rrd::area("var2", "#FF8000", "User\t\t", "stack1");
$def[1] .= rrd::gprint("var2", array("LAST", "AVERAGE", "MAX"), "%.lf");
$def[1] .= rrd::line1("var1", "#330099", "Usage\t\t");
$def[1] .= rrd::gprint("var1", array("LAST", "AVERAGE", "MAX"), "%.lf");

?>