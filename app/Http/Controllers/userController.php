<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class userController extends Controller
{
    public function index()
    {
        $items = User::all();

        return view('v1.user.index', compact('items'));
    }
    public function create()
    {
        return view('v1.user.create');
    }
    public function store(Request $request)
    {

        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $fail = [
                        'Code' => '2',
                        'Message' => 'fail',
                        "Result" => [
                            "IsOK"=> 'fail'
                        ]
                    ];
            return response()->json($fail);
        }

    //   $this->create_account($request->all());
        User::create($request->all());

        $data = [
            'Code' => '0',
            'Message' => 'success',
            "Result" => [
                "IsOK"=> 'true'
            ]
        ];

        return response()->json($data);



//  return redirect('/v1/user');

    }
    public function change($id)
    {

        $items = User::find($id);
        return view('v1.user.change', compact('items'));
    }


    public function update(Request $request, $id)
    {

        $User = User::find($id);
        $update = $User->update($request->all());


        if ($update) {

            $data = [
                'Code' => '0',
                'Message' => 'success',
                "Result" => [
                    "IsOK" => 'true'
                ]
            ];
            return response()->json($data);
        } else {
            $data = [
                'Code' => '2',
                'Message' => 'fail',
                "Result" => [
                    "IsOK" => 'fail'
                ]
            ];
            return response()->json($data);
        }
        // return redirect('/v1/user');
    }

    public function destroy($id)
    {

        $res = User::destroy($id);
        // return redirect('/v1/user');


        if ($res) {

            $data = [
                'Code' => '0',
                'Message' => 'success',
                "Result" => [
                    "IsOK" => 'true'
                ]
            ];
            return response()->json($data);
        } else {
            $data = [
                'Code' => '2',
                'Message' => 'fail',
                "Result" => [
                    "IsOK" => 'fail'
                ]
            ];
            return response()->json($data);
        }
    }

    public function test()
    {


        return view('v1.user.login');
    }


    public function login(Request $request)
    {
        $word = $request->input('Password');
        $name = $request->input('Account');
        $Account = User::where('Account', $name)->where('Password',$word)->first();


        if ($Account === null) {
            $data = [
                'Code' => '2',
                'Message' => 'Login Failed',
                "Result" => [
                    "IsOK"=> 'fail'
                ]
            ];
            return response()->json(($data), 400);

        }else{
            $data = [
                'Code' => '0',
                'Message' => 'success',
                "Result" => [
                    "IsOK"=> 'true'
                ]
            ];


            return response()->json(($data), 200);
        }

    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'Account' => ['required', 'string', 'max:50', 'unique:users'],
            'Password' => ['required', 'string', 'min:8'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create_account(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'Account' => $data['Account'],
            'Password' => Hash::make($data['Password']),
        ]);
    }


}
