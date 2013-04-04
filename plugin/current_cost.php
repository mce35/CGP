<?php

# Collectd current_cost plugin

require_once 'conf/common.inc.php';
require_once 'type/Default.class.php';
require_once 'inc/collectd.inc.php';

## LAYOUT
# current_cost/power-X.rrd

$obj = new Type_Default($CONFIG);
$obj->data_sources = array('value');
$obj->width = $width;
$obj->heigth = $heigth;
$obj->rrd_title = 'Power';
$obj->rrd_vertical = 'Watts';
$obj->rrd_format = '%5.1lf%s';

collectd_flush($obj->identifiers);
$obj->rrd_graph();
