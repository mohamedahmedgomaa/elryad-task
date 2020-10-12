<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use App\VerificationCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class GeneralController extends Controller
{
    public  function  checkUserMobileExist(Request $request){

        $validator = Validator::make($request->all(), [
            'mobile' => 'required',
        ]);

        $chech=User::where('mobile','=',$request->mobile)->first();

        $permitted_chars = '0123456789';
        $code = substr(str_shuffle($permitted_chars), 0, 4);
        $chech_mobile=VerificationCode::where('mobile','=',$request->mobile)->first();
        if(!$chech_mobile){
            $creat= VerificationCode::create([
                'mobile' => $request->mobile,
                'code' => $code,
                'exp_time' => '2025-09-06',
            ]);
            if(!$chech){
                return responseJson(200, 'Not Exist', $creat);
            }else{
                return responseJson(400, 'Exist',$creat );
            }
        }else{
            $chech_mobile->code=$code;
            $chech_mobile->save();
            if(!$chech) {
                return responseJson(200, 'Not Exist', $chech_mobile);
            }else{
                return responseJson(400, 'Exist',$chech_mobile );
            }
        }
    }
    public  function  checkVerificationCode(Request $request){

        $validator = Validator::make($request->all(), [
            'mobile' => 'required',
            'code' => 'required',
        ]);

        $chech=User::where('mobile','=',$request->mobile)->first();
        $chech_mobile_code=VerificationCode::where('mobile','=',$request->mobile)->where('code','=',$request->code)->first();
        if(!$chech){
            // new user register

            if(!$chech_mobile_code){
                $data['message']="This New User And Fail Code";
                $data['account']="new";
                $data['mobile']=$request->mobile;
                return responseJson(400, 'fail', $data);
            }else{
                $data['message']="This New User And Success Code";
                $data['account']="new";
                $data['mobile']=$request->mobile;
                return responseJson(200, 'Success', $data);
            }
        }else{
            // reset  Password

            if(!$chech_mobile_code){
                $data['message']="This Exist User And Fail Code";
                $data['mobile']=$request->mobile;
                $data['account']="exist";
                return responseJson(400, 'fail', $data);
            }else{
                $success['token'] = $chech->createToken('Token Name')->accessToken;
                $chech['token'] = $success['token'];

                $data['message']="This Exist User And Success Code";
                $data['account']="exist";
                $data['mobile']=$request->mobile;
                $data['user']=$chech;

                return responseJson(200, 'Success', $data);
            }
        }
    }
    public  function  userSignUp(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'password' => 'required',
            'birth_date' => 'required',
            'gender' => 'required|in:male,female',
            'user_type' => 'required|in:client,representative',
            'mobile' => 'required|unique:users',
            'email' => 'required|email|unique:users',
        ]);

        if ($validator->fails()) {
            return responseJson(400, $validator->errors()->first(), $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $input['status'] = 'active';
        $user = User::create($input);

        if ( $request->hasFile('image')  ) {
            $image = $request->image;
            $image_new_name = time() . $image->getClientOriginalName();
            $image->move('uploads/users', $image_new_name);

            $user->image = 'uploads/users/'.$image_new_name;
            $user->save();
        }



        $success['token'] = $user->createToken('Token Name')->accessToken;
        $success['name'] = $user->name;
        $user['token'] = $success['token'];
        $user['image'] = $user->image;
        $data['message']="create User Success";
        $data['account']="exist";
        $data['user']=$user;

        return responseJson(200, trans('create User Success'), $data);

    }



}
