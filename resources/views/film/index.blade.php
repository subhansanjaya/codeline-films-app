@extends('layouts.app')

@section('title', '| Films')

@section('content')

    <div class="content">
    <!-- display movie -->
    <?php

    $data = $films->getData();

    $links = $data->links;

    foreach($data->data as $da) {

    $id = $da->id;
    $slug = $da->slug;
    $name = $da->name;
    $description = $da->description;
    $photo = $da->photo;

    }
    ?>
     <h2><a href="{{ route('films.show', $slug) }}">{{$name}}</a></h2>

     <p>{{$description}}</p>

     <img src="{{ url('storage/storage/uploads/'.$photo) }}" alt="photo" title="photo" />

     <br />
     <?php if(!empty($links->prev)) { ?>
     <a href="<?php echo $links->prev; ?>">Prev</a> | <?php } ?>  <a href="<?php echo $links->next; ?>">Next</a>

    </div><!-- /.content -->

@endsection
