<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title>@yield('title')</title>
	<link rel="shortcut icon" type="image/png" href="favicon.ico"/>
	<meta name="description" content="overview &amp; stats" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- bootstrap & fontawesome -->
	<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css') }}" />
	<link rel="stylesheet" href="{{asset('assets/font-awesome/4.5.0/css/font-awesome.min.css') }}" />

	<link rel="stylesheet" href="{{asset('assets/css/bootstrap-datepicker3.min.css') }}" />

	<!-- page specific plugin styles -->

	<!-- text fonts -->
	<link rel="stylesheet" href="{{asset('assets/css/fonts.googleapis.com.css') }}" />

	<!-- ace styles -->
	<link rel="stylesheet" href="{{asset('assets/css/ace.min.css') }}" class="ace-main-stylesheet" id="main-ace-style" />
	<link rel="stylesheet" href="{{asset('assets/css/ace-skins.min.css') }}" />
	<link rel="stylesheet" href="{{asset('assets/css/ace-rtl.min.css') }}" />
	<link rel="stylesheet" href="{{asset('css/customer.css') }}" />
	<script src="{{asset('assets/js/ace-extra.min.js') }}"></script>
    <script src="{{asset('assets/js/jquery-2.1.4.min.js') }}"></script>
    <script src="{{asset('js/setup-header-ajax.js') }}"></script>
</head>

<body class="skin-3 no-skin">
	<script src="{{asset('assets/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{asset('assets/js/jquery.dataTables.bootstrap.min.js') }}"></script>
	<script src="{{asset('assets/js/dataTables.buttons.min.js') }}"></script>
	<script src="{{asset('assets/js/buttons.flash.min.js') }}"></script>
	<script src="{{asset('assets/js/buttons.html5.min.js') }}"></script>
	<script src="{{asset('assets/js/buttons.print.min.js') }}"></script>
	<script src="{{asset('assets/js/buttons.colVis.min.js') }}"></script>
	<script src="{{asset('assets/js/dataTables.select.min.js') }}"></script>

	<script src="{{asset('assets/js/bootstrap-datepicker.min.js') }}"></script>

	<div id="navbar" class="navbar navbar-default ace-save-state">
		<div class="navbar-container ace-save-state" id="navbar-container">
			<div class="navbar-header pull-left">
				<a href="#" class="navbar-brand">
					<small>
						<i class="fa fa-leaf"></i>
						Ace Admin
					</small>
				</a>
			</div>

			<div class="navbar-buttons navbar-header pull-right" role="navigation">
                <ul class="nav ace-nav">
                    <li class="light-blue">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            @if (Session::get('locale') == 'en')
                                <img src="{{asset('assets/images/icon-language-english.png') }}" alt=""> ENGLISH
                            @else
                                <img src="{{asset('assets/images/vn-flag-lang.png') }}" alt=""> VIET NAM
                            @endif
                        </a>

                        <ul class="dropdown-menu dropdown-light-blue dropdown-caret">
                            <li>
                            <a href="{{url('language','en')}}">
                                    <img src="{{asset('assets/images/icon-language-english.png') }}" alt=""> ENGLISH
                                </a>
                            </li>
                            <li>
                                <a href="{{url('language','vn')}}">
                                    <img src="{{asset('assets/images/vn-flag-lang.png') }}" alt=""> VIET NAM
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="light-blue dropdown-modal">
                        <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                            <img class="nav-user-photo" src="{{asset('assets/images/avatars/user.jpg') }}" alt="Jason's Photo" />
                            <span class="user-info">
                                <small>Welcome</small>
                                {{Auth::user()->name}}
                            </span>

                            <i class="ace-icon fa fa-caret-down"></i>
                        </a>

                        <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                            <li>
                                <a href="#">
                                    <i class="ace-icon fa fa-cog"></i>
                                    Settings
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <i class="ace-icon fa fa-user"></i>
                                    Profile
                                </a>
                            </li>

                            <li class="divider"></li>

                            <li>
                                <a href="{{ url('logout') }}">
                                    <i class="ace-icon fa fa-power-off"></i>
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
			</div>
		</div><!-- /.navbar-container -->
	</div>
	<div class="main-container ace-save-state" id="main-container">
		<div id="sidebar" class="sidebar responsive ace-save-state compact">
			<div class="sidebar-shortcuts">
				<div class="sidebar-shortcuts-large">
					<button class="btn btn-success">
						<i class="ace-icon fa fa-signal"></i>
					</button>

					<button class="btn btn-info" href="#my-modal" data-toggle="modal">
						<i class="ace-icon fa fa-pencil"></i>
					</button>

					<!-- <button class="btn btn-warning">
						<i class="ace-icon fa fa-users"></i>
					</button>

					<button class="btn btn-danger">
						<i class="ace-icon fa fa-cogs"></i>
					</button> -->
				</div>

				<div class="sidebar-shortcuts-mini">
					<span class="btn btn-success"></span>

					<span class="btn btn-info"></span>

					<span class="btn btn-warning"></span>

					<span class="btn btn-danger"></span>
				</div>
			</div><!-- /.sidebar-shortcuts -->

			<ul class="nav nav-list">
				<li class="{{ (request()->is('home')) ? 'active' : '' }}">
                <a href="{{ url('home') }}" text="">
						<i class="menu-icon fa fa-tachometer"></i>
						<span class="menu-text"> Danh Sách Phòng Thuê </span>
					</a>

					<b class="arrow"></b>
				</li>
				<li class="{{ (request()->is('renter')) ? 'active' : '' }}">
					<a href="{{ url('renter') }}">
						<i class="menu-icon fa fa-tachometer"></i>
						<span class="menu-text"> Danh Sách Người Thuê </span>
					</a>
					<b class="arrow"></b>
				</li>
				<li class="class="{{ (request()->is('room_rent')) ? 'active' : '' }}"">
					<a href="{{ url('room_rent') }}">
						<i class="menu-icon fa fa-tachometer"></i>
						<span class="menu-text"> Danh Sách Phòng Cho Thuê </span>
					</a>
					<b class="arrow"></b>
				</li>
			</ul><!-- /.nav-list -->

			<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
				<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
			</div>
		</div>

		<div class="main-content">
			<div class="main-content-inner">
				<div class="page-content">
					<div class="row">
						<div class="col-xs-12">
							<!-- PAGE CONTENT BEGINS -->
							@yield('content')
							<!-- PAGE CONTENT ENDS -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.page-content -->
			</div>
			<!-- Modal price water electric -->
			<div id="my-modal" class="modal fade" tabindex="-1">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h3 class="smaller lighter blue no-margin">Giá Điện Nước</h3>
						</div>

						<div class="modal-body">
							<div style="margin-bottom: 2%;">
								<input type="hidden" id="id-electric-water" value="{{ Session::get('PRICE')->ID }}" >
								<label class="col-sm-3 control-label no-padding-right">Giá Điện</label>
								<span class="input-icon">
                                    <input type="number" id="price-electric" style="text-align: end;" min="0" value="{{ Session::get('PRICE')->PRICE_ELECTRIC }}">
									<i class="ace-icon fa fa-leaf green"></i>
								</span>
							</div>
							<div>
								<label class="col-sm-3 control-label no-padding-right">Giá Nước</label>
								<span class="input-icon ">
									<input type="number" id="price-water" style="text-align: end;" min="0" value="{{ Session::get('PRICE')->PRICE_WATER }}">
									<i class="ace-icon fa fa-leaf blue"></i>
								</span>
							</div>
						</div>

						<div class="modal-footer">
							<button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
								<i class="ace-icon fa fa-times"></i>
								Đóng
							</button>
							<button class="btn btn-sm btn-info pull-right" style="margin-right: 2%;" onclick="UpdatePrice();">
								<i class="ace-icon fa fa-floppy-o"></i>
								Lưu
							</button>
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div>
		</div><!-- /.main-content -->

		<div class="footer">
			<div class="footer-inner">
				<div class="footer-content">
					<span class="bigger-120">
						<span class="blue bolder">Ace</span>
						Application &copy; 2013-2014
					</span>

					&nbsp; &nbsp;
					<span class="action-buttons">
						<a href="#">
							<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
						</a>

						<a href="#">
							<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
						</a>

						<a href="#">
							<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
						</a>
					</span>
				</div>
			</div>
		</div>

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
			<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
		</a>
	</div><!-- /.main-container -->

	<script src="{{asset('assets/js/bootstrap.min.js') }}"></script>
	<!-- page specific plugin scripts -->

	<!-- ace scripts -->
	<!-- <script src="assets/js/ace-elements.min.js"></script> -->
	<script src="{{asset('assets/js/ace.min.js') }}"></script>
	<script>
		var realDate = new Date();
		$(".date-picker").datepicker({
			format: 'dd/mm/yyyy',
			autoclose: true,
		})
		.next().on(ace.click_event, function() {
			$(this).prev().focus();
		});
		$(".date-picker").datepicker('setDate', realDate);
		setTimeout(function(){ $('#show-alert').hide();},3000);
		function UpdatePrice() {
			var priceElectric =  parseFloat( $('#price-electric').val().replace(/,/g,''));
			var priceWater =  parseFloat( $('#price-water').val().replace(/,/g,''));
			var id = $('#id-electric-water').val();
			$.ajax({
				method: "POST",
				url:"updatePrice",
				data:{
					id : id,
					priceElectric :priceElectric,
					priceWater: priceWater
				}
			}).done (function (data){
				if (data) {
					$('#my-modal').modal('hide');
					alert('Sửa Thành Công... !');
				} else {
					alert('Không Thành Công... !');
				}
			}).fail( function (error) {
				alert('Không Thành Công... !');
			});
		}
	</script>
</body>

</html>
