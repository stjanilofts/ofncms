@extends('frontend.layout')

@section('crumbs')

	@include('frontend._crumbs', ['crumbs'=>crumbs()])

@stop

@section('title', $title)

@section('content')

	<div class="container container--gutter-top container--shadow">
		<div class="Product">
			<div class="Product__left">
				<div class="Product__images">
					<div class="Product__image">
						<a class="image-popup"
						   title="{{ $item->img()->title() }}"
						   href="/imagecache/original/{{ $item->img()->first() }}">
						   <img alt="{{ $item->img()->title() }}"
						        data-image="{{ $item->img()->first() }}" src="/imagecache/productimage/{{ $item->img()->first() }}" />
						</a>
					</div>

					@if(count($item->img()->all()) > 1)
						<div class="Product__extra-images" style="margin-bottom: 0;">
							@foreach($item->img()->all() as $img)
								<div class="Product__extra-image">
									<img data-image="{{ $img['name'] }}"
										 data-title="{{ isset($img['title']) ? $img['title'] : '' }}"
										 alt="{{ isset($img['title']) ? $img['title'] : '' }}"
										 src="/imagecache/medium/{{ $img['name'] }}" />
								</div>
							@endforeach
						</div>
					@endif
				</div>
			</div>

			<div class="Product__right">
				<div class="Product__content">
					<h1>{{ $item->title }}</h1>
					@if($item->content)
						<h3>Lýsing</h3>
					
						{!! cmsContent($item) !!}
					@endif

					@if($item->tech)
						<h3>Tækniupplýsingar</h3>
						<table class="details">
							@foreach(parseList($item->tech) as $k => $v)
								<tr>
									<td>{{ $k }}</td>
									<td>{{ $v }}</td>
								</tr>
							@endforeach					
						</table>
					@endif

					{{-- <div class="fb-like" data-href="{{ \Request::root() }}/{{ \Request::path() }}" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div> --}}
				</div>
			</div>

			<?php $tabs = []; ?>

			@if($item->tech)
				<?php ob_start(); ?>
					@foreach(parseList2($item->sizes) as $sizes)
						<table class="details">
							<?php $p = 0; ?>
							@foreach(parseList($sizes) as $k => $v)
								<tr>
									@if($p == 0)
										<th>{{ $k }}</th>
										<th>{{ $v }}</th>
									@else
										<td>{{ $k }}</td>
										<td>{{ $v }}</td>
									@endif
								</tr>
								<?php $p++; ?>
							@endforeach
						</table>
					@endforeach
				<?php $tabs['Stærðir'] = ob_get_contents();
				ob_end_clean(); ?>
			@endif

			@if($item->skirt()->exists())
				<?php ob_start(); ?>
					@foreach($item->skirt()->all() as $skirt)
						<div class="Product__mini-image" data-match-height>
							<div>
								<img src="/imagecache/small/{{ $skirt['name'] }}" />
							</div>
							<div>
								<span>{{ $skirt['title'] }}</span>
							</div>
						</div>
					@endforeach
				<?php $tabs['Klæðning'] = ob_get_contents();
				ob_end_clean(); ?>
			@endif

			@if($item->shell()->exists())
				<?php ob_start(); ?>
					@foreach($item->shell()->all() as $k => $shell)
						<div class="Product__mini-image" data-match-height>
							<div>
								<img src="/imagecache/small/{{ $shell['name'] }}" />
							</div>
							<div>
								<span>{{ $shell['title'] }}</span>
							</div>
						</div>
					@endforeach
				<?php $tabs['Skel'] = ob_get_contents();
				ob_end_clean(); ?>
			@endif

			@if($item->file()->exists())
				<?php ob_start(); ?>
					@foreach($item->file()->all() as $file)
						<a class="takki smaller" href="/files/{{ $file['name'] }}"><i class="fa fa-file-o"></i> {{ $file['title'] ?: $item['title'] }}</a>
					@endforeach
				<?php $tabs['Upplýsingar'] = ob_get_contents();
				ob_end_clean(); ?>
			@endif

			<div class="Product__details">
				@if($tabs)
					<section>
						<div class="Tabs">
							<div class="Tabs__buttons">
								<ul>
									<?php $c = 0; ?>
									@foreach($tabs as $k => $v)
										<li class="{{ $c == 0 ? 'active' : '' }}" data-tab="{{ str_slug($k) }}"><h3>{!! $k !!}</h3></li>
										<?php $c++; ?>
									@endforeach
								</ul>
							</div>
							<div class="Tabs__contents">
								<ul>
									@foreach($tabs as $k => $v)
										<li data-tab="{{ str_slug($k) }}">{!! $v !!}</li>
									@endforeach
								</ul>
							</div>
						</div>
					</section>
					<script>
					$(document).ready(function() {
						$.each($('.Tabs__buttons li'), function(i, v) {
							$(v).click(function() {
								$('.Tabs__buttons li').removeClass('active');
								$('.Tabs__contents li').hide();

								$(this).addClass('active');
								$('.Tabs__contents li[data-tab=' + $(this).attr('data-tab') + ']').show();
							})
						});
					});
					</script>
				@endif
			</div>
		</div>
	</div>

	{{-- @if($item->modelName() != 'Category')
		@include('frontend._products', ['items'=>$item->getSiblings(), 'path_cut'=>$item->slug])
	@endif --}}

	<script>
	$('.Product__extra-image img').click(function() {
		var $cur = $(this);
		//console.log($(this).attr('data-image'));
		$('.Product__image img')
			.attr('alt', $cur.attr('data-title'))
			.attr('src', '/imagecache/large/' + $cur.attr('data-image'));
		$('.Product__image a')
			.attr('title', $cur.attr('data-title'))
			.attr('href', '/imagecache/original/' + $cur.attr('data-image'));
	});
	$('.Product__extra-images').slick({
		dots: false,
		infinite: false,
		speed: 300,
		slidesToShow: 4,
		slidesToScroll: 4,
		arrows: false,
		responsive: [
			{
				breakpoint: 1400,
				settings: {
					slidesToShow: 4,
					slidesToScroll: 4
				}
			},
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 3
				}
			},
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 3
				}
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2
				}
			}
		]
	});
	</script>
@stop