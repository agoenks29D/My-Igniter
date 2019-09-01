<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* load the MX_Loader class */
require APPPATH."third_party/MX/Loader.php";

class MY_Loader extends MX_Loader
{

	/**
	 * twig
	 * 
	 * @param  string  $template twig file
	 * @param  array   $data     data to render
	 * @param  boolean $return   return rendered file
	 */
	public function twig($template, $data=array(), $return=false)
	{
		$twig = new CiMS_Twig;
		$twig->parse_file($template,$data,$return);
	}
}