<?php



namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $req)
    {
        // Valider les données d'entrée
        $rules = [
            'role'=> 'required|string',
            'name' => 'required|string|unique:myuser,name',  // unique sur le nom maintenant
            'password' => 'required|string|min:6'  // Pas de champ email
        ];
        $validator = Validator::make($req->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Créer un nouvel utilisateur dans la table users
        $user = User::create([
            'name' => $req->name,
            'password' => Hash::make($req->password),  // Crée le mot de passe haché
            'role' => $req->role


        ]);

        // Générer un token d'accès personnel
        $token = $user->createToken('Personal Access Token')->plainTextToken;

        // Répondre avec les détails de l'utilisateur et le token
        $response = ['user' => $user, 'token' => $token];
        return response()->json($response, 200);
    }

    public function login(Request $req)
    {
        // Valider les données d'entrée
        $rules = [
            'name' => 'required|string',  // Champ name à valider
            'password' => 'required|string'  // Champ mot de passe
        ];
        $req->validate($rules);

        // Rechercher l'utilisateur par le nom dans la table users
        $user = User::where('name', $req->name)->first();

        // Vérifier si l'utilisateur existe et si le mot de passe est correct
        if ($user && Hash::check($req->password, $user->password)) {
            $token = $user->createToken('Personal Access Token')->plainTextToken;
            $response = ['user' => $user, 'token' => $token];
            return response()->json($response, 200);
        }

        // Si l'authentification échoue
        $response = ['message' => 'Nom ou mot de passe incorrect'];
        return response()->json($response, 400);
    }
}
