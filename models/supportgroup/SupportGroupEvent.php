<?php

namespace models\supportgroup;

use core\Application;
use core\DatabaseService;
use core\Mailer;
use core\Model;
use Google\Service\Analytics\Resource\Data;

class SupportGroupEvent extends Model
{
    private string $eventId;
    private string $topic;
    private string $agenda;
    private string $date;
    private string $startTime;
    private string $endTime;
    private string $type;
    private bool $notify;
    private int $meetingId;
    private Location $location;
    private int $supportGroupId;

    /**
     * @return string
     */
    public function getEventId(): string
    {
        return $this->eventId;
    }

    /**
     * @param string $eventId
     */
    public function setEventId(string $eventId): void
    {
        $this->eventId = $eventId;
    }

    /**
     * @return string
     */
    public function getTopic(): string
    {
        return $this->topic;
    }

    /**
     * @param string $topic
     */
    public function setTopic(string $topic): void
    {
        $this->topic = $topic;
    }

    /**
     * @return string
     */
    public function getAgenda(): string
    {
        return $this->agenda;
    }

    /**
     * @param string $agenda
     */
    public function setAgenda(string $agenda): void
    {
        $this->agenda = $agenda;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getStartTime(): string
    {
        return $this->startTime;
    }

    /**
     * @param string $startTime
     */
    public function setStartTime(string $startTime): void
    {
        $this->startTime = $startTime;
    }

    /**
     * @return string
     */
    public function getEndTime(): string
    {
        return $this->endTime;
    }

    /**
     * @param string $endTime
     */
    public function setEndTime(string $endTime): void
    {
        $this->endTime = $endTime;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getMeetingId(): int
    {
        return $this->meetingId;
    }

    /**
     * @param int $meetingId
     */
    public function setMeetingId(int $meetingId): void
    {
        $this->meetingId = $meetingId;
    }

    /**
     * @return bool
     */
    public function isNotify(): bool
    {
        return $this->notify;
    }

    /**
     * @param bool $notify
     */
    public function setNotify(bool $notify): void
    {
        $this->notify = $notify;
    }

    /**
     * @return Location
     */
    public function getLocation(): Location
    {
        return $this->location;
    }

    /**
     * @param Location $location
     */
    public function setLocation(Location $location): void
    {
        $this->location = $location;
    }

    /**
     * @return int
     */
    public function getSupportGroupId(): int
    {
        return $this->supportGroupId;
    }

    /**
     * @param int $supportGroupId
     */
    public function setSupportGroupId(int $supportGroupId): void
    {
        $this->supportGroupId = $supportGroupId;
    }

    public function createSupportGroupEvent()
    {
        $meetingId = null;
        $locationId = null;
        if ($this->getType() === 'virtual') {
            $virtualMeeting = new VirtualMeeting();
            $timeDifference = date_diff(date_create($this->getEndTime()), date_create($this->getStartTime()));
            echo "Time difference: ".$timeDifference->i;
            $virtualMeeting->setMeetingOptions($this->getTopic(), $this->getDate(), $this->getStartTime(),
                $timeDifference->i, $this->getAgenda());
            $meetingData = $virtualMeeting->createMeeting();
            $meetingId = $meetingData['meetingId'];
            $supportGroup = new SupportGroup();
            $emailList = $supportGroup->getSupportGroupMemberEmails($this->getSupportGroupId());
            $this->sendBulkMail($meetingData, $emailList);
            //$meetingId = 7657567;
        }
//        print_r($meetingDetails);
        if ($this->getType() === 'physical') {
            //$location = (array_key_exists('location', $meetingDetails)) ? $meetingDetails['location'] : null;
            $locationId = $this->insert('location', [
                "lat" => $this->location->getLat(),
                "lng" => $this->location->getLng(),
                "place_id" => $this->location->getPlaceId()
            ]);
        }

        $this->insert('sg_event', [
            "topic" => $this->getTopic(),
            "agenda" => $this->getAgenda(),
            "eventDate" => $this->getDate(),
            "startTime" => $this->getStartTime(),
            "endTime" => $this->getEndTime(),
            "type" => $this->getType(),
            "virtualMeetingId" => ($meetingId != null) ? $meetingId : null,
            "locationId" => ($locationId != null) ? $locationId : 0,
            "supportGroupId" => $this->getSupportGroupId()
        ]);

    }

    public function sendBulkMail(array $params, array $emailList) {
        //$mailList = ["gallagesanka03@gmail.com", "2019is026@stu.ucsc.cmb.ac.lk"];
        $mailer = new Mailer();
        $mailer->init('smtp.gmail.com', $_ENV['SEND_EMAIL'], $_ENV['PASSWORD']);
        $mailer->bulkEmailSend("jw8041360@gmail.com", "Test Bulk Mail", $emailList, $params);
    }

    public function getSupportGroupEvents(int $supportGroupId)
    {
        //echo "Support Group ID: ".$supportGroupId;
        $eventsList = $this->select("sg_event", "*", [ "supportGroupId" => $supportGroupId ], DatabaseService::FETCH_ALL);
        //print_r($eventsList);
        return $eventsList;
    }

    public function getUpcomingEvents()
    {
        $sqlStatement = "SELECT se.*
                            FROM sg_event se
                                     JOIN supportgroup sg on se.supportGroupId = sg.id
                            WHERE se.supportGroupId = 1 AND se.eventDate >= CURRENT_DATE()
                            ORDER BY se.eventDate , se.startTime";
        //print_r($upcomingEvents);
        return $this->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
    }

    public function getSupportGroupEventsForDate($eventDate)
    {
        $sqlStatement = "SELECT topic, startTime, endTime
                            FROM sg_event
                            WHERE supportGroupId = 1 AND eventDate = '${eventDate}'";
        $eventList = $this->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
        //print_r($eventList);
        foreach ($eventList as $index=>$event) {
            //echo $event["startTime"];
            $timeDifference = date_diff(date_create($event["endTime"]), date_create($event["startTime"]));
            //print_r($timeDifference);
            $eventList[$index]["duration"] = (($timeDifference->h) * 60) + $timeDifference->i;
        }
        //print_r($eventList);
        return $eventList;
        //$timeDifference = date_diff(date_create($this->getEndTime()), date_create($this->getStartTime()));
    }
}