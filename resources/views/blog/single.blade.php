@extends('main')
<?php $titleTag = htmlspecialchars($post->title); ?>
@section('title', "| $titleTag")

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>{{ $post->title }}</h1>
			<p>{{ $post->body }}</p>
                        <hr>
                        <p><b>Przydzielono do kateogrii:</b> {{ $post->category->name }}</p>
                        <hr>
		</div>
	</div>
           
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			@foreach($post->comments as $comment)
				<div class="comment">
					<p><strong>Imię:</strong> {{ $comment->name }}</p>
					<p><strong>Komentarz:</strong><br/>{{ $comment->comment }}</p><br>
                                        <hr>
				</div>
			@endforeach
		</div>
	</div>

	<div class="row">
		<div id="comment-form" class="col-md-8 col-md-offset-2" style="margin-top: 50px;">
			{{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) }}
				
				<div class="row">
					<div class="col-md-6">
						{{ Form::label('name', "Imię:") }}
						{{ Form::text('name', null, ['class' => 'form-control']) }}
					</div>

					<div class="col-md-6">
						{{ Form::label('email', 'Email:') }}
						{{ Form::text('email', null, ['class' => 'form-control']) }}
					</div>

					<div class="col-md-12">
						{{ Form::label('comment', "Komentarz:") }}
						{{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5']) }}

						{{ Form::submit('Dodaj komentarz', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top:15px;']) }}
					</div>
				</div>

			{{ Form::close() }}
		</div>
	</div>

@endsection