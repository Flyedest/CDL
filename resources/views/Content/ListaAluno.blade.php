@extends('Layout.principal') @section('title') Lista de Alunos @endsection 
@section('back')
<a href="/lista/menu">
    Voltar
</a>
@endsection
@section('content')


<div class="poscentralized">

    <fieldset class="">
        <form class="form-group optionsMenu" method="get" action="/lista/Aluno">
            <div class="OptionArea">
                <label for="iPesquisa">Pesquisar aluno:</label>
            </div>
            <div class="OptionArea">
                <input id="iPesquisa" type=search class="form-control " value="{{old('nome')}}" placeholder="Digite o nome do aluno aqui" name="Pesquisa" />
            </div>
            <div class="OptionArea">
                <label for="iSelect">Organizar por:</label>
            </div>
            <div class="OptionArea">
                <select class="form-control" name="organizar" id="iSelect">
                <option value="IdAluno">Id</option>
                <option value="nome">Nome</option>
                <option value="CPF">CPF</option>
                <option value ="StatusAluno">Status do aluno</option>
                </select>
            </div>
            <div class="OptionArea">
                <input type="submit" class="btn btn-success" value="Organizar" />
            </div>
        </form>
    </fieldset>
</div>

<div class="poscentralized">

    <div class="">

        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Aluno</th>
                <th>Data de Nascimento</th>
                <th>CPF</th>
                <th>Status</th>
                <th>Opções</th>
            </tr>

            @foreach($aluno as $a)
            @if($a->StatusAluno == 2)
            <tr class = "danger">
            @else
            @if($a->StatusAluno == 1)
                <tr class = "info">
            @else
                <tr class = "success">
            @endif
            @endif
                <td>{{$a -> IdAluno}}</td>
                <td>{{$a -> nome}}</td>
                <td>{{$a -> datnasc}}</td>
                <td>{{$a -> CPF}}</td>
                    @if($a -> StatusAluno == 2)
                    <td>Bloqueado</td>
                    @else @if($a ->StatusAluno == 1)
                    <td>Com livro</td>
                    @else @if($a ->StatusAluno == 0)
                    <td>Livre</td>
                    @endif
                    @endif
                    @endif
                    
                <td>
                    @if(Auth::user()->is_admin == 1)
                    <a href="{{action('AlunoController@removeAluno',$a->IdAluno)}}"><div class="btn btn-danger">
                        <i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Remover</div>
                </a>&nbsp;@endif
                    <a href="{{action('AlunoController@detailAluno',$a->IdAluno)}}"><div class="btn btn-primary">
                    <i class="fa fa-info" aria-hidden="true"></i>&nbsp;Detalhes</div>
                    </a>
                </td>
            </tr>
            @endforeach

        </table>
    </div>

</div>
@if($trigger == 0)
<div class="poscentralized">
    <div class="alert alert-danger">Não foi possível achar o aluno</div>
</div>
@else @if(count($aluno)>1)
<div class="poscentralized">
    <div class="alert alert-success">{{count($aluno)}} Alunos encontrados</div>
</div>
@else
<div class="poscentralized">
    <div class="alert alert-success">{{count($aluno)}} Aluno encontrado</div>
</div>
@endif @endif @stop
