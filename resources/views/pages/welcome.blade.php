 @extends('main')   
 
@section('title', '| Główna')

@section('content')
          <div class="row">
              <div class="col-md-12">
                  <div class="jumbotron">
                    <h1>Witamy na Naszym Blogu!</h1>
                    <p class="lead">Dzięki wielkie za oglądanie Naszego Bloga.Zachęcamy do czytania najpopularniejszych wpisów</p>
                    <p><a class="btn btn-primary btn-lg" href="#" role="button">Najpopularniejszy wpis</a></p>
                  </div>
              </div>
          </div> 
          
          <div class="row">
              <div class="col-md-8">
                  
                  @foreach($posts as $post)
                  
                  <div class="post">
                      <h3>{{ $post->title }}</h3>
                      <p>{{ substr($post->body, 0, 300) }}{{ strlen($post->body) > 300 ? "..." : "" }}</p>           
                      <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary">Czytaj więcej</a>
                  </div> 
                  
                  <hr>
                          
                  @endforeach
                  
              </div>            
              <div class="col-md-4 col-md-offset-2"></div>
              <h2>Pasek boczny</h2>
          </div>
     @endsection
     
