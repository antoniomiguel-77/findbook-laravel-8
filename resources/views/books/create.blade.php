<head>
<link rel="stylesheet" href="/css/bootstrap.min.css">
<link rel="stylesheet" href="/css/style.css">
</head>
<section class="container-fluid col-md-8 ">
    <h1>Cadastrar Livro</h1>
   <form action="/books/dashboard" method="post" enctype="multipart/form-data" class="container">
       @csrf
       <div class="form-group">
           <label for="capa">Capa:</label>
           <input type="file" name="capa" id="capa" class="form-control">
       </div>
       <div class="form-group">
           <label for="livro">Livro:</label>
           <input type="file" name="livro" id="livro" class="form-control">
       </div>
       <div class="form-group">
           <label for="titulo">Titulo:</label>
           <input type="text" name="titulo" placeholder="Titulo do livro" class="form-control">
       </div>
       <div class="form-group">
           <label for="autor">Autor:</label>
           <input type="text" name="autor" id="autor"placeholder="Autor do livro" class="form-control">
       </div>
       <div class="form-group">
           <label for="editora">Editora:</label>
           <input type="text" name="editora" placeholder="Editora" class="form-control">
       </div>
      
       <button type="submit" class="btn btn-success " >Salvar</button>
       
   </form>
</section>
