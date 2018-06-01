@extends('layouts.master')

@section('title')
    <title>SHAPE OF YOU | Stories</title>
@endsection

@section('content')
    <div class="h1_bg">
        <h1>OVERVIEW</h1>
    </div>

    
    @foreach($beforeafterstories as $bas_story)

        <div class="square_box_section">
            <div style="background-image:url({{asset('images/uploads/' . $bas_story->BeforeAfterStoryImageTwo)}});background-size:cover; background-position:center;">

                <a class="box_link"
                   href="{{url('beforeafter/' . $bas_story->id)}}">
                    {{$bas_story->BeforeAfterStoryTitle}}  </a>
            </div>
        </div>
    @endforeach

  

@endsection