@if(isset($item))
	<div class="Box Box--{{ isset($pure) && $pure ? 'pure' : '' }} Box--{{ isset($align) ? $align : 'default' }}" data-match-height="Box">
	    <div class="Box__content">
	    	@if(isset($pure) && $pure)
	    		{!! $item->content !!}
	    	@else
	    		<i class="fa {{ isset($icon) ? $icon : '' }}"></i>
	    		<h3>{{ $item->title }}</h3>	    	
        		{!! cmsContent($item) !!}
        	@endif
    	</div>
	</div>
@endif