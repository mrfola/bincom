<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PollingResult;
use App\Models\PollingUnit;
use App\Models\LocalGovernment;
use Carbon\Carbon;

class PollingResultController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('polling_unit_id'))
        {
            $polling_unit_id = $request->polling_unit_id;
            $pollingResults = PollingResult::where('polling_unit_uniqueid', $polling_unit_id)->get();
        }else
        {
            $pollingResults = PollingResult::get();
        }

        $pollingUnit = PollingUnit::where('uniqueid', $polling_unit_id)->first();
        
        $data = [
            "pollingUnit" => $pollingUnit,
            "pollingResults" => $pollingResults];

            // For Indexing all polling results without regard to their specific polling unit, the $pollingUnit ID will be empty 

        return view('polling-result', $data);
    }

    public function show()
    {
        $pollingUnits = PollingUnit::get();
        $data = ["pollingUnits" => $pollingUnits];

        return view('create-polling-result', $data);
    }

    public function getPollingResultsByLga(Request $request)
    {
        $request->validate(["lga" => "required"]);
        $lga_id = $request->lga;

        //get details of the local government
        $currentLocalGovernment = LocalGovernment::where("lga_id", $lga_id)->first();

        //get list of local governments
        $localGovernments = LocalGovernment::all(); 

        //get Cummulative pollling result based on local government
        $cummulativePollingResults = $this->getCummulativePollingResultByLga($lga_id);

        $data = 
        [
            "currentLocalGovernment" => $currentLocalGovernment,
            "localGovernments" => $localGovernments,
            "cummulativePollingResults" => $cummulativePollingResults
        ];

        return view('polling-result-lga', $data);
    }

    public function getCummulativePollingResultByLga(int $lga_id)
    {

        //get all polling units in that local government
        $pollingUnits = PollingUnit::where("lga_id", $lga_id)->get();

        //initialize polling results
        $cummulativePollingResults = [
            "PDP" => 0,
            "DPP" => 0,
            "ACN" => 0,
            "PPA" => 0,
            "CDC" => 0,
            "JP" => 0,
            "ANPP" => 0,
            "LABO" => 0,
            "CPP" => 0
        ];
 
        //get polling results for each polling unit
        foreach ($pollingUnits as $pollingUnit)
        {
            $pollingUnitResults = PollingResult::where("polling_unit_uniqueid", $pollingUnit->uniqueid)->get();
            
            //add each polling unit result to the $cummulativePollingResults array
            foreach ($pollingUnitResults as $pollingUnitResult)
            {

                switch($pollingUnitResult->party_abbreviation)
                {
                    case ("PDP"):
                        $cummulativePollingResults["PDP"] = $cummulativePollingResults["PDP"]+$pollingUnitResult->party_score;
                        break;
                    
                    case ("DPP"):
                        $cummulativePollingResults["DPP"] = $cummulativePollingResults["DPP"]+$pollingUnitResult->party_score;
                        break;

                    case ("ACN"):
                        $cummulativePollingResults["ACN"] = $cummulativePollingResults["ACN"]+$pollingUnitResult->party_score;
                        break;

                    case ("PPA"):
                        $cummulativePollingResults["PPA"] = $cummulativePollingResults["PPA"]+$pollingUnitResult->party_score;
                        break;

                    case ("CDC"):
                        $cummulativePollingResults["CDC"] = $cummulativePollingResults["CDC"]+$pollingUnitResult->party_score;
                        break;

                    case ("JP"):
                        $cummulativePollingResults["JP"] = $cummulativePollingResults["JP"]+$pollingUnitResult->party_score;
                        break;

                    case ("ANPP"):
                        $cummulativePollingResults["ANPP"] = $cummulativePollingResults["ANPP"]+$pollingUnitResult->party_score;
                        break;

                    case ("LABO"):
                        $cummulativePollingResults["LABO"] = $cummulativePollingResults["LABO"]+$pollingUnitResult->party_score;
                        break;

                    case ("CPP"):
                        $cummulativePollingResults["CPP"] = $cummulativePollingResults["CPP"]+$pollingUnitResult->party_score;
                        break;        
                }
            
            }

        }

        return $cummulativePollingResults;
    }

    
    public function showPollingResultsByLga()
    {
        //get list of lga
        $localGovernments = LocalGovernment::all();
        $data = ["localGovernments" => $localGovernments];

        return view('polling-result-lga', $data);
    }

    public function create(Request $request)
    {
        $request->validate(
        [
            "PDP" => "required",
            "DPP" => "required",
            "ACN" => "required",
            "PPA" => "required",
            "CDC" => "required",
            "JP" => "required",
            "ANPP" => "required",
            "LABO" => "required",
            "CPP" => "required"
        ]
        );
        $pollingResultByParty = 
        [
        "PDP" => $request->PDP, "DPP" => $request->DPP, "ACN" => $request->ACN,
        "PPA" => $request->PPA, "CDC" => $request->CDC, "JP" => $request->JP,
        "AANP" => $request->ANPP, "LABO" => $request->LABO, "CPP" => $request->CPP,        
        ];

        $pollingUnitId = $request->Polling_Unit;
        $username = Auth()->user()->name;
        $date_entered =  Carbon::now()->toDateTimeString();
        $ip_address = $request->ip();

        foreach($pollingResultByParty as $index => $value)
        {
            $pollingResult = new PollingResult();

            $pollingResult->polling_unit_uniqueid = $pollingUnitId;
            $pollingResult->party_abbreviation = $index;
            $pollingResult->party_score = $value;
            $pollingResult->entered_by_user = $username;
            $pollingResult->date_entered = $date_entered;
            $pollingResult->user_ip_address = $ip_address;

            $pollingResult->save();
        }

        return back()->with(["message" => "Polling Result Saved Successfully"]);
    }
}
