<?php

namespace App\Services;

use App\Services\ZKLibrary\ZKLibrary;

class FetcherReader
{
    private $ip;
    private $port;
    private $protocol = 'UDP';

    public function set_ip($ip)
    {
        $this->ip = $ip;
    }

    public function set_port($port)
    {
        $this->port = $port;
    }

    public function set_protocol($protocol)
    {
        $this->protocol = $protocol;
    }

    public function get_attendance_log($start = false, $end = false)
    {
        $filtered = [];
        try {
            $tad_factory = new ZKLibrary($this->ip, $this->port, $this->protocol);

            $tad_factory->connect();

            $att_logs = $tad_factory->getAttendance();

            $tad_factory->disconnect();

            if (!empty($att_logs)) {
                if ($start && $end) {
                    $filtered = array_filter($att_logs, function ($val) use ($start, $end) {
                        return strtotime($val['3']) > strtotime($start . ' 00:00:00') && strtotime($val['3']) < strtotime($end . ' 23:59:59');
                    });
                } else if ($start) {
                    $filtered = array_filter($att_logs, function ($val) use ($start) {
                        return strtotime($val['3']) > strtotime($start . ' 00:00:00');
                    });
                } else {
                    $filtered = $att_logs;
                }

                return $filtered;
            } else {
                return "Message: No Record from $this->ip";
            }
        }
        //catch exception
        catch (Exception $e) {
            return 'Message: ' . $e->getMessage();
        }
    }
}
