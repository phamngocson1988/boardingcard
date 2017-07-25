<?php
include_once 'BoardingCard.php';
include_once 'iCard.php';

class TrainBoardingCard extends BoardingCard implements iCard 
{
	/**
	 * Train type
	 *
	 * @var string
	 */
	protected $type = 'train';

	/**
	 * Train number
	 * @var string
	 */
	public $train_number;

	public function show()
	{
		$format = "Take train %s from %s to %s. Sit in seat %s";
		return sprintf($format, $this->train_number, $this->getStart()->getName(), $this->getEnd()->getName(), $this->seat);
	}
}