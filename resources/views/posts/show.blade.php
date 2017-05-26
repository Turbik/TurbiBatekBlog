@extends('main')

@section('title', '| Zobacz wpis')

@section('content')
    
<div class="row">
    <div class="col-md-8">
    <h1>{{ $post->title }}</h1>

    <p class="lead">{{ $post->body }}</p>
    </div>

    <div class="col-md-4">
        <div class="well">
            <dl class="dl-horizontal">
                <label>Url:</label>
                <p><a href="{{ route('blog.single', $post->slug) }}">{{ route('blog.single', $post->slug) }}</a></p>
            </dl>
            <dl class="dl-horizontal">
					<label>Kategoria:</label>
					<p>{{ $post->category->name }}</p>
				</dl>
            <dl class="dl-horizontal">
                <label>Utworzono:</label>
                <p>{{ date('m-j-Y H:i', strtotime($post->created_at)) }}</p>
            </dl>
            
            <dl class="dl-horizontal">
                <label>Ostatnio edytowane:</label>
                <p>{{ date('m-j-Y H:i', strtotime($post->updated_at)) }}</p>
            </dl>
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    {!! Html::linkRoute('posts.edit', 'Edytuj', array($post->id), array('class'=> 'btn btn-primary btn-block')) !!}

                </div>
                <div class="col-sm-6">
                    {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
                    
                    {!! Form::submit('Usuń', ['class' => 'btn btn-danger btn-block']) !!}
                    
                    {!! Form::close() !!}
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    {{ Html::linkRoute('posts.index', '<<Zobacz wszystkie wpisy', [], ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection