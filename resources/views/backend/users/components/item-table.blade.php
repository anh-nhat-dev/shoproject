<tr>
    <td>#{{$user->user_id}}</td>
    <td>{{$user->fullname}}</td>
    <td>
        <img src="../plugins/images/assets/studio14.jpg" width="50" alt="">
    </td>
    <td><a href="{{route('admin.user.edit', $user->user_id)}}">{{$user->email}}</a></td>
    <td>{{$user->created_at->format('d-m-Y')}}</td>
    <td>
        <a href="{{route('admin.user.edit', $user->user_id)}}" class="btn btn-info "><i class="icon-pencil"></i>
        </a>
        <a href="{{route('admin.user.delete', $user->user_id)}}" class="btn btn-danger"><i class="icon-trash"></i>
        </a>
</td>