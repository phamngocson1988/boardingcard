<?php
class Location 
{
	/**
	 * The unique code of the location
	 * @var string
	 */
	public $code;

	/**
	 * The name of the location
	 * @var string
	 */
	public $name;
	
	/**
	 * Constructor
	 *
	 * @param $code string
	 * @param $name string
	 */
	public function __construct($code, $name)
	{
		$this->code = $code;
		$this->name = $name;
	}

	/**
	 * Get code of the location
	 *
	 * @return string
	 */
	public function getCode()
	{
		return $this->code;
	}
	
	/**
	 * Get name of the location
	 *
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}
}