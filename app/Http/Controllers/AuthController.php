<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

//require '../vendor/autoload.php';
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Client;


class AuthController extends Controller
{
    public function login()
    {
        return view('Auths.login');
    }

    public function postlogin(Request $request)
    {
        $client = new Client();
        $response = $client->request('POSt', 'https://labinformatika.itats.ac.id/api/login-praktikan', [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'body' => json_encode(

                [
                    "npm" => $request->npm,
                    "password" => $request->password
                ]
            )
        ]);


        $test = json_decode($response->getBody()->getContents());
        if (count($test->users) == 0) {

            $client = new Client();
            $response = $client->request('POSt', 'https://labinformatika.itats.ac.id/api/login-admin', [
                'headers' => [
                    'Content-Type' => 'application/json'
                ],
                'body' => json_encode(

                    [
                        "username" => $request->npm,
                        "password" => $request->password
                    ]
                )
            ]);
            $test = json_decode($response->getBody()->getContents());

            if (count($test->users) == 0) {
                $message = "NPM atau Password salah";
                return view('Auths.login', compact('message'));
                // dd(' Usernameatau password salah');
            } else if ($test->users[1] == "admin") {
                $cek_login = User::where('npm', $test->users[2])->first();
                if ($cek_login == null) {
                    $get_user = User::create([
                        'npm' => $test->users[2],
                        'name' => $test->users[0],
                        'role' => 'admin',
                    ]);
                    Auth::login($get_user);
                } else {
                    Auth::login($cek_login);
                }
                return redirect('/dashboard');
            }

            return redirect('/login');
        } else if ($test->users[2] == "Praktikan") {
            $cek_login = User::where('npm', $test->users[0])->first();
            if ($cek_login == null) {
                $get_user = User::create([
                    'npm' => $test->users[0],
                    'name' => $test->users[1],
                    'foto' => $test->users[3],
                    'role' => 'mahasiswa',
                ]);
                Auth::login($get_user);
            } else {
                Auth::login($cek_login);
            }
            return redirect('/dashboard');
        }


        // dd($test);

        // if (Auth::attempt($request->only('email', 'password'))) {
        //     return redirect('/dashboard');
        // }
        // ;
    }
    public function logout()
    {
        Auth::logout();
        Session::forget('soal');
        Session::forget('jawab');
        Session::forget('jawaban');
        return redirect('/login');
    }
}
