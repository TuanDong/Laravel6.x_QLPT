@extends('layouts.layout')
@section('title', 'Thêm Nguoi Thuê')
@section('content')
<div class="row">
    <div class="col-xs-12">
        <h1 class="header smaller lighter blue">{{ isset($renterObj)? 'SỬA THÔNG TIN NGƯỜI THUÊ':'THÊM NGƯỜI THUÊ' }}</h1>

        <div class="clearfix">
            <div class="pull-right tableTools-container"></div>
        </div>
        <div class="table-header" style="text-align: center; line-height: 50px;">
            <span class="label label-xlg label-yellow arrowed-in-right arrowed-in" style="font-weight: bold; font-size: 15px; color: #D15B47;"></span>
        </div>
        <div class="row header">
            @if ($errors->any())
                <div id="show-alert" class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
                @foreach ($errors->all() as $error)
                    <strong ><i class="ace-icon fa fa-times"></i> Error !
                    {{$error}}
                    </strong><br>
                @endforeach
                </div>
            @endif
            <form class="form-horizontal" action="{{ isset($renterObj)? route('Update_Renter') : route('Insert_Renter') }}" method="post" >
                @csrf
                {!! isset($renterObj)? '<input type="hidden" name="from-field-id-renter" value='.$renterObj->ID.' >' :"" !!}
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span class="label label-xlg label-success arrowed">Tên Người Thuê:</span></label>
                    <div class="col-sm-9">
                        <input type="text" name="from-field-name-renter" {{ isset($renterObj)? "value=".$renterObj->Full_name :"" }} placeholder="Tên người thuê phòng" class="col-xs-10 col-sm-5">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span class="label label-xlg label-success arrowed">SCMND:</span></label>
                    <div class="col-sm-9">
                        <input type="number" name="from-field-scmnd" {{ isset($renterObj)? "value=".$renterObj->SCMND :"" }} placeholder="Số Chứng Minh Nhân Dân" class="col-xs-10 col-sm-5">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span class="label label-xlg label-success arrowed">Số Điện Thoại:</span></label>
                    <div class="col-sm-9">
                        <input type="number" name="from-field-number-phone" {{ isset($renterObj)? "value=".$renterObj->PhoneNumber:"" }} placeholder="Số Điện Thoại" class="col-xs-10 col-sm-5">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span class="label label-xlg label-success arrowed">Mô Tả Người Thuê:</span></label>
                    <div class="col-sm-9">
                        <div class="row col-xs-10 col-sm-5">
                            <textarea name="form-field-textarea" class="autosize-transition form-control" placeholder="Thông Người Thuê" style="overflow: hidden; overflow-wrap: break-word; resize: horizontal; height: 52px;">{{ isset($renterObj)? $renterObj->Decription :"" }}</textarea>
                        </div>

                    </div>
                </div>
                @if (isset($renterObj))
                    <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span class="label label-xlg label-success arrowed">Trạng Thái:</span></label>
                    <div class="col-sm-9"> <div class="checkbox"><label class="block">
                    <input type="hidden" name="from-field-status" value={{ $renterObj->ID }}>
                    <span class="lbl bigger-120" style="color: red;">{{(isset($renterObj) && $renterObj->Status != "0")? 'Đang Thuê':'Chuyển Đi' }}</span>
                    </label></div></div></div>
                @endif
                <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-9">
                        <button class="btn btn-info" type="submit">
                            <i class="ace-icon fa fa-floppy-o bigger-130" style="padding-right: 5%;" ></i> Lưu
                        </button>&nbsp; &nbsp;
                        <button class="btn" type="reset">
                            <i class="ace-icon fa fa-undo bigger-110"></i>
                            Reset
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
