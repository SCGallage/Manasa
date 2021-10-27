<?php

namespace models\supportgroup;

use core\Request;
use core\Model;

class SgEnroll extends Model
{

    public function addRequest(array $supportGroupEnrollRequest)
    {
        return $this->insert('sg_enrollrequest', $supportGroupEnrollRequest);
    }

}