@extends('main')

@section('titile', '| Stworz nowy wpis')

@section('stylesheets')

    {!! Html::style('css/parsley.css') !!}
    
@endsection

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1>Stwórz nowy wpis</h1>
        <hr>
        {!! Form::open(['route' => 'posts.store', 'data-parsley-validate' => '']) !!}
            {{ Form::label('title', 'Tytuł:') }}
            {{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'max-lenght' => '255')) }}
            
            {{ Form::label('slug', 'Skrót:') }}
	    {{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255') ) }}
            
            {{ Form::label('category_id', 'Kategoria:') }}
            <select class="form-control" name="category_id">
                @foreach($categories as $category)
                <option value='{{ $category->id }}'>{{ $category->name }}</option>
                @endforeach
                
                               
            </select>
            
            {{ Form::label('body', "Wpis:") }}
            {{ Form::textarea('body', null, array('class' => 'form-control', 'required' => '')) }}
            
            {{ Form::submit('Stwórz wpis', array('class' => 'btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
        {!! Form::close() !!}
    </div>
</div>

@endsection

@section('scripts')

    {!! Html::script('js/parsley.min.js') !!}

@endsection