<?php

namespace App\Console\Commands;

use App\Device;
use Illuminate\Support\Carbon;
use App\Services\FetcherReader;
use Illuminate\Console\Command;

class FetchFromDevices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emasa:fetch-from-devices';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Manual fetch attendance from listed devices';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $devices = Device::all();

        if ($devices->count()) {
            $fetcher = new FetcherReader;
            foreach ($devices as $device) {
                echo "\tIP : " . $device->ip . "\n";
                echo "\t---------------------------------------\n";
                $fetcher->set_ip($device->ip);
                $fetcher->set_port($device->port);
                $att_logs = $fetcher->get_attendance_log(date('Y-m-d'));

                if (is_array($att_logs)) {
                    $sensorid = $device->id;
                    $sn = $device->sn;

                    foreach ($att_logs as $rec) {
                        if (Carbon::createFromFormat('Y-m-d', $rec["3"]) !==  false) {
                            $data[] = array(
                                'BADGENUMBER' => $rec['1'],
                                "CHECKTIME" => $rec["3"],
                                "VERIFYCODE" => $rec["2"],
                                "SENSORID" => $sensorid,
                                "CHECKTYPE" => 'I',
                                "sn" => $sn
                            );
                        }
                    }

                    //$result = processCurl($this->config->item('pcrs_export_checkinout'), json_encode($data));

                    print_r($data);
                }

                echo "\t End Fetch IP : " . $device->IP . "\n";
            }
        } else {
            echo "No Machine Enabled";
        }
    }
}
