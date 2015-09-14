<?php
# Plugin: check_zfs_stats_l2utilization

$opt[1] = "--vertical-label \"Size in Bytes\" --base 1024 -l 0 --title \"$NAGIOS_DISP_SERVICEDESC on $hostname\" ";
$ds_name[1] = "ZFS L2ARC Size";

$def[1] = rrd::def("var1", $RRDFILE[1], $DS[1]);
$def[1] .= rrd::def("var2", $RRDFILE[2], $DS[2]);
$def[1] .= rrd::area("var1", "#00CC00", "Size\t\t");
$def[1] .= rrd::gprint("var1", array("LAST", "AVERAGE", "MAX"), "%.2lf %s");
$def[1] .= rrd::area("var2", "#0066B3", "Header Size\t");
$def[1] .= rrd::gprint("var2", array("LAST", "AVERAGE", "MAX"), "%.2lf %s");

?>
