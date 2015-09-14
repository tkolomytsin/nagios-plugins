<?php
# Plugin: check_zfs_stats_utilization

$opt[1] = "--vertical-label \"Size in Bytes\" --base 1024 -l 0 --title \"$NAGIOS_DISP_SERVICEDESC on $hostname\" ";
$ds_name[1] = "ZFS ARC Size";

$def[1] = rrd::def("var1", $RRDFILE[1], $DS[1]);
$def[1] .= rrd::def("var2", $RRDFILE[2], $DS[2]);
$def[1] .= rrd::def("var3", $RRDFILE[3], $DS[3]);
$def[1] .= rrd::def("var4", $RRDFILE[4], $DS[4]);
$def[1] .= rrd::def("var5", $RRDFILE[5], $DS[5]);
$def[1] .= rrd::def("var6", $RRDFILE[6], $DS[6]);
$def[1] .= rrd::area("var1", "#00CC00", "Maximum Size\t\t\t");
$def[1] .= rrd::gprint("var1", array("LAST", "AVERAGE", "MAX"), "%.2lf %s");
$def[1] .= rrd::area("var2", "#0066B3", "Size\t\t\t\t\t");
$def[1] .= rrd::gprint("var2", array("LAST", "AVERAGE", "MAX"), "%.2lf %s");
$def[1] .= rrd::area("var3", "#FF8000", "Minimum Size\t\t\t");
$def[1] .= rrd::gprint("var3", array("LAST", "AVERAGE", "MAX"), "%.2lf %s");
$def[1] .= rrd::line1("var4", "#FFCC00", "Target Size\t\t\t\t");
$def[1] .= rrd::gprint("var4", array("LAST", "AVERAGE", "MAX"), "%.2lf %s");
$def[1] .= rrd::line1("var5", "#330099", "Recently Used Cache Size\t");
$def[1] .= rrd::gprint("var5", array("LAST", "AVERAGE", "MAX"), "%.2lf %s");
$def[1] .= rrd::line1("var6", "#990099", "Frequently Used Cache Size\t");
$def[1] .= rrd::gprint("var6", array("LAST", "AVERAGE", "MAX"), "%.2lf %s");


?>