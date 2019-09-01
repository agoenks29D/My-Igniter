<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package Codeigniter
 * @subpackage Twig
 * @category Core
 * @author Agung Dirgantara <agungmasda29@gmail.com>
 * @link https://twig.symfony.com
*/

class CiMS_Twig
{
	protected $ci;
	protected $twig;
	protected $twig_loader;

	protected $template_directories = array();
	protected $local_vars = array();
	protected $global_vars = array();

	protected $cache_dir;
	protected $debug;

	public function __construct()
	{
		$this->ci =& get_instance();

		// Load twig config
		$this->ci->config->load('twig');

		// Update twig config item
		$this->ci->config->set_item('twig.locations',
			array_merge($this->ci->config->item('twig.locations'),[
				sys_get_temp_dir() => sys_get_temp_dir(),
				FCPATH.'assets/' => FCPATH.'assets/'
			])
		);

		// Set twig locations
		$this->add_template_location($this->ci->config->item('twig.locations'));
		$this->set_template_locations();

		// Register twig loader
		$this->twig_loader = new \Twig\Loader\FilesystemLoader($this->template_directories);

		// Get twig environment
		$environment = $this->ci->config->item('twig.environment');

		// Twig config cache status
		$environment['cache'] = ($environment['cache_status']) ? $environment['cache_location'] : FALSE;
		$twig_environment = array(
			'cache' => $environment['cache'],
			'debug'	=> $environment['debug_mode'],
			'auto_reload'	=> $environment['auto_reload'],
			'autoescape'	=> $environment['autoescape'],
			'optimizations'	=> $environment['optimizations']
		);

		// Register twig environment
		$this->twig = new \Twig\Environment($this->twig_loader,$twig_environment);

		// Register twig functions
		foreach($this->ci->config->item('twig.functions') as $function)
		{
			$this->register_function($function);
		}
	}

	/**
	 * parse file
	 * 
	 * @param  string  $template twig file without extension name
	 * @param  array   $data     data to render in content
	 * @param  boolean $return   return rendered file
	 * @return string/none
	 */
	public function parse_file($template, $data=array(), $return=false)
	{
		if(stripos($template, '.') === FALSE)
		{
			$template .= $this->ci->config->item('twig.extension');
		}

		$template = $this->twig->loadTemplate($template);
		return ($return)?$template->render($data):$template->display($data);
	}

	/**
	 * parse string
	 * 
	 * @param  string  $string string to parse
	 * @param  array   $data   data to render in content
	 * @param  boolean $return return rendered file
	 * @return string/none
	 */
	public function parse_string($string, $data=array(), $return=false)
	{
		$string = $this->twig->loadTemplate($string);
		return ($return)?$string->render($data):$string->display($data);
	}

	/**
	 * register twig function
	 * 
	 * @param  function $function
	 * @return object
	 */
	public function register_function($function)
	{
		$this->twig->addFunction(new \Twig\TwigFunction($function,$function));
		return $this;
	}

	/**
	 * register twig filter
	 * 
	 * @param  function $filter
	 * @return object
	 */
	public function register_filter($filter)
	{
		$this->twig->addFilter($filter, new TwigFilter($filter));
		return $this;
	}

	/**
	 * add template location
	 * 
	 * @param string $location twig files path
	 */
	public function add_template_location($location)
	{
		if(is_array($location))
		{
			foreach($location as $path => $offset)
			{
				if(is_dir($path))
				{
					$this->template_directories[] = $path;
				}
			}
		}
		else
		{
			if(is_dir($location))
			{
				$this->template_directories[] = $location;
			}
		}
	}

	/**
	 * set template location
	 */
	private function set_template_locations()
	{
		if(method_exists($this->ci->router,'fetch_module'))
		{
			$this->_module = $this->ci->router->fetch_module();
			if($this->_module)
			{
				$module_locations = Modules::$locations;
				foreach ($module_locations AS $location => $offset)
				{
					if(is_dir($location . $this->_module . '/views'))
					{
						$this->template_directories[] = $location . $this->_module . '/views';
					}
				}
			}
		}

		if($this->twig_loader )
		{
			$this->twig_loader->setPaths($this->template_directories);
		}
	}
}

/* End of file Ci_Twig.php */
/* Location: ./application/core/Ci_Twig.php */