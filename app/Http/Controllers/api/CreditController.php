<?php

    namespace App\Http\Controllers\Api;

    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;

    class CreditController extends Controller
    {
        public function index($iban)
        {
            if(empty($iban)){
                return response()->json(['status'=>'error', 'message'=> 'Iban is required'], 400);
            }

            try {
                $credit = DB::table('clientes')
                    ->where('iban', $iban)
                    ->get();

                $creditInquiry = [
                    'status' => 'success',
                    'data' => $credit,
                ];

                return response()->json($creditInquiry);

            } catch (\Exception $e){
                return response()->json(['status'=>'error', 'message'=>$e->getMessage()], 400);
            }
        }

        public function updateCredit(Request $request, $iban)
        {
            if(empty($iban)){
                return response()->json(['status'=>'error', 'message'=> 'Iban is required'], 400);
            }

            $validator = Validator::make($request->all(), [
                'debit_balance' => 'required',
            ]);

            if($validator->fails()){
                return response()->json($validator->errors()->toJson(), 400);
            }

            try {
                DB::table('clientes')->update($validator->validate());

                try {

                    $creditList = DB::table('clientes')->where('iban', $iban)->get();

                    return response()->json([
                        'status' => 'success',
                        'message' => 'Limit updated successfully',
                        'data' => $creditList
                    ]);

                }catch (\Exception $e) {
                    return response()->json(['status'=>'error', 'message'=>$e->getMessage()], 400);
                }


            } catch (\Exception $e) {
                return response()->json(['status'=>'error', 'message'=>$e->getMessage()], 400);
            }
        }


    }
