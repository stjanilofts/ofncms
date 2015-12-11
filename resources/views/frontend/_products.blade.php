<div class="container container--gutter-top">

	@foreach($items as $item)

		@include('frontend._card', ['item'=>$item, 'path'=>'/'.\Request::path().'/'.$item->slug])

	@endforeach

</div>