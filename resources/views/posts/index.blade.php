@extends('layouts.app') 
@section('content')
<div class="clearfix">

</div>

<div class="content-wrapper">
  <div class="container-fluid">

    <!--Start Dashboard Content-->

    <div class="row">
        <div class="col-12 col-lg-6 col-xl-6">
            <div class="card">
              <div class="card-header">Weekly sales
                <div class="card-action">
                  <div class="dropdown">
                    <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
                      <i class="icon-options"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a class="dropdown-item" href="javascript:void();">Action</a>
                      <a class="dropdown-item" href="javascript:void();">Another action</a>
                      <a class="dropdown-item" href="javascript:void();">Something else here</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="javascript:void();">Separated link</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <canvas id="chart2" height="180"></canvas>
              </div>
              <div class="table-responsive">
                <table class="table align-items-center">
                  <tbody>
                    <tr>
                      <td><i class="fa fa-circle text-white mr-2"></i> Direct</td>
                      <td>{{ $addIncome }}</td>
                      <td>+55%</td>
                    </tr>
                    <tr>
                      <td><i class="fa fa-circle text-light-1 mr-2"></i>Affiliate</td>
                      <td>{{ $addSpeding }}</td>
                      <td>+25%</td>
                    </tr>
                    <tr>
                      <td><i class="fa fa-circle text-light-2 mr-2"></i>E-mail</td>
                      <td>$1802</td>
                      <td>+15%</td>
                    </tr>
                    <tr>
                      <td><i class="fa fa-circle text-light-3 mr-2"></i>Other</td>
                      <td>$1105</td>
                      <td>+5%</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>



      <div class="col-12 col-lg-6 col-xl-6">
        <div class="card">
          <div class="card-body">
            <div class="card-title">収入/支出入力</div>
            <hr>
            <form method="POST" action="{{ url('post') }}">
              @csrf
              <div class="form-group row">
                <label for="capital" class="col-sm-3 col-form-label">支出/収入</label>
                <div class="col-sm-9">
                  <select class="form-control" id="capital" name="capital" required>
                        <option value=""></option>
                        @foreach ($capitals as $capital)
                            <option value="{{ $capital->id }}">{{ $capital->capital }}</option>
                        @endforeach
                    </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="autoclose-datepicker" class="col-sm-3 col-form-label">日付</label>
                <div class="col-sm-9">
                  <input type="text" name="post_date" id="autoclose-datepicker" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label for="amount" class="col-sm-3 col-form-label">金額</label>
                <div class="col-sm-9">
                  <input type="text" name="price" class="form-control" id="amount">
                </div>
              </div>

              <div class="form-group row">
                <label for="category" class="col-sm-3 col-form-label">用途</label>
                <div class="col-sm-9">
                  <select class="form-control" id="category" name="category_id" required>
                        <option value=""></option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
              </div>

              <div class="form-group row">
                <label for="memo" class="col-sm-3 col-form-label">メモ</label>
                <div class="col-sm-9">
                  <input type="text" name="memo" class="form-control" id="memo">
                </div>
              </div>
              <div class="form-group row">
                <label for="store" class="col-sm-3 col-form-label">店舗</label>
                <div class="col-sm-9">
                  <input type="text" name="store" class="form-control" id="store">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label"></label>
                <div class="col-sm-8">
                  <button type="submit" class="btn btn-white px-5"><i class="icon-lock"></i> 登録</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!--End Row-->

    <div class="row">
      <div class="col-12 col-lg-12">
        <div class="card">
          <div class="card-header">出費履歴
            <div class="card-action">
            </div>
          </div>
          <div class="table-responsive">
            <table class="table align-items-center table-flush table-borderless">
              <thead>
                <tr>
                  <th>支出/収入</th>
                  <th>用途</th>
                  <th>金額</th>
                  <th>店舗</th>
                  <th>メモ</th>
                  <th>登録日</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($posts as $post)
                <tr>
                  <td>{{ $post->capital->capital }}</td>
                  <td>{{ $post->category->category_name }}</td>
                  <td>￥{{ $post->price }}</td>
                  <td>{{ $post->store }}</td>
                  <td>{{ $post->memo }}</td>
                  <td>{{ $post->post_date }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!--End Row-->

    <!--End Dashboard Content-->

  </div>
  <!-- End container-fluid-->

</div>
<!--End content-wrapper-->
<!--Start Back To Top Button-->
<a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
<!--End Back To Top Button-->

<!--Start footer-->
<footer class="footer">
  <div class="container">
    <div class="text-center">
      Copyright © 2018 John Smith
    </div>
  </div>
</footer>
<!--End footer-->

<!--start color switcher-->
<div class="right-sidebar">
  <div class="switcher-icon">
    <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
  </div>
  <div class="right-sidebar-content">

    <p class="mb-0">Gaussion Texture</p>
    <hr>

    <ul class="switcher">
      <li id="theme1"></li>
      <li id="theme2"></li>
      <li id="theme3"></li>
      <li id="theme4"></li>
      <li id="theme5"></li>
      <li id="theme6"></li>
    </ul>

    <p class="mb-0">Gradient Background</p>
    <hr>

    <ul class="switcher">
      <li id="theme7"></li>
      <li id="theme8"></li>
      <li id="theme9"></li>
      <li id="theme10"></li>
      <li id="theme11"></li>
      <li id="theme12"></li>
    </ul>

  </div>
</div>
<!--end color cwitcher-->

</div>
<!--End wrapper-->

<!-- Bootstrap core JavaScript-->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

<!-- simplebar js -->
<script src="{{ asset('assets/plugins/simplebar/js/simplebar.js') }}"></script>
<!-- sidebar-menu js -->
<script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>
<!-- loader scripts -->
<script src="{{ asset('assets/js/jquery.loading-indicator.js') }}"></script>
<!-- Custom scripts -->
<script src="{{ asset('assets/js/app-script.js') }}"></script>
<!-- Chart js -->

<script src="{{ asset('assets/plugins/Chart.js/Chart.min.js') }}"></script>
<!-- Vector map JavaScript -->
<script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
<script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- Easy Pie Chart JS -->
<script src="{{ asset('assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
<!-- Sparkline JS -->
<script src="{{ asset('assets/plugins/sparkline-charts/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-knob/excanvas.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-knob/jquery.knob.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script>
  $('#autoclose-datepicker').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'yyyy-mm-dd'
      });
  $(function() {
            $(".knob").knob();
        });

</script>
<!-- Index js -->
<script src="{{ asset('assets/js/index.js') }}"></script>
@endsection