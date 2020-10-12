<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\UserDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\userCreate;
use App\Traits\ProductTrait;
use App\User;
use App\VerificationCode;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class UserController extends Controller
{
    use ProductTrait;

    /**
     * Display a listing of the resource.
     *
     * @param UserDatatable $user
     * @return void
     */
    public function users(UserDatatable $user)
    {
        return $user->render('admin.users.index');
    }

    public function userCreate()
    {
        return view('admin.users.create');
    }

    public function userStore(userCreate $request)
    {
        $this->createNewUser($request->all());
        flash()->success(trans('admin.createMessageSuccess'));
        return redirect(route('admin.users'));
    }

    public function userEdit($id)
    {
        $model = User::findOrFail($id);
        return view('admin.users.edit', compact('model'));
    }

    public function userUpdate(Request $request, $id)
    {
        $records = User::findOrFail($id);
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'sometimes|nullable|confirmed',
            'mobile' => 'required|unique:users,mobile,' . $id,
            'image' => 'nullable',
            'user_type' => 'required|in:admin,client,representative',
            'gender' => 'required|in:male,female',
            'birth_date' => 'required|date',
        ]);
        $records->update($request->except('password'));
        if (request()->input('password')) {
            $records->update(['password' => bcrypt($request->password)]);
        }
        if ($request->hasFile('image')) {
            $image = $request->image;
            $image_new_name = time() . $image->getClientOriginalName();
            $image->move('uploads/users', $image_new_name);

            $records->image = 'uploads/users/' . $image_new_name;
            $records->save();
        }
        flash()->success(trans('admin.editMessageSuccess'));
        return redirect(route('admin.users'));
    }


    public function userDelete($id)
    {
        $delete = User::where('id', $id)->delete();

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = trans('company.delete_success');
        } else {
            $success = true;
            $message = trans('company.delete_error');
        }

        //  Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

}
