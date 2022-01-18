@extends('layout.main')
@section('title','Home')
@section('content')

@if($search)
<h1 id="info-search">Buscando: {{$search}}</h1>
@endif

 <section>

 @foreach($books as $book)
 
 

     <article >
         <figure class="cards">
             <img src="/img/capa/{{$book->capa}}" alt="{{$book->titulo}}" class="img-fluid">
             <figcaption>
                 <div class="info">
                 <p>Titulo: {{ $book->titulo}}</p>       
                 <p>Autor: {{ $book->autor}}</p>       
                 <p>Editora: {{ $book->editora}}</p> 
                 </div>
                 @auth
                 
                   <div class="bottons">
                     <a href="/books/read/{{$book->id}}" class="btn-1">Lêr</a>
                     <a href="/book/{{$book->livro}} "download="{{$book->titulo}} " type="application/pdf" class="btn-2">Baixar</a>
                    </div> 
                

                 @endauth
                 
             </figcaption>
         </figure>
     </article>
  
  @endforeach

  @if(count($books) == 0)
   
     <h2 id="info-search-none">Nenhum livro encontrado...<a href="/">Vêr todos</a></h2>
  @endif
 

 </section>
 
 
@endsection
