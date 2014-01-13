@extends('layouts.generic')

@section('content')
	<?php foreach ($entries as $entry): ?>
		@include('blog.entry', array('entry' => $entry))
	<?php endforeach; ?>
@stop