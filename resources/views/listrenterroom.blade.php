@extends('layouts.layout')
@section('title', 'Danh Sách Người Thuê')
@section('content')
<div class="row">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="header smaller lighter blue">QUẢN LÝ THUÊ TRỌ</h1>

            <div class="clearfix">
                <div class="pull-right tableTools-container"></div>
            </div>
            <div class="table-header">
                DANH SÁCH PHÒNG TRỌ ĐÃ THUÊ
            </div>
            <!-- div.table-responsive -->
            <!-- div.dataTables_borderWrap -->
            <div style="margin-top: 1%;">

                {{-- if (isset($error) || isset($success)) {
                    <div id="show-alert" class="alert {{(isset($error) ?'alert-danger' : 'alert-success')}}">;
                    <button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>;
                    <strong><i class="ace-icon fa {{(isset($error) ? 'fa-times' : 'fa-check')}}"></i>{{(isset($error) ? ' Error !' : ' Success !')}};
                    </strong>{{(isset($error) ? $error : $success) }}<br></div>';
                } --}}
                @foreach ($list_renter_room as $key => $room)
                <div class="col-xs-12 col-sm-3 widget-container-col" style="margin-bottom: 2%;">
                    <div class="widget-box">
                        <form method="post" action="{{$room->STATUS != 0 ? url() : '' }}">
                            <input type="hidden" name="id_room" value="{{ $room->ID }}" >
                            <input type="hidden" name="id_renter" value="{{ $room->ID_RENTER }}" >
                            <input type="hidden" name="room_rentID" value="{{ $room->ROOM_RENT_ID }}" >
                            {{-- <input type="hidden" name="page" value="{{ $curent_page }}" > --}}
                            <div class="widget-header">
                                <h4 class="widget-title smaller" style="font-weight: bold;"> <i class="ace-icon fa fa-home align-bottom bigger-180"></i>{{ $room->NAME_ROOM }}</h4>
                                <div class="widget-toolbar">
                                    <span class="label label-lg arrowed arrowed-right {{$room->STATUS != 0 ? 'label-primary' : 'label-danger'}};"><i class="ace-icon fa fa-bookmark align-top bigger-120"></i></span>
                                </div>
                            </div>

                            <div class="widget-body">
                                <div class="widget-main padding-6">
                                    <div class="alert alert-info">
                                        <span class="label label-success arrowed"><i class="ace-icon fa fa-book bigger-120"></i> Tên Người Thuê:</span><span>{{ $room->Status == 1 ? $room->Full_name : '' }}</span> <br>
                                        <span class="label label-success arrowed"><i class="ace-icon fa fa-book bigger-120"></i> Tiền Phòng:</span><span>{{ number_format($room->PRICE) }}</span> <br>
                                        <span class="label label-success arrowed"><i class="ace-icon fa fa-book bigger-120"></i> Số Điện:</span><span>{{ $room->NUMBER_ELECTRIC }}</span> <br>
                                        <span class="label label-success arrowed"><i class="ace-icon fa fa-book bigger-120"></i> Số Nước:</span><span>{{ $room->NUMBER_WATER }}</span> <br>
                                    </div>
                                </div>
                                <div class="widget-toolbox padding-8 clearfix">
                                    <a class="btn btn-xs btn-primary pull-right "  {{ $room->STATUS != 0 ? 'data-toggle="modal" data-target="#modal-caculator"' : 'href=""' }}  style="border-radius: 6px;" >
                                        <i class="ace-icon fa fa-credit-card icon-on-right bigger-120"></i>
                                        <span class="bigger-110" style="color:{{ $room->STATUS != 0 ?'': 'red' }};">{{ $room->STATUS != 0 ? 'Tính Tiền' : 'Thuê Phòng' }}</span>
                                    </a>
                                        {{-- if ($room->STATUS != 0) {
                                            <button class="btn btn-xs btn-danger pull-right" type="submit" style="margin-right: 5%;border-radius: 6px;border-radius: 6px;" >;
                                            <i class="ace-icon fa fa-lock icon-on-right bigger-120"></i>;
                                            <span class="bigger-110"> Trả Phòng</span></button>;
                                            // watch history pay room
                                            <a class="btn btn-xs btn-info pull-left" onclick="watch_history({{ $room->ID }});" style="margin-right: 5%;border-radius: 6px;border-radius: 6px;" >;
                                            <i class="ace-icon fa fa-calendar icon-on-right bigger-120"></i>;
                                            <span class="bigger-110"> Lịch Sử Đóng Tiền</span></a>;
                                        } --}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="clearfix"></div>
            {{-- <div class="wizard-actions" style="margin-top: 1%;">
                <ul class="pagination">
                    <li class="paginate_button previous {{$curent_page > 1?'':'disabled'}}">
                        <a href="{{$curent_page >1?url('DanhsachphongthueController/index',[$curent_page - 1]):''}} ">Previous</a>
                    </li>
                    for ($i=1; $i <= CEIL($total_page/12); $i++) {
                        <li class="paginate_button {{($i == $curent_page?'active':'')}}" ><a href="{{url('DanhsachphongthueController/index',[$i])}}">{{$i}}</a></li>;
                    }

                    <li class="paginate_button next {{ $curent_page == CEIL($total_page/12)?'disabled':''}}" >
                        <a href=" {{($curent_page < CEIL($total_page/12))? url('DanhsachphongthueController/index',[$curent_page + 1]): ''}}">Next</a>
                    </li>
                </ul>
            </div> --}}
        </div>
    </div>
    <div id="modal-caculator" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="smaller lighter blue no-margin">Thông Tin Phòng</h3>
                </div>
                <div class="modal-body">
                    <div class="row" style="margin-left: 2%;">
                        <div style="margin-top: 2%;">
                            <input type="hidden" id="id-room" >
                            <input type="hidden" id="id-renter" >
                            <input type="hidden" id="water-old" >
                            <input type="hidden" id="electric-old" >
                            <input type="hidden" id="room-price" >
                            <label class="col-sm-3 label label-xlg label-info arrowed-in-right arrowed">Ngay Tính Tiền: </label>
                            <div class="col-sm-7 input-group" style="padding-left: 2%;">
                                <input class="form-control date-picker" id="id-datepicker" type="text" data-provide="datepicker" disabled>
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar bigger-110"></i>
                                </span>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div style="margin-top: 2%;">
                            <label class="col-sm-3 label label-xlg label-info arrowed-in-right arrowed">Số Tháng: </label>
                            <input type="number" id="number-month" class="col-sm-7" style="margin-left: 2%;" value="1" min="1" max="12">
                        </div>
                        <div class="clearfix"></div>
                        <div style="margin-top: 2%;">
                            <label class="col-sm-3 label label-xlg label-info arrowed-in-right arrowed">Số Điện: </label>
                            <input type="number" id="number-electric" class="col-sm-7" min="0" style="margin-left: 2%;">
                        </div>
                        <div class="clearfix"></div>
                        <div style="margin-top: 2%;">
                            <label class="col-sm-3 label label-xlg label-info arrowed-in-right arrowed">Số Nước: </label>
                            <input type="number" id="number-water" class="col-sm-7" min="0"  style="margin-left: 2%;">
                        </div>
                        <div class="clearfix"></div>
                        <div style="margin-top: 2%;">
                            <label class="col-sm-3 label label-xlg label-info arrowed-in-right arrowed">Tiền Khác: </label>
                            <input type="number" id="money-other" class="col-sm-7" value="0" min="0" style="margin-left: 2%;">
                        </div>
                        <div class="clearfix"></div>
                        <div style="margin-top: 2%;">
                            <label class="col-sm-3 label label-xlg label-info arrowed-in-right arrowed">Mô Tả: </label>
                            <div class="col-sm-7">
                                <textarea name="form-field-textarea" id="id-decription" class="autosize-transition form-control" placeholder="Mô tả đóng tiền" style="overflow: hidden; overflow-wrap: break-word; resize: horizontal;"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div style="margin-top: 2%;" id="id-total">
                        <hr>
                        <label class="pull-right" style="color: red; font-size: 24px; font-weight: bold; margin-right: 10%;" id="id-label-total"></label>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
                        <i class="ace-icon fa fa-times"></i>
                        Đóng
                    </button>
                    <button class="btn btn-sm btn-primary pull-right" id="id-btn-payall" onclick="payall();" style="margin-right: 2%;">
                        <i class="ace-icon fa fa-credit-card"></i>
                        Thanh Toán
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

    <!--  modal history -->
    <div id="modal-history" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="smaller lighter blue no-margin">Lịch Sử Đóng Tiền Phòng</h3>
                </div>
                <div class="modal-body">
                    <div class="row" style="margin: 2%;">
                        <table id="table-history" class="table table-striped table-bordered table-hover" style="padding:2%;">
                            <thead>
                            <tr>
                                <th class="center">STT</th>
                                <th>Ngày Đóng Tiền</th>
                                <th>Mô Tả</th>
                                <th>Tiền Đóng</th>
                                <th>Tiền Khác</th>
                                <th>Số Lượng Tháng</th>
                            </tr>
                        </thead>
                        <tbody id="id-body">
                        </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
                        <i class="ace-icon fa fa-times"></i>
                        Đóng
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
</div>
@endsection
