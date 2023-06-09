@if (Session::has('Cart') != null)
    <div class="select-items">
        <table>
            <tbody>
                @foreach (Session::get('Cart')->products as $item)
                    @php
                        $product_image = $item['img'];
                        $hinh = null;
                        if (count($product_image) > 0) {
                            $hinh = $product_image[0]['image'];
                        }
                        
                    @endphp
                    <tr>
                        {{-- <td class="si-pic"><img src="{{ asset('images/product/') }}" alt="">
                        </td> --}}
                        <td class="si-pic"><img src="{{ asset('images/product/' . $hinh) }}" alt="{{ $hinh }}">
                        </td>
                        <td class="si-text">
                            <div class="product-selected">
                                <p>{{ number_format($item['productinfo']->price_buy) }} đ x {{ $item['qty'] }}</p>
                                <h6>{{ $item['productinfo']->name }}</h6>
                            </div>
                        </td>
                        <td class="si-close">
                            <i class="glyphicon glyphicon-remove" data-id="{{ $item['productinfo']->id }}"></i>
                            {{-- <i class="ti-close" data-id="{{ $item['productinfo']->id }}"></i> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="select-total">
        <span>Giá: </span>
        <h5>{{ number_format(Session::get('Cart')->totalPrice_buy) }} đ</h5>
        <input hidden id="total-quanty-cart" type="number" value="{{ Session::get('Cart')->totalQuanty }}">
    </div>
@endif
