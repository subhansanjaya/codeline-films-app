@extends('layouts.app')

@section('title', '| Films')

@section('stylesheets')

{!! Html::style('css/starrr.css') !!}

@endsection

@section('content')
<div class="flex-center position-ref full-height">
        <div class="content">

<?php
$film_data = $films->getData();
foreach($film_data as $data) {

    $id = $data->id;
    $name = $data->name;
    $description = $data->description;
    $country = $data->country;
    $release_date = $data->release_date;
    $photo = $data->photo;
    $comments = $data->comments;
    $rating = $data->rating;
}
?>

<h2>{{$name}}    <div class="starrr"  value="{{$rating}}"></div></h2>
<small>Country: {{$country}} </small>
<small>Release Date: {{$release_date}}</small>

<p>{{$description}}</p>

<img src="{{ url('storage/storage/uploads/'.$photo) }}" alt="photo" title="photo" />

 

<div id="comments" class="col-md-12">
    <strong>Comments:</strong><br />
    @foreach ($comments as $comment)
    {{ $comment->name }} -
        <small>{{ $comment->comment }}</small>
    <hr />
    @endforeach
</div><!-- /.comments -->
  
 @guest
Please <a href="{{ route('login') }}">login</a> to post a comment
                           
@else       

    <div class="row">
           
        <div class="col-sm-6 col-md-12">
        {!! Form::open(array('route' => 'comment.store', 'data-parsley-validate' => '')) !!}
      
        {!! Form::hidden('user_id', Auth::user()->id , ['class'=>'form-control']) !!}
        
        {{ Form::label('name', 'Name:') }}
        {{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

        {!! Form::hidden('film_id', $id , ['class'=>'form-control']) !!}
        {{Form::label('comment', "Comment")}}
        {{Form::textarea('comment', null, array('class' => 'form-control', 'required' => ''))}}
        {{Form::submit('Submit', array('class' => 'btn btn-success btn-lg btn-black', 'style' => 'margin-top:20px;'))}}
        {!! Form::close() !!}
        </div>

    </div><!-- / .row -->

@endguest

    </div><!-- /.content -->
</div><!-- /.container -->
@endsection

@section('scripts')

    {!! Html::script('js/starrr.js') !!}

    <script type="text/javascript">
        // start rating
        $('.starrr').starrr({
        rating: <?php echo $rating; ?>,
        disabled: 'readonly'
        })


    </script>

@endsection