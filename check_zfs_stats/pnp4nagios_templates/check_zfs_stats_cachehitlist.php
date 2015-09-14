<?php
# Plugin: check_zfs_stats_cachehitlist

$opt[1] = "--vertical-label \"%\" -u 100 -l 0 --title \"$NAGIOS_DISP_SERVICEDESC on $hostname\" ";
$ds_name[1] = "ZFS ARC Efficiency: Cache hits by cache list";

$def[1] = rrd::def("var1", $RRDFILE[1], $DS[1]);
$def[1] .= rrd::def("var2", $RRDFILE[2], $DS[2]);
$def[1] .= rrd::def("var3", $RRDFILE[3], $DS[3]);
$def[1] .= rrd::def("var4", $RRDFILE[4], $DS[4]);
$def[1] .= rrd::def("var5", $RRDFILE[5], $DS[5]);
$def[1] .= rrd::line1("var1", "#00CC00", "Anonymously Used\t\t\t");
$def[1] .= rrd::gprint("var1", array("LAST", "AVERAGE", "MAX"), "%.2lf");
$def[1] .= rrd::line1("var2", "#0066B3", "Most Recently Used\t\t");
$def[1] .= rrd::gprint("var2", array("LAST", "AVERAGE", "MAX"), "%.2lf");
$def[1] .= rrd::line1("var3", "#FF8000", "Most Frequently Used\t\t");
$def[1] .= rrd::gprint("var3", array("LAST", "AVERAGE", "MAX"), "%.2lf");
$def[1] .= rrd::line1("var4", "#FFCC00", "Most Recently Used Ghost\t");
$def[1] .= rrd::gprint("var4", array("LAST", "AVERAGE", "MAX"), "%.2lf");
$def[1] .= rrd::line1("var5", "#330099", "Most Frequently Used Ghost\t");
$def[1] .= rrd::gprint("var5", array("LAST", "AVERAGE", "MAX"), "%.2lf");

?>