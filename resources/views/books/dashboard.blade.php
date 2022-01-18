 <head>
     <link rel="stylesheet" href="/css/bootstrap.min.css">
     <link rel="stylesheet" href="/css/style.css">
 </head>
<section class="secao-adm">
<nav class="menu-adm container-fluid">

    
     <img src="/img/logo-white.svg" alt="" id="logo-dashboard"> 

    <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/books/create">Cadastrar Livro</a></li>
        <li>
            <form action="/logout" method="POST">
                @csrf
            <a href="/logout" onclick="event.preventDefault();this.closest('form').submit();">Sair</a>
            </form>
        </li>

    </ul>
</nav>
<div class="msg">
    
        @if(session('msg'))

            <p>{{session('msg')}}</p>
        @endif
    
</div>
<h4 class="container">Livros disponíveis</h4>
 
<table class="table table-striped table-hover container table-book table-responsive">
    <thead>
        <th>Capa</th>
        <th>Titulo</th>  
        <th>Autor</th>
        <th>Editora</th>
        <th>Editar</th>
        <th>Deletar</th>
   </thead>
    <tbody>
        @foreach($books as $book)
        <tr>
            <td><img src="/img/capa/{{$book->capa}}" alt="{{$book->titulo}}"></td>
            <td>{{$book->titulo}}</td>
            <td>{{$book->autor}}</td>
            <td>{{$book->editora}}</td>
            <td><a href="/books/edit/{{$book->id}}" class="btn btn-warning">Editar</a></td>
            <td>
                <form action="/books/{{$book->id}}" method="POST" id="deletar">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </form>
            </td>
            
        </tr>
        @endforeach
    </tbody>
</table>
</section>
 