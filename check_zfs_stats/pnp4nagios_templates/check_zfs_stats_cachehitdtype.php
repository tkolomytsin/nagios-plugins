<?php
# Plugin: check_zfs_stats_cachehitdtype

$opt[1] = "--vertical-label \"%\" -u 100 -l 0 --title \"$NAGIOS_DISP_SERVICEDESC on $hostname\" ";
$ds_name[1] = "ZFS ARC Efficiency: Cache hits by data type";

$def[1] = rrd::def("var1", $RRDFILE[1], $DS[1]);
$def[1] .= rrd::def("var2", $RRDFILE[2], $DS[2]);
$def[1] .= rrd::def("var3", $RRDFILE[3], $DS[3]);
$def[1] .= rrd::def("var4", $RRDFILE[4], $DS[4]);
$def[1] .= rrd::def("var5", $RRDFILE[5], $DS[5]);
$def[1] .= rrd::def("var6", $RRDFILE[6], $DS[6]);
$def[1] .= rrd::def("var7", $RRDFILE[7], $DS[7]);
$def[1] .= rrd::def("var8", $RRDFILE[8], $DS[8]);
$def[1] .= rrd::line1("var1", "#00CC00", "Demand Data Hit Ratio\t\t");
$def[1] .= rrd::gprint("var1", array("LAST", "AVERAGE", "MAX"), "%.2lf");
$def[1] .= rrd::line1("var2", "#0066B3", "Demand Data Miss Ratio\t\t");
$def[1] .= rrd::gprint("var2", array("LAST", "AVERAGE", "MAX"), "%.2lf");
$def[1] .= rrd::line1("var3", "#FF8000", "Prefetch Data Hit Ratio\t\t");
$def[1] .= rrd::gprint("var3", array("LAST", "AVERAGE", "MAX"), "%.2lf");
$def[1] .= rrd::line1("var4", "#FFCC00", "Prefetch Data Miss Ratio\t");
$def[1] .= rrd::gprint("var4", array("LAST", "AVERAGE", "MAX"), "%.2lf");
$def[1] .= rrd::line1("var5", "#330099", "Demand Metadata Hit Ratio\t");
$def[1] .= rrd::gprint("var5", array("LAST", "AVERAGE", "MAX"), "%.2lf");
$def[1] .= rrd::line1("var6", "#990099", "Demand Metadata Miss Ratio\t");
$def[1] .= rrd::gprint("var6", array("LAST", "AVERAGE", "MAX"), "%.2lf");
$def[1] .= rrd::line1("var7", "#CCFF00", "Prefetch Metadata Hit Ratio\t");
$def[1] .= rrd::gprint("var7", array("LAST", "AVERAGE", "MAX"), "%.2lf");
$def[1] .= rrd::line1("var8", "#FF0000", "Prefetch Metadata Miss Ratio\t");
$def[1] .= rrd::gprint("var8", array("LAST", "AVERAGE", "MAX"), "%.2lf");

?>