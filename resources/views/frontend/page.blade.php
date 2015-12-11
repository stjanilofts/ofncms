@extends('frontend.layout')

@section('crumbs')

	@include('frontend._crumbs', ['crumbs'=>crumbs()])

@stop

@section('title', $page->translation('title'))

@section('content')

	<div class="container container--shadow">
		<div class="Page">
			<div class="Page__content">
				{!! cmsContent($page) !!}

				@if(\Request::is('hafa-samband') || \Request::is('ta-kontakt'))
					@include('frontend.forms.contact')
				@endif

				{{-- <hr>

				<div class="fb-like" data-href="{{ \Request::root() }}/{{ \Request::path() }}" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>

				--}}
			</div>
		</div>
	</div>
	
@stop