<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proposals;
use App\Models\ProposelItem;

class ProposalsController extends Controller
{
    public function proposalsRecords()
    {
        $proposalsRecords = Proposals::with('leads')->get();
        return response()->json(['status' => 200, 'data' => $proposalsRecords]);
    }

    public function proposalsRecordsSave(Request $request)
    {
        $proposalsRecord = new Proposals();
        $hashValue = hash('sha1', $request['hash']);
        $proposalsRecord->company_id = $request['companyId'];
        $proposalsRecord->lead_id = $request['leadId'];
        $proposalsRecord->valid_till = $request['validaTill'];
        $proposalsRecord->sub_total = $request['subTotal'];
        $proposalsRecord->total = $request['total'];
        $proposalsRecord->currency_id = $request['currencyId'];
        $proposalsRecord->discount_type = $request['discountType'];
        $proposalsRecord->discount = $request['discount'];
        // $proposalsRecord->invoice_convert = $request['invoice_convert'];
        $proposalsRecord->status = $request['status'];
        $proposalsRecord->note = $request['note'];
        $proposalsRecord->description = $request['description'];
        $proposalsRecord->added_by = $request['added_by'];
        $proposalsRecord->last_updated_by = $request['last_updated_by'];
        $proposalsRecord->calculate_tax = $request['calculate_tax'];
        $proposalsRecord->send_status = $request['send_status'];
        $proposalsRecord->hash = $hashValue;
        if ($proposalsRecord->save()) {
            return response()->json([
                'status' => 200,
                'message' => 'Proposals Record Added Successfully!',
                'data' => $proposalsRecord
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Failed to add Proposals record'
            ]);
        }
    }


    // public function proposalsRecordsSave(Request $request)
    // {
    //     // Create a new Proposals instance
    //     $proposalsRecord = new Proposals();

    //     // Assign values from the request to the Proposals instance
    //     $proposalsRecord->company_id = $request->companyId;
    //     $proposalsRecord->lead_id = $request->leadId; // Ensure that this leadId exists in the leads table
    //     $proposalsRecord->valid_till = $request->validaTill;
    //     $proposalsRecord->sub_total = $request->subTotal;
    //     $proposalsRecord->total = $request->total;
    //     $proposalsRecord->currency_id = $request->currencyId;
    //     $proposalsRecord->discount_type = $request->discountType;
    //     $proposalsRecord->discount = $request->discount;
    //     // $proposalsRecord->invoice_convert = $request->invoice_convert;
    //     $proposalsRecord->status = $request->status;
    //     $proposalsRecord->note = $request->note;
    //     $proposalsRecord->description = $request->description;
    //     $proposalsRecord->added_by = $request->added_by;
    //     $proposalsRecord->last_updated_by = $request->last_updated_by;
    //     $proposalsRecord->calculate_tax = $request->calculate_tax;
    //     $proposalsRecord->send_status = $request->send_status;

    //     // Save the Proposals record
    //     if ($proposalsRecord->save()) {
    //         // Retrieve the ID of the saved proposal record
    //         $proposalsId = $proposalsRecord->id;

    //         // Create a new ProposelItem instance
    //         $proposelItem = new ProposelItem();

    //         // Assign values from the request to the ProposelItem instance
    //         if ($proposelItem) {
    //             $proposelItem->proposal_id = $proposalsId;
    //             $proposelItem->item_name = $request->itemName;
    //             $proposelItem->quantity = $request->quantity;
    //             $proposelItem->unit_price = $request->unit_price;
    //             $proposelItem->amount = $request->amount;
    //             $proposelItem->taxes = serialize($request->taxes);
    //             $proposelItem->unit_id = $request->unit_id;
    //             $proposelItem->product_id = $request->product_id;
    //             $proposelItem->save();
    //         }

    //         // Return a success response
    //         return response()->json([
    //             'status' => 200,
    //             'message' => 'Proposals Record Added Successfully!',
    //             'data' => $proposalsRecord
    //         ]);
    //     } else {
    //         // Return an error response if saving failed
    //         return response()->json([
    //             'status' => 500,
    //             'message' => 'Failed to add Proposals record'
    //         ]);
    //     }
    // }


    public function proposalsRecordsUpdate(Request $request, $id)
    {
        $proposalsRecord = Proposals::find($id);
        if (!$proposalsRecord) {
            return response()->json([
                'status' => 404,
                'message' => 'Proposals Record not found'
            ], 404);
        }

        $hashValue = hash('sha1', $request['hash']);
        $proposalsRecord->company_id = $request['companyId'];
        $proposalsRecord->lead_id = $request['leadId'];
        $proposalsRecord->valid_till = $request['validaTill'];
        $proposalsRecord->sub_total = $request['subTotal'];
        $proposalsRecord->total = $request['total'];
        $proposalsRecord->currency_id = $request['currencyId'];
        $proposalsRecord->discount_type = $request['discountType'];
        $proposalsRecord->discount = $request['discount'];
        // $proposalsRecord->invoice_convert = $request['invoice_convert'];
        $proposalsRecord->status = $request['status'];
        $proposalsRecord->note = $request['note'];
        $proposalsRecord->description = $request['description'];
        $proposalsRecord->added_by = $request['added_by'];
        $proposalsRecord->last_updated_by = $request['last_updated_by'];
        $proposalsRecord->hash = $hashValue;
        $proposalsRecord->calculate_tax = $request['calculate_tax'];
        $proposalsRecord->send_status = $request['send_status'];
        // dd($proposalsRecord);
        if ($proposalsRecord->update()) {
            return response()->json([
                'status' => 200,
                'message' => 'Proposals Record Updated Successfully!',
                'data' => $proposalsRecord
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Failed to update Proposals record'
            ]);
        }
    }

    public function proposalsRecordsDelete($id)
    {
        $proposalsRecord = Proposals::find($id);
        if (!$proposalsRecord) {
            return response()->json([
                'status' => 404,
                'message' => 'Proposals Record not found'
            ], 404);
        }
        if ($proposalsRecord->delete()) {
            return response()->json([
                'status' => 200,
                'message' => 'Proposals Record Deleted Successfully!',
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Failed to Delete Proposals record'
            ]);
        }
    }
}
