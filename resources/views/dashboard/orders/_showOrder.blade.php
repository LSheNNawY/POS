        <div class="box box-primary">

            <div class="box-header">
                <h3 class="box-title" style="margin-bottom: 10px">@lang('site.show')</h3>
            </div>

            <div class="box-body">
                {{-- order details --}}
                <div class="form-group">
                    <table class="table table-hover">
                        <tbody id="product_table" class="order-list">
                            <tr>
                                <td>#</td>
                                <td>@lang('site.name')</td>
                                <td>@lang('site.sale_price')</td>
                                <td>@lang('site.quantity')</td>
                            </tr>

                            @foreach($order->products as $index => $product)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $product->name}}</td>
                                    <td>{{ $product->sale_price}}</td>
                                    <td>{{ $product->pivot->quantity}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <h4>@lang('site.total') : <span id="total_price">{{ $order->total_price }}</span></h4>
                    <br>
                </div>
            </div>
        </div>