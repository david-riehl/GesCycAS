<?php
$PARAM['folders']['model']['root']         = "model";
$PARAM['folders']['model']['class']        = $PARAM['folders']['model']['root'].'/'."class";
$PARAM['folders']['model']['mapping']      = $PARAM['folders']['model']['root'].'/'."mapping";
$PARAM['folders']['view']['root']          = "view";
$PARAM['folders']['view']['class']         = $PARAM['folders']['view']['root'].'/'."class";
$PARAM['folders']['view']['templates']     = $PARAM['folders']['view']['root'].'/'."templates";
$PARAM['folders']['controler']['root']     = "controler";

$PARAM['folders']['icons']                 = "icons";
$PARAM['folders']['kernel']                = "kernel";
$PARAM['folders']['plugins']['root']       = "plugins";

$PARAM['folders']['scripts']['root']       = "scripts";
$PARAM['folders']['scripts']['css']        = $PARAM['folders']['scripts']['root'].'/'.'css';
$PARAM['folders']['scripts']['csv']        = $PARAM['folders']['scripts']['root'].'/'."csv";
$PARAM['folders']['scripts']['javascript'] = $PARAM['folders']['scripts']['root'].'/'."js";
$PARAM['folders']['scripts']['sql']        = $PARAM['folders']['scripts']['root'].'/'."sql";

$PARAM['application']['name']              = "Gestion des Accès Utilisateurs";
$PARAM['application']['version']           = "1.0";

$PARAM['html']['title']                    = $PARAM['application']['name']." ".$PARAM['application']['version'];
$PARAM['html']['charset']                  = "UTF-8";
$PARAM['html']['meta']['application-name'] = $PARAM['application']['name']." ".$PARAM['application']['version'];
$PARAM['html']['meta']['author']           = "David RIEHL";
$PARAM['html']['meta']['description']      = "D. [R]iehl Framework";
$PARAM['html']['meta']['keywords']         = "D. [R]iehl,Framework";
$PARAM['html']['meta']['copyright']        = "D. [R]iehl Framework";
$PARAM['html']['meta']['robots']           = "all";
?>