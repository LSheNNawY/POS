
                {{-- order details --}}
                <div class="form-group">
                    <table class="table table-hover">
                        <tbody id="product_table" class="order-list">
                            <tr>
                                <td>#</td>
                                <td>@lang('site.name')</td>
                                <td>@lang('site.quantity')</td>
                                <td>@lang('site.sale_price')</td>
                            </tr>

                            @foreach($order->products as $index => $product)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $product->name}}</td>
                                    <td>{{ $product->pivot->quantity}}</td>
                                    <td>{{ number_format($product->sale_price * $product->pivot->quantity, 2 )}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <h4>@lang('site.total') : <span id="total_price">{{  number_format($order->total_price, 2)}}</span></h4>
                    <br>
                </div>
