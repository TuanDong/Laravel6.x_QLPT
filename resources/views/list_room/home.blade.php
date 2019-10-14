@extends('layouts.layout')
@section('title', 'Danh sách phòng')
@section('content')
<div class="row">
    <h1 class="header smaller lighter blue">DANH SÁCH PHÒNG TRỌ</h1>

    <div class="clearfix">
        <div class="pull-right tableTools-container"></div>
    </div>
    <div class="table-header">
        DANH SÁCH PHÒNG
        <div style="float: right; margin:0% 2% 0 0;">
            <a href="{{ url('home/add_room') }}">
                <button class="btn btn-sm btn-success"> THÊM </button>
            </a>
        </div>
    </div>
    <!-- div.table-responsive -->

    <!-- div.dataTables_borderWrap -->
    <div class="table-responsive">
        @if (session('success'))
            <div id="show-alert" class="alert alert-success ">
            <button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>;
            <strong><i class="ace-icon fa fa-check"></i> Success !
            </strong>{{ session('success') }}<br></div>;
        @endif
        <table id="dynamic-table" class="table table-striped table-bordered table-hover responsive">
            <thead>
                <tr>
                    <th class="center">
                        STT
                    </th>
                    <th>@lang('messages.roomName')</th>
                    <th>@lang('messages.price')</th>
                    <th>@lang('messages.number_electric')</th>
                    <th>@lang('messages.number_water')</th>
                    <th>@lang('messages.status')</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @php
                    $stt = 1;
                @endphp
                @foreach ($list_room as $key => $room)
                @if ($room->IS_DELETE == 0)
                <tr>
                    <td class="center">{{$stt}}</td>
                    <td>{{ $room->NAME_ROOM }}</td>
                    <td>{{ number_format($room->PRICE) . ' VND' }}</td>
                    <td>{{ $room->NUMBER_ELECTRIC }}</td>
                    <td>{{ $room->NUMBER_WATER }}</td>

                    <td>
                        <span class="label label-sm {{ ($room->STATUS == 1) ? 'label-success arrowed arrowed-righ' : 'label-warning arrowed-in' }} ">{{ ($room->STATUS == 1) ? 'Đã thuê' : 'Phòng trống' }}</span>
                    </td>
                    <td>
                        <div class="hidden-sm hidden-xs btn-group">
                            <button class="btn btn-xs btn-success">
                                <a href="{{ url('home/view_detail',$room->ID) }}" style="color: #fff;"><i class="ace-icon fa fa-eye bigger-120"></i></a>
                            </button>

                            <button class="btn btn-xs btn-info" >
                            <a href="{{ url('home/view_update',$room->ID) }}" style="color: #fff;"><i class="ace-icon fa fa-pencil bigger-120"></i></a>
                            </button>

                            <button class="btn btn-xs btn-danger">
                                <a href="{{ url('home/delete',$room->ID) }}" style="color: #fff;">
                                    <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                </a>
                            </button>
                        </div>

                        <div class="hidden-md hidden-lg">
                            <div class="inline pos-rel">
                                <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                    <i class="ace-icon fa fa-cog icon-only bigger-110"></i>
                                </button>

                                <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                    <li>
                                        <a href="{{ url('home/view_detail',$room->ID) }}" class="tooltip-info" data-rel="tooltip" title="" data-original-title="View">
                                            <span class="blue">
                                                <i class="ace-icon fa fa-eye bigger-120"></i>
                                            </span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ url('home/view_update',$room->ID) }}" class="tooltip-success" data-rel="tooltip" title="" data-original-title="Edit">
                                            <span class="green">
                                                <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                            </span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ url('home/delete',$room->ID) }}" class="tooltip-error" data-rel="tooltip" title="" data-original-title="Delete">
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
                @php
                    $stt ++;
                @endphp
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
$('#dynamic-table')
.DataTable({
    bAutoWidth: false,
    "aoColumns": [{
            "bSortable": false
        },
        null, null, null, null, null,
        {
            "bSortable": false
        }
    ],
    "aaSorting": [],
    "pageLength": 15,
});
</script>
@endsection
