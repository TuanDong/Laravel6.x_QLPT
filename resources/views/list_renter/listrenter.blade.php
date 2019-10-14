@extends('layouts.layout')
@section('title', 'Danh Sách Người Thuê')
@section('content')
<div class="row">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="header smaller lighter blue">DANH SÁCH NGƯỜI THUÊ</h1>

            <div class="clearfix">
                <div class="pull-right tableTools-container"></div>
            </div>
            <div class="table-header">
                DANH SÁCH NGƯỜI THUÊ
                <div style="float: right; margin:0% 2% 0 0;">
                    <a href="{{ url('renter/add_renter') }}">
                        <button class="btn btn-sm btn-success"> THÊM </button>
                    </a>
                </div>
            </div>
            <!-- div.table-responsive -->

            <!-- div.dataTables_borderWrap -->
            <div class="table-responsive">

                @if (session('success'))
                    <div id="show-alert" class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
                    <strong><i class="ace-icon fa fa-check"></i> Success !
                    </strong> {{session('success')}}<br></div>
                @endif

                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="center">STT</th>
                            <th>Họ Tên Người Thuê</th>
                            <th>Số Chứng Minh Nhân Dân</th>
                            <th>Số Điện Thoại</th>
                            <th>Ngày Thuê</th>
                            <th>Ngày Chuyển Đi</th>
                            <th>Mô Tả Thông Tin Người Thuê</th>
                            <th>Trạng Thái</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $stt = 1;
                        @endphp
                        @foreach ($list_renter as $key => $people)
                        @if ($people->IS_DELETE == 0)
                        <tr>
                            <td class="center">{{ $key += 1  }}</td>
                            <td>{{ $people->Full_name }}</td>
                            <td>{{ $people->SCMND }}</td>
                            <td>{{ $people->PhoneNumber }}</td>
                            <td>{{ $people->RENTER_DAYIN }}</td>
                            <td>{{ $people->RENTER_DAYOUT }}</td>
                            <td>{{ $people->Decription }}</td>
                            <td>
                                <span class="label label-sm {{ ($people->Status == 1) ? 'label-success arrowed arrowed-righ' : 'label-danger arrowed-in' }} ">{{ ($people->Status == 1) ? 'Đang Thuê' : 'Chuyển Đi' }}</span>
                            </td>
                            <td>
                                <div class="hidden-sm hidden-xs btn-group">
                                    <button class="btn btn-xs btn-success">
                                        <a href="{{ url('renter/view_detail',$people->ID) }}" style="color: #fff;">
                                            <i class="ace-icon fa fa-eye bigger-120"></i>
                                        </a>
                                    </button>

                                    <button class="btn btn-xs btn-info">
                                        <a href="{{ url('renter/view_update',$people->ID) }}" style="color: #fff;">
                                            <i class="ace-icon fa fa-pencil bigger-120"></i>
                                        </a>
                                    </button>

                                    <button class="btn btn-xs btn-danger">
                                        <a href="{{ url('renter/delete',$people->ID) }}" style="color: #fff;">
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
                                                <a href="{{ url('renter/view_detail',$people->ID) }}" class="tooltip-info" data-rel="tooltip" title="" data-original-title="View">
                                                    <span class="blue">
                                                        <i class="ace-icon fa fa-eye bigger-120"></i>
                                                    </span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="{{ url('renter/view_update',$people->ID) }}" class="tooltip-success" data-rel="tooltip" title="" data-original-title="Edit">
                                                    <span class="green">
                                                        <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                    </span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="{{ url('renter/delete',$people->ID) }}" class="tooltip-error" data-rel="tooltip" title="" data-original-title="Delete">
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
    </div>
</div>
<script type="text/javascript">
$('#dynamic-table')
// .wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
.DataTable({
    bAutoWidth: false,
    "aoColumns": [{
            "bSortable": false
        },
        null, null, null, null, null, null, null,
        {
            "bSortable": false
        }
    ],
    "aaSorting": [[ 7, "desc" ]],
    // "iDisplayLength": 50
    select: {
        style: 'single'
    }
});
</script>
@endsection
