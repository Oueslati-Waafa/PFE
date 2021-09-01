<?php

namespace App\Http\Controllers;

use App\Administrator;
use App\Classe;
use App\Professor;
use App\Student;
use App\User;
use App\Utils;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laratrust\Models\LaratrustRole;

class AdministratorController extends Controller
{
  //
  public function add(Request $request)
  {
    $this->validate($request, [
      "name" => "required",
      "lastname" => "required",
      "email" => "required",
      "password" => "required",
      "type" => "required",
      "birthday" => "required",
      "gender" => "required"
    ]);

    $userController = new UserController();
    $user = $userController->add($request);

    $admin = new Administrator();
    $admin->user_id = $user->id;
    $admin->save();
    $admin = Administrator::find($admin->id);
    $admin->user;
    $admin->roles;
    if (sizeof($admin->roles) > 0) {
      $admin->role = $admin->roles[0]->id;
    }
    return response()->json([
      "success" => "The administrator is successfully added",
      "administrator" => $admin
    ]);

  }

  function edit(Request $request)
  {
    $this->validate($request, [
      'cin' => 'nullable|unique:users',
      'email' => 'nullable|unique:users',
      'password' => 'nullable|min:8'
    ]);
    $adminId = (int)$request->id;
    $admin = Administrator::find($adminId);
    $user = $admin->user;
    if ($adminId == $admin->id) {
      if ($request->has('email')) {
        $user->email = $request->email;
      }
      if ($request->has('name')) {
        $user->name = ucwords(strtolower($request->name));
      }
      if ($request->has('lastname')) {
        $user->lastname = strtoupper($request->lastname);
      }
      if ($request->has('birthday')) {
        $user->birthday = $request->birthday;
      }
      if ($request->has('cin')) {
        $user->cin = $request->cin;
      }
      if ($request->has('address')) {
        $user->address = $request->address;
      }
      if ($request->has('gender')) {
        $user->gender = $request->gender;
      }
      if ($request->has('password') && $request->password) {
        if ($admin->user_id != $request->user->id) {
          return response()->json([
            'errors' => [
              'not_authorized' => [
                'Only the account owner can change his password'
              ]
            ],
          ], Response::HTTP_BAD_REQUEST);
        } else {
          $user->password = bcrypt($request->password);
        }
      }
    }

    $user->save();
    $admin->save();

    $admin = Administrator::where('id', $admin->id)->with(['user'])->first();
    return response()->json([
      'admin' => $admin,
    ]);
  }

  public function delete(Request $request)
  {
    $this->validate($request, [
      "user_id" => "required|integer|exists:users,id",
    ]);

    $user = User::find($request->user_id);
    if ($request->user_id != $request->user->id) {
      return response()->json([
        'errors' => [
          'not_authorized' => [
            'Only the owner can delete his account',
          ]
        ],
      ], Response::HTTP_BAD_REQUEST);
    } else {
      $user->delete();
    }
    return response()->json([
      "success" => "User has been deleted successfully"
    ], 200);
  }

  public function getAdministrator(Request $request)
  {
    $this->validate($request, [
      "user_id" => "required"
    ]);

    $admin = Administrator::where("user_id", $request->user_id)->first();
    if (!$admin) return response()->json(["error" => "Admin not found"], 404);
    $admin->user;
    return response()->json(["Admin" => $admin], 200);
  }

  public function all()
  {
    $admins = array();
    foreach (Administrator::with(["user"])->get() as $admin) {
      $admin->roles;
      if (sizeof($admin->roles) > 0) {
        $admin->role = $admin->roles[0]->id;
      }
      array_push($admins, $admin);
    }
    return $admins;
  }

  public function getAfter(Request $request)
  {
    $this->validate($request, [
      "admin_id" => "required|integer"
    ]);
    $admins = Administrator::where("id", ">", $request->admin_id)->with(["user"])->get();
    return response()->json(["admins" => $admins]);
  }

  public function update(Request $request)
  {
    $admin = Administrator::find($request->admin_id);
    $role = LaratrustRole::find($request->role);
    $admin->syncRoles([$role]);
    $admin->save();
    $admin->roles;
    if (sizeof($admin->roles) > 0) {
      $admin->role = $admin->roles[0]->id;
    }
    return response()->json([
      "Admin" => $admin
    ]);
  }

  



 
}