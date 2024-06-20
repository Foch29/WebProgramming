<?php

namespace App\Http\Controllers;

use Session; //per importare Session nel Controller
use App\Models\User; //per usare il modello User


use Illuminate\Routing\Controller as BaseController;




class Login_Controller extends BaseController //creiamo la classe del controller e mettiamo la funzione che viene chiamata
{                                            //quando inseriamo la route. 
    public function register(){

        if(Session::has("user_id")){ //se user giá loggato non fa fare la registrazione ma porta alla home
           return redirect("home");
        }

        $error = Session::get("error"); //quando ricarica prende l'errore per decidere quale mostrare, anche stringa 
                                        //vuota se non ci sono stati errori

        Session::forget("error"); // elimina la variabile di sessione per evitare il ripresentarsi dell'errore sempre

        return view("register")->with("error",$error); //la funzione view mostrail file .blade.php che
                                                       // gli passiamo sul sito, with serve a passargli la variabile
    }

    public function do_register(){

        if(Session::has("user_id")){ //in teoria se giá é presente non fa fare la registrazione ma porta alla home
            return redirect("home");
        }

        //validazione dati
        if(strlen(request("username")) == 0 || strlen(request("password")) == 0 || strlen(request("confirm"))== 0
        || strlen(request("email")) == 0 ){
                                                            
            Session::put('error','empty_fields'); //salviamo come dati nella sessione la coppia chiave valore 
                                                 //errore - empty_fields


            return redirect("register")->withInput();   //redirect crea una risposta http per un altra pagina
                                                        //in questo caso la funzione withInput() salva i dati inseriti
                                                        //per renerli accessibili dopo dalla funzione old("") 

        }     

        else if(request("password") != request("confirm")){

            Session::put('error','wrong');
            return redirect("register")->withInput();   

        }   

        else if(User::where("name",request("username"))->first() || User::where("email",request("email"))->first()){
                                                                     //accediamo al modello user e cerchiamo nel database
                                                                     //gli username giá presenti con lo stesso nome del
                                                                     //nuovo profilo che vogliamo creare. Torniamo il
                                                                     // primo. Se esiste significa che l'username é giá 
                                                                     // utilizzato e rimandiamo al register
            Session::put('error','existing');
            return redirect("register")->withInput();   

        }   


        //Creazione utente
        $user = new User;
        $user->name = request("username"); //riempiamo i campi del nuovo utente
        $user->password = password_hash(request("password"),PASSWORD_BCRYPT); //inseriamo la password dopo averla
                                                                              // con l'algoritmo PASSWORD_BCRYPT

        $user->email = request("email"); //nel database serve la mail, inserisci campo nel form e check per evitare duplicati

        
        $user->save(); //aggiungiamo al database l'utente


        //Login
        Session::put("user_id",$user->id); //

        //Redirect alla home
        return redirect("home");

    }

    public function login(){

        if(Session::has("user_id")){ //in teoria se giá é presente non fa fare il login ma porta alla home
            return redirect("home");
        }

        $error = Session::get("error"); 

        Session::forget("error"); 

        return view("login")->with("error",$error); 
        }

    public function do_login(){

        if(Session::has("user_id")){ //in teoria se giá é presente non fa fare la registrazione ma porta alla home
            return redirect("home");
        }

        //validazione dati
        if(strlen(request("email")) == 0 || strlen(request("password")) == 0 ){
                                                            
            Session::put('error','empty_fields'); 

            return redirect("login")->withInput();  
        }       

        $user = User::where("email",request("email"))->first();

        if(!$user || password_verify(request("password"),$user->password)){ //per confrontare nonostante l'hashing
            Session::put('error','wrong');
            return redirect("login")->withInput();   

        }   


        //Login
        Session::put("user_id",$user->id); //

        //Redirect alla home
        return redirect("home");

    }


    public function logout(){

        Session::flush(); //elimina tutti i dati della sessione
        return redirect("login");
    }


}
