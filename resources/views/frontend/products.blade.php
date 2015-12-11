@extends('frontend.layout')

@section('crumbs')

	@include('frontend._crumbs', ['crumbs'=>crumbs()])

@stop

@section('title', $title)

@section('content')

	@include('frontend._products', ['items'=>$items])

@stop