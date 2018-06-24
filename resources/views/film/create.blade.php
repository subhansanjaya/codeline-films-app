@extends('layouts.app')

@section('title', '| Create Film')

@section('stylesheets')

    {!! Html::style('css/starrr.css') !!}

	{!! Html::style('css/parsley.css') !!}
	{!! Html::style('css/select2.min.css') !!}

    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'link code',
            menubar: false
        });
    </script>

@endsection

@section('content')
<div class="flex-center position-ref full-height">
<div class="content">
<div class="row">
<div class="col-md-12 ">
    <h1>Create New Film</h1>
    <hr />

    {!! Form::open(array('route' => 'film.create', 'data-parsley-validate' => '',  'files' => true)) !!}

    {{ csrf_field() }}

	{{ Form::label('name', 'Title:') }}
	{{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

    <br />

    {{Form::label('description', "Description")}}
    {{Form::textarea('description', null, array('class' => 'form-control', 'required' => ''))}}

    <br />

    {{Form::label('release_date', 'Release Date:')}}
    {{Form::text('release_date', null, array('class' => 'form-control', 'id'=>'release_date', 'required' => ''))}}

     <br />

    {!! Form::label('rating', "Rating:", ['class'=>'control-label col-md-2']) !!}
    <div class="starrr"></div>
    {!! Form::hidden('rating', null, ['class'=>'form-control']) !!}

    <br />

    {{ Form::label('country', 'Countries:') }}
    <select class="form-control select2-multi" name="country" required>
        @foreach($countries as $country)
            <option value='{{ $country->id }}'>{{ $country->name }}</option>
        @endforeach

    </select>

    <br />

    {{Form::label('ticket_price', 'Ticket Price:')}}
    {{Form::text('ticket_price', null, array('class' => 'form-control', 'data-parsley-type' => 'number', 'required' => '', 'maxlength' => '255'))}}

    <br />

    {{ Form::label('photo', 'Upload a photo') }}
    {{ Form::file('photo') }}

    <br />

    {{ Form::label('genres', 'Genres:') }}
	<select class="form-control select2-multi" name="genres[]" multiple="multiple" required>
		@foreach($genres as $genre)
			<option value='{{ $genre->id }}'>{{ $genre->name }}</option>
		@endforeach

	</select>

    {{Form::submit('Create Film', array('class' => 'btn btn-success btn-lg btn-black', 'style' => 'margin-top:20px;'))}}

    {!! Form::close() !!}

</div> <!-- /.col-md-12  -->

</div><!-- /.content -->

</div>
</div><!-- /.flex-center -->
@endsection


@section('scripts')

	{!! Html::script('js/parsley.min.js') !!}
	{!! Html::script('js/select2.min.js') !!}
    {!! Html::script('js/starrr.js') !!}

	<script type="text/javascript">
		$('.select2-multi').select2();


        $(function(){
            $( "#release_date" ).datepicker();

            $('.starrr').starrr({
              change: function(e, value){
              $('input[name="rating"]').val(value)
              }
            })
        });
	</script>

@endsection