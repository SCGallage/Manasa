<?php

namespace models;
use core\DatabaseService;
use core\Model;
use models\users\Staff;
use models\users\User;
use util\CommonConstants;

class volEvents extends Model
{
    private string $id;
    private string $moderator;
    private string $state;
    private string $startDate;
    private string $endDate;
    private string $location;
    private string $type;
    private string $capacity;
    private string $startTime;
    private string $endTime;
    private string $name;
    private string $description;
    private Staff $staff;
    private User $user;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getModerator(): string
    {
        return $this->moderator;
    }

    /**
     * @param string $moderator
     */
    public function setModerator(string $moderator): void
    {
        $this->moderator = $moderator;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param string $state
     */
    public function setState(string $state): void
    {
        $this->state = $state;
    }

    /**
     * @return string
     */
    public function getStartDate(): string
    {
        return $this->startDate;
    }

    /**
     * @param string $startDate
     */
    public function setStartDate(string $startDate): void
    {
        $this->startDate = $startDate;
    }

    /**
     * @return string
     */
    public function getEndDate(): string
    {
        return $this->endDate;
    }

    /**
     * @param string $endDate
     */
    public function setEndDate(string $endDate): void
    {
        $this->endDate = $endDate;
    }

    /**
     * @return string
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * @param string $location
     */
    public function setLocation(string $location): void
    {
        $this->location = $location;
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
     * @return string
     */
    public function getCapacity(): string
    {
        return $this->capacity;
    }

    /**
     * @param string $capacity
     */
    public function setCapacity(string $capacity): void
    {
        $this->capacity = $capacity;
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
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }


    public function __construct()
    {
        parent::__construct();
        $this->staff = new Staff();
    }

    /**
     * @param Staff $staff
     */
    public function setStaff(Staff $staff): void
    {
        $this->staff = $staff;
    }

    public function assignData($id) {
        $this->getId($id);
//        $this->staff->setState($state);
//        $this->staff->getUsername($username);
    }

    /*
     * Loads volunteer events list by user id
     * */
    public function loadVolunteerEventsByUser($userId): array|bool|int
    {
       $sqlStatement = "SELECT volunteer_event.id 'id',
                               volunteer_event.name 'name',
                               volunteer_event.moderator 'moderator',
                               volunteer_event.state 'state',
                               volunteer_event.startdate 'startDate',
                               volunteer_event.location 'location',
                               volunteer_event.type 'type',
                               volunteer_event.capacity 'capacity',
                               volunteer_event.description 'description',
                               volunteer_event.starttime 'startTime',
                               volunteer_event.endtime 'endTime',
                               vp.volunteerid,
                               vp.eventid,
                               vp.state 'participation_state'
                       FROM volunteer_event RIGHT JOIN volunteer_participate vp on volunteer_event.id = vp.eventId
                       WHERE vp.volunteerId = ".$userId." AND volunteer_event.startdate >= (SELECT DATE(NOW()))";

       return $this->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
    }

    /*
     * Load event by id
     * */
    public function loadVolunteerEventById($eventId): int|array
    {
        return $this->select('volunteer_event', '*', ['id = '.$eventId], DatabaseService::FETCH_ALL);
    }

    /*
     * Loads all available volunteer events
     * */
    public function loadAllVolunteerEvents(): array|int
    {
        $sqlStatement = "SELECT * FROM volunteer_event WHERE startDate >= (SELECT DATE(NOW()))";
        return $this->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
    }

    /*
     * Compares current participation requests with event capacity.
     * return true when capacity is not exceeded
     * */
    public function checkParticipantCount($eventId): bool|int
    {
        $sqlStatement = "SELECT e.capacity, COUNT(vp.volunteerId) 'count' 
                         FROM volunteer_event e JOIN volunteer_participate vp on e.id = vp.eventId
                         WHERE vp.eventId = ".$eventId;

        $results = $this->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);

        if ($results[0]['capacity'] > $results[0]['count']) return true;

        return false;

    }

    public function participateVolunteerEvent($request, $userId): bool|int
    {
        $event = $this->loadVolunteerEventById($request['eventId']);

        // default for open events
        $state = CommonConstants::STATE_ACCEPTED;

        //set values
        $valueSet = [
            'volunteerId' => $userId,
            'eventId' => $request['eventId'],
            'state' => $state
        ];

        //exclusive event
        if ($request['type'] == CommonConstants::VOLUNTEER_EVENT_TYPE_EXCLUSIVE ||
            $request['type'] == CommonConstants::VOLUNTEER_EVENT_TYPE_OPEN &&
            !$this->checkParticipantCount($request['eventId'])){
            $valueSet['state'] = CommonConstants::STATE_PENDING;
        }

        //save participation request
        return $this->insert('volunteer_participate', $valueSet);
    }

    public function cancelEventParticipation($eventId, $userId): bool|int
    {
        $conditions = [
            'volunteerId' => $userId,
            'eventId' => $eventId
        ];
        return $this->delete('volunteer_participate', $conditions);
    }

    public function loadParticipatedEvents($userId): int|bool|array
    {
        $sqlStatement = "SELECT * FROM volunteer_event RIGHT JOIN volunteer_participate vp on 
                                            volunteer_event.id = vp.eventId
                         WHERE VP.state = ".CommonConstants::STATE_ACCEPTED." 
                               AND volunteer_event.state = ".CommonConstants::STATE_FINISHED." 
                               AND VP.volunteerId = ".$userId;
        return $this->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
    }

}