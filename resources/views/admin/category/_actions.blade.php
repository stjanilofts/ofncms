@if(isset($item))
	<a title="Vörur" href="/admin/{{ strtolower($item->modelName()) }}/{{ $item->id }}/subs" class="uk-button uk-button-primary uk-button-mini uk-margin-small-right">
		<i class="uk-icon-list-ol"></i> {{ $item->products->count() }}
	</a>
@endif