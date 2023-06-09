@extends('layouts.site')
@section('title', 'giỏ hàng')
@section('header')
    <script src="{{ asset('public/js/main.js') }}"></script>
@endsection
@section('content')

    <div class="container">
        <h3 class="text-center">Giỏ hàng</h3>
        <div id="list-cart">
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
                                    <a class="si-pic"><img
                                            src="{{ asset('images/product/' . $hinh) }}"alt="{{ $hinh }}"></a>

                                </td>
                                <td class="text-center">{{ $item['productinfo']->name }}</td>
                                <td class="text-center"> {{ number_format($item['productinfo']->price_buy) }}</td>
                                <td class="text-center">
                                    <input id="quanty-item-{{ $item['productinfo']->id }}" class="form-control text-center"
                                        type="text" value="{{ $item['qty'] }} ">
                                </td>
                                <td class="text-center">{{ number_format($item['price_buy']) }} đ</td>
                                <td class="text-center"><a><i class="glyphicon glyphicon-check"
                                            onclick="SaveListCart({{ $item['productinfo']->id }});"></i></a></td>
                                <td class="text-center"><a><i class="glyphicon glyphicon-remove"
                                            onclick="DeleteListCart({{ $item['productinfo']->id }});"> </i> </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            <div class="col-md-3">
                <table class="table table-bordered" id="myTable">
                    <thead>
                        @if (Session::has('Cart') != null)
                            <tr>
                                <th class="">Tổng số lượng</th>
                                <td class="text-center">{{ Session::get('Cart')->totalQuanty }}</td>
                            </tr>
                            <tr>
                                <th class="">Tổng tiền</th>
                                <td class="text-center"> {{ number_format(Session::get('Cart')->totalPrice_buy, 0) }}
                                </td>
                            </tr>
                            <tr>
                                <td class=" ">Thanh toán</td>
                                <td class="text-center"></td>
                            </tr>
                        @endif
                    </thead>

                </table>
            </div>
        </div>

    </div>


@endsection
@section('footer')
    <script>
        function DeleteListCart(id) {
            $.ajax({
                url: 'Delete-List-Cart/' + id,
                type: 'GET',
            }).done(function(response) {
                RenderListCart(response);
                location.reload();
                alertify.success('Xóa thành công');
            });
        }

        function SaveListCart(id) {
            $.ajax({
                url: 'Save-List-Cart/' + id + '/' + $("#quanty-item-" + id).val(),
                type: 'GET',
            }).done(function(response) {
                RenderListCart(response);
                location.reload();
                alertify.success(' Cập nhật thành công');
            });
        }

        function RenderListCart(response) {
            $("#list-cart").empty();
            $("#list-cart").html(response);
            
            var proQty = $('.pro-qty');
            proQty.prepend('<span class="dec qtybtn">-</span>');
            proQty.append('<span class="inc qtybtn">+</span>');
            proQty.on('click', '.qtybtn', function() {
                var $button = $(this);
                var oldValue = $button.parent().find('input').val();
                if ($button.hasClass('inc')) {
                    var newVal = parseFloat(oldValue) + 1;
                } else {
                    // Don't allow decrementing below zero
                    if (oldValue > 0) {
                        var newVal = parseFloat(oldValue) - 1;
                    } else {
                        newVal = 0;
                    }
                }
                $button.parent().find('input').val(newVal);
            });
        }
    </script>
@endsection
