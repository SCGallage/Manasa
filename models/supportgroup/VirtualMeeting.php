<?php

namespace models\supportgroup;

use core\Model;
use Exception;
use services\ZoomApi;

class VirtualMeeting extends Model
{
    private string $topic;
    private string $eventDate;
    private string $startTime;
    private int $duration;
    private string $agenda;
    private string $password;

    /**
     * @throws Exception
     */
    public function setMeetingOptions($topic, $eventDate, $startTime, $duration, $agenda = 'Not given.') {
        $this->topic = $topic;
        $this->startTime = $startTime;
        $this->eventDate = $eventDate;
        $this->duration = $duration;
        $this->password = $this->random_str();
        $this->agenda = $agenda;
    }

    public function createMeeting() {
        $meetingOptions = array(
            "topic" => $this->topic,
            "type" => 2,
            "pre_schedule" => false,
            "start_time" => "{$this->eventDate}T{$this->startTime}Z",
            "duration" => $this->duration,
            "timezone" => "Asia/Colombo",
            "password" => $this->password,
            "agenda" => $this->agenda
        );
        return ZoomApi::createNewMeeting($meetingOptions);
    }

    public function deleteMeeting() {
        ZoomApi::deleteMeeting(78369721553);
    }

    /**
     * @throws Exception
     */
    function random_str(int    $length = 10,
                        string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'): string {
        if ($length < 1) {
            throw new \RangeException("Length must be a positive integer");
        }
        $pieces = [];
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $pieces []= $keyspace[random_int(0, $max)];
        }
        return implode('', $pieces);
    }
}