Usage:
- Create an instance of Router
- Add boarding card information to router
- Run "direction" function to print out the result
[php]
include_once 'classes/Router.php';
$card1 = [
	'type' => 'train',
	'departure_code' => 'madrid',
	'departure_name' => 'Madrid',
	'arrival_code' => 'barcelona',
	'arrival_name' => 'Barcelona',
	'train_number' => '78A',
	'seat' => '45B'
];
$card2 = [
	'type' => 'airport_bus',
	'departure_code' => 'barcelona',
	'departure_name' => 'Barcelona',
	'arrival_code' => 'gerona_airport',
	'arrival_name' => 'Gerona Airport',
];
$card3 = [
	'type' => 'air_plane',
	'departure_code' => 'gerona_airport',
	'departure_name' => 'Gerona Airport',
	'arrival_code' => 'stockholm',
	'arrival_name' => 'Stockholm',
	'flight_number' => 'SK455',
	'gate' => '45B',
	'seat' => '3A',
	'baggage_transfer' => false,
	'counter' => '344'
];

$card4 = [
	'type' => 'air_plane',
	'departure_code' => 'stockholm',
	'departure_name' => 'Stockholm',
	'arrival_code' => 'newyork_jfk',
	'arrival_name' => 'New York JFK',
	'flight_number' => 'SK22',
	'gate' => '22',
	'seat' => '7B',
	'baggage_transfer' => true,
];
$router = new Router();
$router->addCard($card3);
$router->addCard($card1);
$router->addCard($card2);
$router->addCard($card4);
$router->direction();
[/php]

Import new transportation:
- Create new class for new transportation, extended from BoardingCard and implemented from iCard classes
- Declare some PUBLIC properties inner the new class. These properties are new features for this transportation
- You also should declare a "PROTECTED" property "type". This is the unique type of this transportation.
- Implement function "show" for the class. It should return a formatted string, which you expect to print on screen
- In BoardingCardFactory class, include the new class above. Inner switch case block, add more one case for new one. The value of "type" in "case" statement shoud be similar to "type" property of new class.