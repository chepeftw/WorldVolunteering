<?php


require_once(dirname(__FILE__).'/quehagoporti/config/ProjectConfiguration.class.php');

#$configuration = ProjectConfiguration::getApplicationConfiguration('backend', 'prod', false);
$configuration = ProjectConfiguration::getApplicationConfiguration('backend', 'dev', true);
sfContext::createInstance($configuration)->dispatch();
