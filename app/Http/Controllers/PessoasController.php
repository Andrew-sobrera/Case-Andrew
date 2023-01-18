<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa;
//use App\Http\Controllers\DOMDocument;

class PessoasController extends Controller
{
    public function index(){
        //chama o metodo que gera o documento XML
        $this->geraXML();
        //recupera todos os dados da tabela
        $pessoas = Pessoa::all();
        
        return view('pessoas.index',['pessoas' => $pessoas]);

        
    }

    public function store(Request $request){
        //metodo que salva uma nova pessoa
        Pessoa::create($request->all());
        $this->geraXML();
        return redirect()->route('pessoas-index');

    }

    public function destroy($id){
        //metodo que exclui o registro de uma pessoa
        Pessoa::where('id', $id)->delete();
        $this->geraXML();
        return redirect()->route('pessoas-index');

    }

    public function geraXML(){

        $retorno = Pessoa::all();
        $res = count($retorno);
       
        if ($res > 0) {

             // Apaga o arquivo se existir
             if (is_file("XML\pessoas.xml")) {
                unlink("XML\pessoas.xml");
            }


            //versao do encoding xml
            $dom = new \DOMDocument("1.0", "utf-8");

            //retirar os espacos em branco
            $dom->preserveWhiteSpace = false;

            //gerar o codigo 
            $dom->formatOutput = true;

            //criando o ná principal (root)
            $root = $dom->createElement("root");

            //ná filho (navios)
            $pessoas = $dom->createElement("pessoas");
        

            for ($x = 0; $x < $res ;$x++) {

                $pessoa = $dom->createElement("pessoa");
               
                $idValue = $dom->createTextNode($retorno[$x]->id);
                $id = $dom->createElement("id");
                $id->appendChild($idValue);

                $nomeValue = $dom->createTextNode($retorno[$x]->nome);
                $nome = $dom->createElement("nome");
                $nome->appendChild($nomeValue);

                $sobrenomeValue = $dom->createTextNode($retorno[$x]->sobrenome);
                $sobrenome = $dom->createElement("sobrenome");
                $sobrenome->appendChild($sobrenomeValue);

                $cpfCnpjValue = $dom->createTextNode($retorno[$x]->cpfCnpj);
                $cpfCnpj = $dom->createElement("cpfCnpj");
                $cpfCnpj->appendChild($cpfCnpjValue);

                $dt_nascValue = $dom->createTextNode($retorno[$x]->dt_nasc);
                $dt_nasc = $dom->createElement("data_nascimento");
                $dt_nasc->appendChild($dt_nascValue);

                $nome_fantasiaValue = $dom->createTextNode($retorno[$x]->nome_fantasia);
                $nome_fantasia = $dom->createElement("nome_fantasia");
                $nome_fantasia->appendChild($nome_fantasiaValue);

                $tipo_pessoaValue = $dom->createTextNode($retorno[$x]->tp_pessoa);
                $tipo_pessoa = $dom->createElement("tipo_pessoa");
                $tipo_pessoa->appendChild($tipo_pessoaValue);
               
                
                $pessoas->appendChild($pessoa);
                $pessoa->appendChild($id);
                $pessoa->appendChild($nome);
                $pessoa->appendChild($sobrenome);
                $pessoa->appendChild($cpfCnpj);
                $pessoa->appendChild($dt_nasc);
                $pessoa->appendChild($nome_fantasia);
                $pessoa->appendChild($tipo_pessoa);

            };

            $root->appendChild($pessoas);
                $dom->appendChild($root);

                //salva arquivo XML no caminho indicado
                $dom->save("XML\pessoas.xml"); 
                
        };
    }
}
