<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>Case Tecnico</title>
</head>
<body>
    
    <div class="container">       
        <div class="d-flex justify-content-center mt-5">
                <h1>Cadastro de Pessoas</h1>
            </div>

            <div class="d-flex justify-content-center mt-5">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tp_pessoa" id="tp_pessoa-f" value="F" checked>
                                <label class="form-check-label" for="flexRadioDefault1">
                                Pessoa Física &nbsp;&nbsp;
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tp_pessoa" id="tp_pessoa-j" value="J">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Pessoa Jurídica
                                </label>
                            </div>   
                    </div>

                <form action="{{ route('pessoas-store') }}" id="formF" method="POST">   
                   @csrf
                    <div class="row g-3 mt-3">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Nome" id="nome" name="nome" aria-label="Nome">
                            <input type="hidden" id='tp_pessoa' name="tp_pessoa">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Sobrenome"  id="sobrenome" name="sobrenome" aria-label="Sobrenome">
                        </div>
                    </div>
                    <div class="row g-3 mt-3">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="CPF"  id="cpfCnpj" name="cpfCnpj" aria-label="CPF">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Data de Nascimento" id="dt_nasc" name="dt_nasc" aria-label="Last name">
                        </div>
                    </div>
                    <button id="btn-forF" class="btn btn-outline-primary mt-3">Salvar</button>
                </form> 

                <form action="{{ route('pessoas-store') }}" id="formJ" method="POST">   
                   @csrf
                   <div class="row g-3 mt-3">
                       <div class="col">
                           <input type="text" class="form-control" placeholder="Nome" id="nome" name="nome" aria-label="Nome">
                           <input type="hidden" id='tp_pessoaJ' name="tp_pessoa">
                       </div>
                       <div class="col">
                           <input type="text" class="form-control" placeholder="Nome Fantasia"  id="nome_fantasia" name="nome_fantasia" aria-label="Nome Fantasia">
                       </div>
                   </div>
                   <div class="row g-3 mt-3">
                       <div class="col">
                           <input type="text" class="form-control" placeholder="CNPJ"  id="cpfCnpj" name="cpfCnpj" aria-label="cnpj">
                       </div>
                       <div class="col">
                           
                       </div>
                   </div>
                   <button type="submit" class="btn btn-outline-primary mt-3" id="">Salvar</button>
               </form> 

               <hr>

               <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">id</th>
                        <th scope="col">nome</th>
                        <th scope="col">CPF/CNPJ</th>
                        <th scope="col">Tipo de pessoa</th>
                        <th scope="col">...</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pessoas as $pessoa)
                        <tr>
                        <th>{{$pessoa->id}}</th>
                        <td>{{$pessoa->nome}}</td>
                        <td>{{$pessoa->cpfCnpj}}</td>
                        <td>{{$pessoa->tp_pessoa}}</td>
                        <th>
                            <form action="{{ route('pessoas-destroy', ['id' => $pessoa->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-outline-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg>
                                </button>
                            </form>
                        </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                
     </div>   
     

         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script>
            $('#formJ').css('display', 'none')
            $('#tp_pessoa').val('Física')

            $('#tp_pessoa-f').click(() => {
                $('#formJ').css('display', 'none')
                $('#formF').css('display', 'block')
                $('#tp_pessoa').val('Física')
            })

            $('#tp_pessoa-j').click(() => {
                $('#formJ').css('display', 'block')
                $('#formF').css('display', 'none')
                $('#tp_pessoaJ').val('Jurídica')
            })
        </script>
</html>