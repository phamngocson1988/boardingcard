<?php
include_once 'Location.php';

abstract class BoardingCard 
{
	/**
	 * Start location
	 *
	 * @var Location
	 */
	protected $start;

	/**
	 * End location
	 *
	 * @var Location
	 */
	protected $end;

	/**
	 * Type of the boarding card
	 *
	 * @var string
	 */
	protected $type;

	/**
	 * Type of seat
	 *
	 * @var string
	 */
	public $seat;

	/**
	 * Get start point
	 * @return Location $start
	 */
	public function getStart()
	{
		return $this->start;
	}
	
	/**
	 * Get end point
	 * @return Location $end
	 */
	public function getEnd()
	{
		return $this->end;
	}

	public function setStart($start)
	{
		$this->start = $start;
	}

	public function setEnd($end)
	{
		$this->end = $end;
	}

	public function load($data)
	{
		$reflect = new ReflectionObject($this);
		$properties = $reflect->getProperties(ReflectionProperty::IS_PUBLIC);
		foreach ($properties as $property) {
			if (array_key_exists($property->name, $data)) {
				$key = $property->name;
				$this->$key = $data[$key];
			}
		}

		// Set start/end point
		if (array_key_exists('departure_code', $data) && array_key_exists('departure_name', $data)) {
			$departure = new Location($data['departure_code'], $data['departure_name']);
			$this->setStart($departure);
		}

		if (array_key_exists('arrival_code', $data) && array_key_exists('arrival_name', $data)) {
			$arrival = new Location($data['arrival_code'], $data['arrival_name']);
			$this->setEnd($arrival);
		}
	}
}
?>