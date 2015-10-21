@extends('eagle.layouts.master')

@section('content')
<div class="container page-container">

<div class="progress">
  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
</div>


    <div class="step well">@include('eagle.steps.1-name-and-deps')</div>
    <div class="step well">Step 2</div>
    <div class="step well">Step 3</div>
    <div class="step well">Step 4</div>
    <div class="step well">Step 5</div>
    <div class="step well">Step 6</div>
    <button class="action back btn btn-info">Back</button>
    <button class="action next btn btn-info">Next</button>
    <button class="action submit btn btn-success">Submit</button>
</div>


@stop