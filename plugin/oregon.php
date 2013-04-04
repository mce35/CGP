<?php

# Collectd oregon plugin

require_once 'conf/common.inc.php';
require_once 'type/Default.class.php';
require_once 'inc/collectd.inc.php';

## LAYOUT
# oregon_temp/
# oregon_temp/gauge-XXXX.rrd
# oregon_temp/humidity-XXXX.rrd
# oregon_temp/temperature-XXXX.rrd

$obj = new Type_Default($CONFIG);
$obj->ds_names = array(
	'value' => 'Value  ',
);
$obj->width = $width;
$obj->heigth = $heigth;
$obj->rrd_format = '%5.1lf%s';

switch($obj->args['type']) {
	case 'temperature':
		$obj->rrd_title = 'Temperature';
		$obj->rrd_vertical = '°C';
	break;
	case 'humidity':
		$obj->rrd_title = 'Relative humidity';
		$obj->rrd_vertical = '%';
	break;
	case 'gauge':
		$obj->rrd_title = 'Battery state';
		$obj->rrd_vertical = '%';
	break;
}

collectd_flush($obj->identifiers);
$obj->rrd_graph();
