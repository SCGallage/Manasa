<?php

namespace controllers;

use models\SupportGroup;

class SupportGroupController extends \core\Controller
{
    private SupportGroup $model;

    public function __construct () {
        $this->model = new SupportGroup();
    }

    public function loadSupportGroupsList()
    {
        $this->setLayout('callerFunction');
        return $this->render('caller/supportGroups/supportGroupsList');
    }
}