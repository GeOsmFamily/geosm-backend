<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{

    public function checklogin(Request $request)
    {
        try {

            $post = $request->all();

            $account = DB::table("utilisateur")->select("super", "droit", "nom", "prenom", "src_photo", "id_utilisateur")->where('email', $post['email'])->where("mot_de_passe", $post["mdp"])->get();

            if (sizeof($account) == 0) {

                return "non";
            } else {

                foreach ($account as $key) {

                    $request->session()->put('id', $key->id_utilisateur);
                    $request->session()->put('nom', $key->nom);
                    $request->session()->put('super', $key->super);
                    $request->session()->put('prenom', $key->prenom);
                    $request->session()->put('src_photo', $key->src_photo);
                    $request->session()->put('droit', $key->droit);
                }

                $request->session()->put('session', true);

                return "ok";
            }
        } catch (\Exception $e) {

            return $e;
        }
    }


    public function loginAdmin(Request $request)
    {
        try {

            $post = $request->all();

            $account = DB::table("utilisateur")->select("super", "droit", "nom", "prenom", "src_photo", "id_utilisateur")->where('email', $post['email'])->where("mot_de_passe", $post["mdp"])->get();

            if (sizeof($account) == 0) {

                return "non";
            } else {

                foreach ($account as $key) {

                    if ($key->droit == 'administrateur') {

                        $request->session()->put('id', $key->id_utilisateur);
                        $request->session()->put('nom', $key->nom);
                        $request->session()->put('super', $key->super);
                        $request->session()->put('prenom', $key->prenom);
                        $request->session()->put('src_photo', $key->src_photo);
                        $request->session()->put('droit', $key->droit);

                        $request->session()->put('session', true);
                    }
                }

                $data['status'] = 'ok';
                $data['data'] = $account;
                return $data;
            }
        } catch (\Exception $e) {

            return $e;
        }
    }


    function deconnect(Request $request)
    {

        $request->session()->forget('key');

        $request->session()->forget('session');
        $request->session()->forget('id');
        $request->session()->forget('nom');
        $request->session()->forget('super');
        $request->session()->forget('prenom');
        $request->session()->forget('src_photo');
        $request->session()->forget('droit');
        return "";
    }
}
