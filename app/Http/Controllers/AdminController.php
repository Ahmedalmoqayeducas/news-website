<?php

namespace App\Http\Controllers;

use App\Models\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rules\Password;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Admin::paginate('8');

        //
        return response()->view('pages.admin.read', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return response()->view('pages.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->name);
        $validator = validator($request->all(), [
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:admins,email',
            'phone' => 'required|string',
            'password' => [
                'required',
                Password::min('8')
                    ->numbers()
                    ->letters()
                    ->symbols()
                    ->uncompromised()
            ],
        ]);
        if (!$validator->fails()) {
            $admin = new Admin();
            $admin->name = $request->input('name');
            $admin->email = $request->input('email');
            $admin->phone = $request->input('phone');
            $admin->password = Hash::make($request->input('password'));
            $saved = $admin->save();
            return response()->json(
                [
                    'status' => $saved,
                    'message' => $saved ? 'Created Successfully' : 'Created Failed'
                ],
                $saved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
            );
        } else {
            return response()->json(
                [
                    'status' => false,
                    'message' => $validator->getMessageBag()->first()
                ],
                Response::HTTP_BAD_REQUEST
            );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {

        return response()->view('pages.admin.edit', ['data' => $admin]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $admin = Admin::findOrFail($id);
        $validator = validator($request->all(), [
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:admins,email,' . $id,
            'phone' => 'required',

        ]);
        if (!$validator->fails()) {

            $admin->name = $request->input('name');
            $admin->email = $request->input('email');
            $admin->phone = $request->email;
            $saved = $admin->save();
            return response()->json(
                [
                    'status' => $saved,
                    'message' => $saved ? 'Updated Successfully' : 'Updated Failed'
                ],
                $saved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
            );
        } else {
            return response()->json(
                [
                    'status' => false,
                    'message' => $validator->getMessageBag()->first(),
                ],
                Response::HTTP_BAD_REQUEST
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // dd($admin->name);
        /**
         * its dont work
         */

        $deleted = Admin::where('id', $id)->delete();
        session()->flash('success', $deleted);
        return response()->json(
            ['status' => true, 'message' => $deleted > 0 ? 'Deleted Successfully' : 'Deleted Failed'],
            $deleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );
    }

    public function trash()
    {
        $admins = Admin::onlyTrashed()->paginate('8');

        return response()->view('pages.admin.trash', ['data' => $admins]);
    }
    public function restore(Request $request, string  $id)
    {
        $restord = Admin::where('id', $id)->restore();

        return response()->json(['status' => true, 'message' => $restord ? "admin $request->name has been restored" : 'restore failed']);
    }
    public function forceDelete(Request $request, string $id)
    {
        $forceDeleted = Admin::where('id', $id)->forceDelete();
        return response()->json(
            ['status' => true, 'message' => $forceDeleted > 0 ? 'Deleted Successfully' : 'Deleted Failed'],
            $forceDeleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );
    }
}
