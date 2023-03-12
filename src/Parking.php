<?php 

namespace App;

Class Parking {

    private $spots;

    public function __construct()
    {
        $this->spots = array();
        $this->randomize();
    }

    /**
     * Get app welcome message
     *
     * @return type String.
     */
    public function getWelcomeMessage()
    {

        if ($this->hasAvailableSpots()) {

            echo "Welcome, please go in";

            echo 'The following spots are available: <br/>';
            
            foreach ($this->getAvailableSpots() as $spot) {
                echo 'Spot #' . $spot . ' </br>';
            }
            
        } else {
            echo 'Sorry we have not available spots right now! <br/>';
        }
    }
    
    /**
     * Randomize the parking place
     *
     * @return type Void
     */
    public function randomize()
    {
        for($i = 0; $i < 10; $i++) {
            $this->spots[$i] = rand(0,1); 
        }
    }

    /**
     * Park a car
     *
     * @return type Boolean.
     */
    public function park()
    {
        if ($this->hasAvailableSpots()) {
           
            $spot = array_search(0, $this->spots);
            $this->spots[$spot] = 1;

            return $spot;
        }

        return false;
    }

    /**
     * Leave a parking spot
     *
     * @param type int spot.
     * @return type Integer
     */
    public function leave($spot)
    {
        if ($this->isValidSpot($spot)) {
            $this->spots[$spot] = 0;

            return $spot;
        }

        return false;
    }

    /**
     * Check if parking has available spots
     *
     * @return type Array
     */
    public function hasAvailableSpots()
    {
        return in_array(0, $this->spots);
    }
   
    /**
     * Check is given spot is valid
     *
     * @param type int spot.
     * @return type Boolean
     */
    public function isValidSpot($spot)
    {
        return $spot < 10;
    }

    /**
     * Check is given spot has been taken
     *
     * @param type int spot.
     * @return type Boolean
     */
    public function isTaken($spot)
    {
        return $this->spots[$spot] === 1;
    }

    /**
     * Get current spots
     *
     * @return type Array
     */
    public function getSpots()
    {
        return $this->spots; 
    }

    /**
     * Set the parking place to full
     *
     * @return type Void
     */
    public function setParkingToFull()
    {
        for($i = 0; $i < 10; $i++) {
            $this->spots[$i] = 1; 
        }
    }

     /**
     * Get the numbers of the spots that are available
     *
     * @return type Array
     */
    public function getAvailableSpots()
    {
        return array_keys(array_filter($this->spots));
        
    }

}