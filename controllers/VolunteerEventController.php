<?php

namespace controllers;

use core\Controller;
use core\Request;
use core\Model;
use models\VolunteerEvent;

class VolunteerEventController extends Controller
{

    public function CreateVolunteerEvent(Request $request)
    {
        if($request->isPost()) {
            $VolunteerCreateEvent = new VolunteerEvent();
            $VolunteerCreateEvent->overrideTableName('VolunteerEvent');
            print_r($request->getBody());
            $data=$request->getBody();
            $VolunteerCreateEvent->save($data);
            }
        return $this->render('CreateVolunteerEvent', 'Volunteer Events');
    }

    public function ViewVolunteerEvent(Request $request){
        $VolunteerView = new VolunteerEvent();
        $viewEvent = $VolunteerView->findAll();
        $params = [
            'viewEvent' => $viewEvent
            ];
        return $this->render('ViewVolunteerEvent', 'Event List', $params);
    }
}