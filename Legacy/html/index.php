<?php


require_once(dirname(__FILE__).'/quehagoporti/config/ProjectConfiguration.class.php');

$configuration = ProjectConfiguration::getApplicationConfiguration('frontend', 'prod', false);
//$configuration = ProjectConfiguration::getApplicationConfiguration('frontend', 'dev', true);
//$configuration = ProjectConfiguration::getApplicationConfiguration('surveys', 'prod', false);
sfContext::createInstance($configuration)->dispatch();
