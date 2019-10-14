@extends('layouts.layout')
@section('title','Thong tin phong')
@section('content')
<div class="row">
    <div class="col-xs-12">
        <h1 class="header smaller lighter blue">MÔ TẢ PHÒNG</h1>
        <div class="clearfix">
            <div class="pull-right tableTools-container"></div>
        </div>
        <div class="table-header" style="text-align: center; line-height: 50px;">
            <span class="label label-xlg label-yellow arrowed-in-right arrowed-in" style="font-weight: bold; font-size: 15px; color: #D15B47;">{{ $roomObj->NAME_ROOM }}</span>
        </div>
        <div class="row header">
            <form class="form-horizontal" role="form">
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span class="label label-xlg label-success arrowed">Giá Phòng:</span></label>
                    <div class="col-sm-9">
                        <input type="text" disabled value="{{ number_format($roomObj->PRICE) }}" class="col-xs-10 col-sm-5">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span class="label label-xlg label-success arrowed">Số Điện:</span></label>
                    <div class="col-sm-9">
                        <input type="text" disabled value="{{ number_format($roomObj->NUMBER_ELECTRIC) }}" class="col-xs-10 col-sm-5">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span class="label label-xlg label-success arrowed">Số Nước:</span></label>
                    <div class="col-sm-9">
                        <input type="text" disabled value="{{ number_format($roomObj->NUMBER_WATER) }}" class="col-xs-10 col-sm-5">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span class="label label-xlg label-success arrowed">Mô Tả Phòng:</span></label>
                    <div class="col-sm-9">
                        <div class="row col-xs-10 col-sm-5">
                            <textarea name="form-field-textarea" class="autosize-transition form-control" disabled style="overflow: hidden; overflow-wrap: break-word; resize: horizontal; height: 52px;">{{ $roomObj->DECRIPTION}}</textarea>
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span class="label label-xlg label-success arrowed">Trạng Thái:</span></label>
                    <div class="col-sm-9">
                        <div class="checkbox">
                            <label class="block">
                                <input name="form-field-checkbox" {{ $roomObj->STATUS != 0 ? 'checked' : '' }} disabled type="checkbox" class="ace input-lg">
                                <span class="lbl bigger-120"> Đã Thuê</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-9">
                        <button class="btn btn-info" type="button">
                            <a href="{{ url('home') }}" style="color: #fff;" ><i class="ace-icon fa fa-arrow-left bigger-130" style="padding-right: 5%;" ></i>Quay Lại</a>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
