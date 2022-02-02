<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Book;
use App\Models\User;

class bookController extends Controller
{
    /**Metodo que lista todos os livros e permite fazer  a pesquisa deles */
    public function index(){
        $search = request('search');

            if($search){
                 
                    $books = Book::where([
                        ['titulo','like','%'.$search.'%']
                       
                    ])->get();
            }else{
                $books = Book::all();
            }
        
         

        return view('/welcome',['books'=>$books,'search'=>$search]);
    }
    /**Metodo que retorna a view de cadastro para o administrador */
    public function create(){

        return (auth()->user()->nivel == 1)? view('/books.create') : redirect('/');
    }
    /**Metodo para realizar cadastro de livros */
    public function store(Request $request){
            $book = new Book();
            if(($request->hasFile('capa') && $request->hasFile('livro')) && ($request->file('capa')->isValid() && $request->file('livro')->isValid())){

                $requestCapa = $request->capa;
                $requestLivro = $request->livro;
                $extensionCapa = $requestCapa->extension();
                $extensionLivro = $requestLivro->extension();
                $capaName = md5($requestCapa->getClientOriginalName().strtotime('now')).'.'.$extensionCapa;
                $livroName = md5($requestLivro->getClientOriginalName().strtotime('now')).'.'.$extensionLivro;
                $requestCapa->move(public_path('/img/capa/'),$capaName);
                $requestLivro->move(public_path('/book'),$livroName);
                $book->capa = $capaName;
                $book->livro = $livroName;
            }
            $book->titulo = $request->titulo;
            $book->autor = $request->autor;
            $book->editora = $request->editora;

            $book->save();

      return  redirect('/books/dashboard')->with('msg','Livro cadastrado com sucesso');

    }

     /**Metodo para deletar registro*/
     public function destroy($id){

        Book::FindOrFail($id)->delete();
    
        return redirect('/books/dashboard')->with('msg','Livro deletado com sucesso');
        
    }
      /**Metode de update de registros */
      public function update(Request $request){

        $data = $request->all();

        if(($request->hasFile('capa') && $request->hasFile('livro')) && ($request->file('capa')->isValid() && $request->file('livro')->isValid())){

            $requestCapa = $request->capa;
            $requestLivro = $request->livro;
            $extensionCapa = $requestCapa->extension();
            $extensionLivro = $requestLivro->extension();
            $capaName = md5($requestCapa->getClientOriginalName().strtotime('now')).'.'.$extensionCapa;
            $livroName = md5($requestLivro->getClientOriginalName().strtotime('now')).'.'.$extensionLivro;
            $requestCapa->move(public_path('/img/capa/'),$capaName);
            $requestLivro->move(public_path('/book'),$livroName);
            $data['capa'] = $capaName;
            $data['livro'] = $livroName;
        }
             
        Book::FindOrFail($request->id)->update($data);

        return redirect('/books/dashboard')->with('msg','Livro actualizado com sucesso');

      }

    /**Metodo da dashboard do admistrador */
    public function dashboard(){

        $books = book::all();
        return (auth()->user()->nivel == 1)? view('/books/dashboard',['books'=>$books]):redirect('/');
    }

    /**Metodo que retorna a view de edicao de  registros */
    public function edit($id){
        $book = Book::FindOrFail($id);

        return view('/books/edit',['book'=>$book]);
}

  
    /**Metodo para realizar o dowload */
    public function read($id){
             $book = Book::FindOrFail($id);

            return view('/books.read',['book'=>$book]);
        
}

     
}
