<?php

namespace models\supportgroup;

use core\Request;
use core\Model;

class SgEnroll extends Model
{
    private $table = "sg_enrollrequest";

    public function addRequest(array $supportGroupEnrollRequest)
    {
        return $this->insert($this->table, $supportGroupEnrollRequest);
    }

    public function removeRequest(array $supportGroupEnrollRequest)
    {
        return $this->delete($this->table, $supportGroupEnrollRequest);
    }

}