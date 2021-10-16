@php

$product_tag_en = App\Models\Product::groupBy('product_tag_en')
    ->select('product_tag_en')
    ->get();
$product_tag_ban = App\Models\Product::groupBy('product_tag_ban')
    ->select('product_tag_ban')
    ->get();

@endphp


<div class="sidebar-widget product-tag wow fadeInUp">
    <h3 class="section-title">{{ session()->get('language') == 'bangla' ? 'পণ্যের ট্যাগ' : 'Product tags' }}</h3>
    <div class="sidebar-widget-body outer-top-xs">

        <div class="tag-list">
            @if(session()->get('language')=='bangla')
            @foreach ($product_tag_ban as $tag)
            <a class="item active"  title="Phone" href="{{ route('tagwise.product.view',$tag->product_tag_ban) }}">{{ str_replace(',','',$tag->product_tag_ban) }}</a>
    
            @endforeach
            @else
            @foreach ($product_tag_en as $tag)
            <a class="item active" title="Phone" href="{{ route('tagwise.product.view',$tag->product_tag_en) }}">{{ str_replace(',','',$tag->product_tag_en)  }}</a>
    
            @endforeach

            @endif
            
    
        </div>
        <!-- /.tag-list -->
    </div>
    <!-- /.sidebar-widget-body -->
</div>
