<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Request;
use App\Http\Controllers\functions as ControllerFunctions;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class AddHackathonData extends Command
{
    // Define the signature and description of the command
    protected $signature = 'hack:add-hackathon-data';
    protected $description = 'Fetch Hackathon Data from API and Add it';

    // The function that is called when the command is executed
    public function handle()
    {
        // Fetch the data from the URL
        try{
            $data = $this->fetchHackathonData();
            $currentDate = Carbon::now()->format('Y-m-d');
            // Check if the response data is valid

            // Create a new Request instance and populate it with data
            $request = new Request([
                'vl_hackdate' => $currentDate,
                'vl_hackmessage' => 'CONGRATULATIONS',
                'vl_ph_ne' => $data['PH']['Bakbakan'][0]['Winner'][0]['Guild']['name'] ?? 'N/A',
                'vl_ph_fe' => $data['PH']['Bakbakan'][0]['Winner'][1]['Guild']['name'] ?? 'N/A',
                'vl_ph_peli' => $data['PH']['Bakbakan'][0]['Winner'][2]['Guild']['name'] ?? 'N/A',
                'vl_int_ne' => $data['international']['International'][0]['Winner'][0]['Guild']['name'] ?? 'N/A',
                'vl_int_fe' => $data['international']['International'][0]['Winner'][1]['Guild']['name'] ?? 'N/A',
                'vl_int_peli' => $data['international']['International'][0]['Winner'][2]['Guild']['name'] ?? 'N/A',
            ]);

            // Call the controller method
            $controller = new ControllerFunctions();
            $response = $controller->fire_addhackwin($request);
            // Output the response
            $this->info(json_encode($response));
            Log::info("Hackathon Event Winners Updated at ".$currentDate);
        } catch (Exception $e){
            Log::error($e);
        }
        
    }

    // Function to fetch Hackathon data from the URL
    private function fetchHackathonData()
    {
        // Initialize the Guzzle HTTP client
        $client = new Client();

        // Define the URL
        $url = "https://regions.walkonlinemobile.com/api/Tops/Hackathon/0/1";

        // Fetch the data from the URL
        $response = $client->get($url);
        return json_decode($response->getBody()->getContents(), true);
    }
}
