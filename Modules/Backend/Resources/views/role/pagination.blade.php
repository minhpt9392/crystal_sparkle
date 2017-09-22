{{--/as--}}
@if(count($roles) > 0)
    <thead class="thead-inverse">
    <tr>
        <th class="order-number"></th>
        <th>Name</th>
        <th>Description</th>
        <th class="item-action item-action-3"></th>
    </tr>
    </thead>

    <tbody>

    @foreach($roles as $key => $role)
        <tr>
            <input type="hidden" name="role_id" value="{{$role->id}}">
            <td class="text-center">{{$key+1}}</td>
            <td>
                {{$role->display_name}}
            </td>
            <td class="text-overflow">{{$role->description}}</td>
            <td>
                <div class="hidden-sm hidden-xs btn-group">
                    @permission('view-role')
                    <a class="btn btn-xs btn-success" href="/admin/role/view/{{$role->id}}" title="Role detail">
                        <i class="ace-icon fa fa-check bigger-120"></i>
                    </a>
                    @endpermission

                    <a class="btn btn-xs btn-info" href="/admin/role/edit/{{$role->id}}" title="Role edit">
                        <i class="ace-icon fa fa-pencil bigger-120"></i>
                    </a>

                    <a class="btn btn-xs btn-danger" href="#" title="Role delete">
                        <i class="ace-icon fa fa-trash-o bigger-120"></i>
                    </a>
                </div>

                <div class="hidden-md hidden-lg">
                    <div class="inline pos-rel">
                        <button class="btn btn-minier btn-primary dropdown-toggle"
                                data-toggle="dropdown" data-position="auto">
                            <i class="ace-icon fa fa-cog icon-only bigger-110"></i>
                        </button>

                        <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                            <li>
                                <a href="/admin/role/view/{{$role->id}}" class="tooltip-info"
                                   data-rel="tooltip" title="View">
                                    <span class="blue">
                                        <i class="ace-icon fa fa-search-plus bigger-120"></i>
                                    </span>
                                </a>
                            </li>

                            <li>
                                <a href="/admin/role/edit/{{$role->id}}" class="tooltip-success"
                                   data-rel="tooltip" title="Edit">
                                    <span class="green">
                                        <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                    </span>
                                </a>
                            </li>

                            <li>
                                <a href="#" class="tooltip-error"
                                   data-rel="tooltip" title="Delete">
                                    <span class="red">
                                        <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
@else
    <div class="no-records">No records</div>
@endif
<input id="total-pages-current" type="hidden" value="{{ isset($pages) ? $pages : 0 }}">