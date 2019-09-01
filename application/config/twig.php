<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package Codeigniter
 * @subpackage Twig
 * @category Config
 * @author Agung Dirgantara <agungmasda29@gmail.com>
*/

$config['twig.extension'] = '.twig';
$config['twig.locations'] =
[
	APPPATH.'views/'  =>  '../views/',
	FCPATH.'views/'   =>  '../../views/'
];
$config['twig.functions'] = array_merge(get_defined_functions()['internal'],get_defined_functions()['user']); // register all php function to twig functions
$config['twig.filters'] = array();
$config['twig.environment'] =
[
	'cache_location'    => APPPATH.'cache/twig/',
	'cache_status'      => FALSE,
	'auto_reload'       => NULL,
	'debug_mode'        => FALSE,
	'autoescape'        => FALSE,
	'optimizations'     => -1
];

/* End of file twig.php */
/* Location: ./application/config/twig.php */