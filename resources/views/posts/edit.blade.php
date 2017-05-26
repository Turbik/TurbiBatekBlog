@extends ('main')

@section('title', '| Edytuj wpis')

@section('content')

<div class="row">
    {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) !!}
    <div class="col-md-8">
        {{ Form::label('title', 'Tytuł:') }}
        {{ Form::text('title', null, ["class" => 'form-control input-lg']) }}
        
        {{ Form::label('slug', 'Skrót:') }}
        {{ Form::text('slug', null, ['class' => 'form-control']) }}
        
        {{ Form::label('category_id', "Kategoria", ['class' => 'form-spacing-top']) }}
        {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
        
        {{ Form::label('body', 'Treść:', ['class' => 'form-spacing-top']) }}
        {{ Form::textarea('body',null, ['class' => 'form-control']) }}
    </div>

    <div class="col-md-4">
        <div class="well">
            <dl class="dl-horizontal">
                <dt>Utworzono:</dt>
                <dd>{{ date('m-j-Y H:i', strtotime($post->created_at)) }}</dd>
            </dl>
            
            <dl class="dl-horizontal">
                <dt>Ostatnio edytowane:</dt>
                <dd>{{ date('m-j-Y H:i', strtotime($post->updated_at)) }}</dd>
            </dl>
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    {!! Html::linkRoute('posts.show', 'Anuluj', array($post->id), array('class'=> 'btn btn-danger btn-block')) !!}

                </div>
                <div class="col-sm-6">
                    {{ Form::submit('Zapisz zmiany', ['class' => 'btn btn-success btn-block']) }}
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>    

@endsection