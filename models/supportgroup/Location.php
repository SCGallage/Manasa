<?php

namespace models\supportgroup;

use core\DatabaseService;
use core\Model;

class Location extends Model
{
    private int $locationId;
    private float $lat;
    private float $lng;
    private string $place_id;
    private string $name;
    private string $address;

    /**
     * @return int
     */
    public function getLocationId(): int
    {
        return $this->locationId;
    }

    /**
     * @param int $locationId
     */
    public function setLocationId(int $locationId): void
    {
        $this->locationId = $locationId;
    }

    /**
     * @return float
     */
    public function getLat(): float
    {
        return $this->lat;
    }

    /**
     * @param float $lat
     */
    public function setLat(float $lat): void
    {
        $this->lat = $lat;
    }

    /**
     * @return float
     */
    public function getLng(): float
    {
        return $this->lng;
    }

    /**
     * @param float $lng
     */
    public function setLng(float $lng): void
    {
        $this->lng = $lng;
    }

    /**
     * @return string
     */
    public function getPlaceId(): string
    {
        return $this->place_id;
    }

    /**
     * @param string $place_id
     */
    public function setPlaceId(string $place_id): void
    {
        $this->place_id = $place_id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function getLocationDetails($locationId)
    {
        return $this->select("location", "*", [], DatabaseService::FETCH_FIRST);
    }


}