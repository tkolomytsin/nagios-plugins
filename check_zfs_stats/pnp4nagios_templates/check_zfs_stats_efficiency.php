<?php
# Plugin: check_zfs_stats_efficiency

$opt[1] = "--vertical-label \"%\" -u 100 -l 0 --title \"$NAGIOS_DISP_SERVICEDESC on $hostname\" ";
$ds_name[1] = "ZFS ARC Efficiency";

$def[1] = rrd::def("var1", $RRDFILE[1], $DS[1]);
$def[1] .= rrd::def("var2", $RRDFILE[2], $DS[2]);
$def[1] .= rrd::def("var3", $RRDFILE[3], $DS[3]);
$def[1] .= rrd::def("var4", $RRDFILE[4], $DS[4]);
$def[1] .= rrd::def("var5", $RRDFILE[5], $DS[5]);
$def[1] .= rrd::area("var1", "#00CC00", "Hit Ratio\t\t\t\t");
$def[1] .= rrd::gprint("var1", array("LAST", "AVERAGE", "MAX"), "%.2lf");
$def[1] .= rrd::area("var2", "#0066B3", "Miss Ratio\t\t\t\t");
$def[1] .= rrd::gprint("var2", array("LAST", "AVERAGE", "MAX"), "%.2lf");
$def[1] .= rrd::line1("var3", "#FF8000", "Actual Hit Ratio\t\t\t");
$def[1] .= rrd::gprint("var3", array("LAST", "AVERAGE", "MAX"), "%.2lf");
$def[1] .= rrd::line1("var4", "#FFCC00", "Data Demand Efficiency\t\t");
$def[1] .= rrd::gprint("var4", array("LAST", "AVERAGE", "MAX"), "%.2lf");
$def[1] .= rrd::line1("var5", "#330099", "Data Prefetch Efficiency\t");
$def[1] .= rrd::gprint("var5", array("LAST", "AVERAGE", "MAX"), "%.2lf");

?>