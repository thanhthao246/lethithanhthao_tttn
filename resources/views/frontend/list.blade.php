<div class="row">
    <div class="col-lg-12">
        <div class="cart-table">
            <table class="table table-bordered" id="myTable">
                <thead>
                    <tr>
                        <th class="text-center">Hình</th>
                        <th class="text-center">Tên sản phẩm</th>
                        <th class="text-center">Giá bán</th>
                        <th class="text-center" style="width:100px;">Số lượng</th>
                        <th class="text-center">Tổng giá</th>
                        <th class="text-center">Lưu</th>
                        <th class="text-center">Xóa</th>

                    </tr>
                </thead>
                <tbody>
                    @if (Session::has('Cart') != null)
                        @foreach (Session::get('Cart')->products as $item)
                            <tr>
                                <td style: width="150px">
                                    @php
                                        $product_image = $item['img'];
                                        $hinh = null;
                                        if (count($product_image) > 0) {
                                            $hinh = $product_image[0]['image'];
                                        }
                                    @endphp
                                <td class="si-pic" style: width="100px"><img
                                        src="{{ asset('images/product/' . $hinh) }}" alt="{{ $hinh }}">
                                </td>
                                </td>
                                <td class="">{{ $item['productinfo']->name }}</td>
                                <td class="text-center"> {{ number_format($item['productinfo']->price_buy) }}
                                </td>
                                <td class="text-center">
                                    <input id="quanty-item-{{ $item['productinfo']->id }}" aria-label="quantity" class="input-qty " max="10" min="1" name="" type="number" value="1" value="{{ $item['qty'] }} ">

                                    <input id="quanty-item-{{ $item['productinfo']->id }}"
                                        class="form-control text-center" type="text" value="{{ $item['qty'] }} ">
                                </td>
                                <td class="text-center">{{ number_format($item['price_buy']) }} đ</td>
                                <td class="text-center"><a><i class="fas fa-save"
                                            onclick="SaveListCart({{ $item['productinfo']->id }});"></i></a>
                                </td>
                                <td class="text-center"><a><i class="fas fa-trash"
                                            onclick="DeleteListCart({{ $item['productinfo']->id }});"> </i> </a>
                                </td>
                        @endforeach
                    @endif
                </tbody>
            </table>
            <div class="col-md-3">
                <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th class="">Tổng số lượng</th>
                            <td class="text-center">{{ Session::get('Cart')->totalQuanty }}</td>
                        </tr>
                        <tr>
                            <th class="">Tổng tiền</th>
                            <td class="text-center">
                                {{ number_format(Session::get('Cart')->totalPrice_buy, 0) }}</td>
                        </tr>
                        <tr>
                            <td class=" ">Thanh toán</td>
                            <td class="text-center"></td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

