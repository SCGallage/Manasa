<?php


namespace models;

use core\Model;

class SupportGroup extends Model
{
    private string $id;
    private string $name;
    private string $type;
    private string $description;
    private string $facilitator;
    private string $co_facilitator;
    private string $state;
    private string $participants;

    public function __construct()
    {
        parent::__construct();
    }

}