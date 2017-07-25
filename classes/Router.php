<?php
include_once 'BoardingCardFactory.php';

class Router 
{
	/**
	 * List of unordered boarding cards
	 * @var array array of instances of BoardingCard
	 */
	protected $cards = [];

	/**
	 * List of ordered boarding cards
	 * @var array array of instances of BoardingCard
	 */
	protected $routers = [];
	
	/**
	 * Add more card
	 * @param array $data set of data for each types of card
	 * 				Some keys are required in this param
	 * 				- type: type of transportation
	 *				- departure_code: code of departure
	 *				- departure_name: name of departure
	 *				- arrival_code: code of arrival
	 *				- arrival_code: code of arrival
	 *				- Other keys correspond with each transpotation type
	 * @return boolean
	 */
	public function addcard($data) 
	{
		// Check if the input data is valid or not
		if (!$this->checkValidCard($data)) {
			return false;
		}

		// Check if the type is invalid
		$card = BoardingCardFactory::create($data['type']);
		if (!$card) {
			return false;
		}

		$card->load($data);
		$this->cards[] = $card;
		return true;
	}

	protected function checkValidCard($data) 
	{
		if (!array_key_exists('type', $data)
			|| !array_key_exists('departure_code', $data)
			|| !array_key_exists('departure_name', $data)
			|| !array_key_exists('arrival_code', $data)
			|| !array_key_exists('arrival_name', $data)
		) {
			return false;
		}	
		return true;
	}
	
	/**
	 * Analyze the input cards to find out the complete journey
	 * Sort the input cards to ordered list
	 * @return boolean false if the list is invalid
	 */
	protected function analyze()
	{
		// Find out the departure and arrival points
		$starts = $ends = [];
		foreach ($this->cards as $card) {
			$starts[] = $card->getStart()->getCode();
			$ends[] = $card->getEnd()->getCode();
		}
		
		$start = array_diff($starts, $ends);
		$end = array_diff($ends, $starts);
		if (count($start) !== 1 || count($end) !== 1) {
			return false;
		}
		
		$departure = current($start);
		$arrival = current($end);

		// Sort the order of the list
		while ($departure != $arrival) {
			foreach ($this->cards as $card) {
				if ($card->getStart()->getCode() == $departure) {
					$this->routers[] = $card;
					$departure = $card->getEnd()->getCode();
					break;
				}
			}
		}
		return true;
	}
	
	/**
	 * Show the final direction for the journey
	 * @return string
	 */
	public function direction()
	{
		if (!$this->analyze()) {
			echo 'data error';
			return;
		}

		foreach ($this->routers as $card) {
			echo $card->show();
			echo "<br/>";
		}
		echo "You have arrived at your final destination.";
	}
}
?>