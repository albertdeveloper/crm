<?php


namespace App\Repositories;


use App\Models\User;

class UserRepository implements UserRepositoryContract
{
    public function findUserById($id = false)
    {
        // if id not passed get current logged id
        $id = ($id) ? $id : auth()->user()->id;

        return User::findOrFail($id);
    }

    public function save_profile($request)
    {
        //save it to user table
        auth()->user()->update([
            'email' => $request->email,
            'name' => $request->name,
        ]);

        //save it to profile table
        auth()->user()->profile()->updateOrCreate(
            ['user_id' => auth()->user()->id],
            [
                'phone' => $request->phone,
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'country' => $request->country
            ]
        );


    }

}
