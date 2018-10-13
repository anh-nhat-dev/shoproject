<tr>
    <td>#{{$product->product_id}}</td>
    <td>{{$product->name}}</td>
    <td>
        <img src="../plugins/images/assets/studio14.jpg" width="50" alt="">
    </td>
    <td>@money($product->sale_price, 'VND')</td>
    <td>{{$product->category->name}}</td>
    <td>{{$product->created_at->format('d-m-Y')}}</td>
    <td>@status($product->status)</td>
    <td>
            <a href="{{route('admin.product.edit', $product->product_id)}}" class="btn btn-info "><i class="icon-pencil"></i>
            </a>
            <a href="{{route('admin.product.delete', $product->product_id)}}" class="btn btn-danger"><i class="icon-trash"></i>
            </a>
    </td>
</tr>
