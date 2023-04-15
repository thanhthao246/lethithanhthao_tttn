@if (count($list_category) > 0)
    <div>
        <h2>Danh mục</h2>
        <div class="panel-group category-products" id="accordian">
            <!--category-productsr-->
            @foreach ($list_category as $category)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a
                                href="{{ route('slug.home', ['slug' => $category->slug]) }}">{{ $category->name }}</a></h4>
                    </div>
                </div>
            @endforeach
        </div>
        <!--/category-products-->
    </div>
@endif
