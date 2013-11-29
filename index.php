<?php
/**
 * Component Launch File
 * @author D. [R]IEHL
 * @version 1.0
 */

require_once "_parameters.init.php";
require_once "_kernel.func.php";

import_directory($PARAM['folders']['plugins']['root']);
import_directory($PARAM['folders']['kernel']);
import_directory($PARAM['folders']['model']['class']);
import_directory($PARAM['folders']['model']['mapping']);
import_directory($PARAM['folders']['view']['class']);
import_directory($PARAM['folders']['controler']['root']);

// Viewer::start_debug_mode();
// Database::deploy();

Router::parse_url();
Router::load_controler();
?>