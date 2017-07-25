<?php
include_once 'BoardingCard.php';
include_once 'iCard.php';

class AirportBusBoardingCard extends BoardingCard implements iCard 
{
	/**
	 * Air plane type
	 *
	 * @var string
	 */
	protected $type = 'airport_bus';

	public function show()
	{
		$format = "Take the airport bus from %s to %s. No seat assignment";
		return sprintf($format, $this->getStart()->getName(), $this->getEnd()->getName());
	}
}