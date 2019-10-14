@extends('layouts.layout')
@section('title', 'Thong Tin Người Thuê')
@section('content')
<div class="row">
    <div class="col-xs-12">
        <h1 class="header smaller lighter blue">THÔNG TIN NGƯỜI THUÊ TRỌ</h1>

        <div class="clearfix">
            <div class="pull-right tableTools-container"></div>
        </div>
        <div class="table-header" style="text-align: center; line-height: 50px;">
            <span class="label label-xlg label-yellow arrowed-in-right arrowed-in" style="font-weight: bold; font-size: 15px; color: #D15B47;">{{$renter->Full_name}}</span>
        </div>
        <div class="row header">
            <form class="form-horizontal" role="form">
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span class="label label-xlg label-success arrowed">Số Chứng Minh Nhân Dân:</span></label>
                    <div class="col-sm-9">
                        <input type="text" disabled value="{{$renter->SCMND }}" class="col-xs-10 col-sm-5">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span class="label label-xlg label-success arrowed">Số Điện Thoại:</span></label>
                    <div class="col-sm-9">
                        <input type="text" disabled value="{{$renter->PhoneNumber }}" class="col-xs-10 col-sm-5">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span class="label label-xlg label-success arrowed">Mô Tả Người Thuê:</span></label>
                    <div class="col-sm-9">
                        <input type="text" disabled value="{{$renter->Decription }}" class="col-xs-10 col-sm-5">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span class="label label-xlg label-success arrowed">Trạng Thái:</span></label>
                    <div class="col-sm-9">
                        <div class="checkbox">
                            <label class="block">
                                <span class="lbl bigger-120" style="color: red;">{{($renter->Status != '0')?'Đang Thuê' : 'Đã Chuyển Đi' }}</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-9">
                        <button class="btn btn-info" type="button">
                            <a href="{{url('renter')}}" style="color: #fff;" ><i class="ace-icon fa fa-arrow-left bigger-130" style="padding-right: 5%;" ></i>Quay Lại</a>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
