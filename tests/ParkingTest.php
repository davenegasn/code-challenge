<?php

use PHPUnit\Framework\TestCase;
use App\Parking;

class ParkingTest extends TestCase {

	public function test_a_parking_has_ten_spots() 
  {

		$parking = new Parking();

		$this->assertEquals(10, count($parking->getSpots()));
	}

	public function test_a_car_can_park_when_free_spot()
  {
		
		$parking = new Parking(); 

		if ($parking->hasAvailableSpots()) {

			$this->assertIsInt($parking->park());

		} else {

			$this->assertFalse($parking->park());

		}
		
	}

	public function test_a_car_leaves_parking() 
  {

		$parking = new Parking(); 

		$parking->setParkingToFull();

		$spot = rand(0,9);

		$this->assertIsInt($parking->leave($spot));
		
	}

	public function test_when_parking_is_full_and_car_leaves_a_new_car_can_park() 
  {

		$parking = new Parking(); 

		$parking->setParkingToFull();
		
		$oldSpot = rand(0,9);

		$freeSpot = $parking->leave($oldSpot);

		$newSpot = $parking->park($freeSpot);

		$this->assertEquals($newSpot, $oldSpot);
		
	}

	public function test_a_parking_spot_is_valid() 
  {

		$parking = new Parking();

		$spot = rand(0,9);

		$this->assertTrue($parking->isValidSpot($spot));
	}

	public function test_a_parking_spot_is_not_valid() 
  {

		$parking = new Parking();

		$spot = rand(10, 100);

		$this->assertFalse($parking->isValidSpot($spot));
	}

}