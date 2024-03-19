<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\leads;
class LeadsController extends Controller
{
    public function leadsRecord()
    {
        $leadsRecord = leads::all();
        return response()->json(['status' => 200, 'data' => $leadsRecord]);
    }

    public function leadsRecordSave(Request $request)
    {
        $leadsRecord = new leads();
        $leadsRecord->company_name = $request['company_name'];
        $leadsRecord->website = $request['website'];
        $leadsRecord->client_name = $request['client_name'];
        if ($leadsRecord->save()) {
            return response()->json([
                'status' => 200,
                'message' => 'Leads Record Added Successfully!',
                'data' => $leadsRecord
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Failed to add leads record'
            ]);
        }
    }








}
