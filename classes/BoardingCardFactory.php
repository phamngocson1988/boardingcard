<?php
include_once 'AirplaneBoardingCard.php';
include_once 'TrainBoardingCard.php';
include_once 'AirportBusBoardingCard.php';

class BoardingCardFactory
{
	public static function create($type) 
	{
		switch ($type) {
			case 'air_plane':
				return new AirplaneBoardingCard();
				break;
			case 'train':
				return new TrainBoardingCard();
				break;
			case 'airport_bus': 
				return new AirportBusBoardingCard();
				break;
			default:
				return null;
				break;
		}
	}
}