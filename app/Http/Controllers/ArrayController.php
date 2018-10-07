<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 05/10/2018
 * Time: 17:45
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArrayController extends Controller
{
    public function returnArray(){

        $dados = [
            'status' => true,
            'message' => 'Dados enviados não é possivel converter para json'
        ];
        $payload = [
            ['id' => 1, 'name' => 'João'],
            ['id' => 2, 'name' => 'Pedro'],
            ['id' => 3, 'name' => 'Pedro'],
        ];
        $json = array();
        foreach ($payload as $item){
            $json[] = $item;
        }

        if(is_array($payload)){
            return json_encode($json);
        } else {
            return json_encode($dados);
        }
    }

    public function postSoma(Request $request){

        if(!empty($request->numeros)){
            $numeros = $request->numeros;
            $numeros =  preg_replace("/[^0-9]/", ",", $numeros);
            $numeros_separados = explode(',', $numeros);
            //dd($numeros_separados);
            $soma = 0;
            foreach($numeros_separados as $number){
                $soma += $number;
            }
            return $soma;
        }

    }

}