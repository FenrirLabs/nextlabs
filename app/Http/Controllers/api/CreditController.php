<?php

    namespace App\Http\Controllers\Api;

    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;

    class CreditController extends Controller
    {
        public function index($id)
        {
            if(empty($id) || $id < 1){
                return response()->json(['status'=>'error', 'message'=> 'Id available is required'], 400);
            }

            try {
                $credit = DB::table('credits')
                    ->where('id', $id)
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

        public function updateCredit(Request $request, $phone)
        {
            if(empty($phone)){
                return response()->json(['status'=>'error', 'message'=> 'Phone is required'], 400);
            }

            $validator = Validator::make($request->all(), [
                'IBAN' => 'required',
            ]);

            if($validator->fails()){
                return response()->json($validator->errors()->toJson(), 400);
            }

            try {
                DB::table('credits')->update($validator->validate());

                try {

                    $creditList = DB::table('credits')->where('phone', $phone)->get();

                    return response()->json([
                        'status' => 'success',
                        'message' => 'Limit updated successfully',
                        'data' => $creditList
                    ]);

                }catch (Exception $e) {
                    return response()->json(['status'=>'error', 'message'=>$e->getMessage()], 400);
                }


            } catch (\Exception $e) {
                return response()->json(['status'=>'error', 'message'=>$e->getMessage()], 400);
            }
        }


    }
