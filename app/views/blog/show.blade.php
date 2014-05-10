@extends('layouts.generic')

@section('css')
@parent
	<link rel="stylesheet" type="text/css" media="screen" href="css/blog.css" />
@stop

@section('content')
	@include('blog.entry', array('entry' => $entry))
@stop