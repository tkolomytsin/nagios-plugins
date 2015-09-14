<?php
# Plugin: check_zfs_stats_l2efficiency

$opt[1] = "--vertical-label \"%\" -u 100 -l 0 --title \"$NAGIOS_DISP_SERVICEDESC on $hostname\" ";
$ds_name[1] = "ZFS L2ARC Efficiency";

$def[1] = rrd::def("var1", $RRDFILE[1], $DS[1]);
$def[1] .= rrd::def("var2", $RRDFILE[2], $DS[2]);
$def[1] .= rrd::area("var1", "#00CC00", "Hit Ratio\t");
$def[1] .= rrd::gprint("var1", array("LAST", "AVERAGE", "MAX"), "%.2lf");
$def[1] .= rrd::area("var2", "#0066B3", "Miss Ratio\t");
$def[1] .= rrd::gprint("var2", array("LAST", "AVERAGE", "MAX"), "%.2lf");

?>