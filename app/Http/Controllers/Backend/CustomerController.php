<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\CreditCard;
use DB;
use Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers=Customer::all();
        return view('pages.backend.customer.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'full_name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required',
            'credit_card_number' => 'required',
            'csvInput' => 'required',
            'name_on_card' => 'required',
            'expired_date' => 'required',
        ]);

        if ($validator->passes()) {

            DB::beginTransaction();
            try {

                $data = new Customer();

                $data->full_name = $request->full_name;
                $data->email = $request->email;
                $data->address = $request->address;
                $data->phone = $request->phone;

                $data->save();

                $card = new CreditCard();
                $card->card_number = encrypt($request->credit_card_number);
                $card->csv = encrypt($request->csvInput);
                $card->name_on_card = encrypt($request->name_on_card);
                $card->type = encrypt($request->type);
                $card->expired_date = encrypt($request->expired_date);
                $card->customer_id = $data->id;

                $card->save();

                DB::commit();
                return json_encode(array('response' => 'success', 'message' => 'Customer Added Successfully!'));

            } catch (\Exception $e) {

                DB::rollBack();
                return json_encode(array('response' => 'error', 'message' => 'Something Went Wrong!'));

            }

        }

        return response()->json(['error'=>$validator->errors()]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = Customer::where('id',$id)->first();
        $card =  CreditCard::where('customer_id',$customer->id)->first();


            $card_decrypted = [];

            $card_decrypted['card_number'] = decrypt($card->card_number);
            $card_decrypted += [ "csv" => decrypt($card->csv) ];
            $card_decrypted += [ "name_on_card" => decrypt($card->name_on_card) ];
            $card_decrypted += [ "type" => decrypt($card->type) ];
            $card_decrypted += [ "expired_date" => decrypt($card->expired_date) ];

        return json_encode([$customer, $card_decrypted]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'edit_full_name' => 'required',
            'edit_email' => 'required|email',
            'edit_address' => 'required',
            'edit_phone' => 'required',
            'edit_credit_card_number' => 'required',
            'edit_csv' => 'required',
            'edit_name_on_card' => 'required',
            'edit_expired_date' => 'required',
        ]);

        if ($validator->passes()) {

            DB::beginTransaction();
            try {

                $data = Customer::find($id);

                $data->full_name = $request->edit_full_name;
                $data->email = $request->edit_email;
                $data->address = $request->edit_address;
                $data->phone = $request->edit_phone;

                $data->update();

                $card = CreditCard::where('customer_id',$id)->first();
                $card->card_number = encrypt($request->edit_credit_card_number);
                $card->csv = encrypt($request->edit_csv);
                $card->name_on_card = encrypt($request->edit_name_on_card);
                $card->type = encrypt($request->edit_type);
                $card->expired_date = encrypt($request->edit_expired_date);
                $card->update();

                DB::commit();
                return json_encode(array('response' => 'success', 'message' => 'Customer Updated Successfully!'));

            } catch (\Exception $e) {

                DB::rollBack();
                return json_encode(array('response' => 'error', 'message' => 'Something Went Wrong!'));

            }

        }

        return response()->json(['error'=>$validator->errors()]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        DB::beginTransaction();
        try {
            $customer=Customer::where('id',$id)->first();
            $card=CreditCard::where('customer_id',$customer->id)->first();

            $card->delete();

            $customer->delete();

            DB::commit();
            return json_encode(array('response' => 'success', 'message' => 'Customer Deleted Successfully!'));

        } catch (\Exception $e) {

            DB::rollBack();
            return redirect()->back()->withError($e->getMessage());

        }
    }
}
