@extends('layouts.generic')

@section('content')
	@include('blog.entry', array('entry' => $entry))
@stop