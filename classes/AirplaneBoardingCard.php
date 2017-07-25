<?php
include_once 'BoardingCard.php';
include_once 'iCard.php';

class AirplaneBoardingCard extends BoardingCard implements iCard 
{
	/**
	 * Air plane type
	 *
	 * @var string
	 */
	protected $type = 'air_plane';

	/**
	 * Flight number
	 * @var string
	 */
	public $flight_number;

	/**
	 * Get number
	 * @var string
	 */
	public $gate;

	/**
	 * How the baggage be transfer
	 * @var boolean true automatically
	 *				false drop at counter
	 */
	public $baggage_transfer;

	/**
	 * The counter which the baggage is dropped at
	 * Effect when $baggage_transfer is false
	 * @var string counter code
	 */
	public $counter;

	public function show()
	{
		$format = "From %s, take flight %s to %s. Gate %s, seat %s. %s";
		return sprintf($format, $this->getStart()->getName(), $this->flight_number, $this->getEnd()->getName(), $this->gate, $this->seat, $this->getBaggageTransfer());
	}

	/**
	 * Describe how is the baggage transferred
	 * @return string
	 */
	protected function getBaggageTransfer()
	{
		if (!$this->baggage_transfer) {
			return sprintf("Baggage drop at ticket counter %s", $this->counter);
		}
		return "Baggage will be automatically transferred from your last leg.";
	}
}