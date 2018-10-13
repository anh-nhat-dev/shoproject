<tr>
    <td>#{{$cate->category_id}}</td>
    <td>{{$cate->name}}</td>
    <td>{{$cate->updated_at->format('d-m-Y')}}</td>
    <td>{{$cate->created_at->format('d-m-Y')}}</td>
    <td><span class="label label-success label-rounded">ACTIVE</span></td>
    <td>
        <a href="{{route('admin.cate.edit', $cate->category_id)}}" class="btn btn-info "><i class="icon-pencil"></i>
        </a>
        <a href="{{route('admin.cate.delete', $cate->category_id)}}" class="btn btn-danger"><i class="icon-trash"></i>
        </a>
    </td>
</tr>