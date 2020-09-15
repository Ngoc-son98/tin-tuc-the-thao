@extends('admin.layout.index')

@section('content')
<script src="admin_asset/dist/js/extra.js"></script>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
				<h1>Chào {{ Auth::user()->name }}</h1>
				<div class="col-md-6">
					<div class="panel panel-default calen">
	                    <div class="panel-heading">
	                        <strong style="font-size: 20px;">Lịch</strong>
	                   	</div>
	                    <div class="panel-body">
	                        <p>Hôm nay là:Ngày {{ date('d/m/Y') }}.</p>
	                        
	                    </div>
	                </div>
				</div>
				
				<div class="clearfix"></div>
				<div class="col-lg-12">
					<div class="panel panel-default calen">
	                    <div class="panel-heading">
	                        <strong style="font-size: 20px;">Danh Sách các Bình luận mới</strong>
	                   	</div>
	                    <div class="panel-body">
	                    	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
		                        <thead>
		                            <tr align="center">
		                                <th class="text-center">ID</th>
		                                <th class="text-center">Nội Dung</th>
		                                <th class="text-center">Tên Người Dùng</th>
		                                <th class="text-center">Tiêu Đề Bài Viết</th>
		                                <th class="text-center">Thời Gian Đăng</th>
		                            </tr>
		                        </thead>
		                        <tbody>
		                            @foreach($comment as $binhluan)
		                                <tr class="odd gradeX" align="center">
		                                    <td>{{ $binhluan->id }}</td>
		                                    <td>{{ $binhluan->NoiDung }}</td>
		                                    <td>{{ $binhluan->User->name }}</td>
		                                    <td>{{ $binhluan->TinTuc->TieuDe }}</td>
		                                    <td>{{ $binhluan->created_at}}</td>
		                                </tr>
		                            @endforeach
		                        </tbody>
		                    </table>
	                    </div>
	                </div>
					
				</div>

				<div class="col-lg-12">
					<div class="panel panel-default calen">
	                    <div class="panel-heading">
	                        <strong style="font-size: 20px;">Danh Sách Bài viết mới cập nhật</strong>
	                   	</div>
	                    <div class="panel-body">
	                    	<div class="container">
                         <div id="content" class="space-top-none">
                            <div class="main-content">
                                <div class="space60">&nbsp;</div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="beta-products-list">
                                            <div class="beta-products-details">
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="row">
                                            @foreach($tintuc as $article)
                                                <div class="col-sm-3">
                                                    <div class="single-item">
                                                        <!-- <div class="single-item-header">
                                                            {{ $article->id }}
                                                        </div> -->
                                                        <div class="single-item-header">
			                                            <img width="250px" src="{{asset('upload/tintuc/'.$article->Hinh)}}">
			                                        	</div>
                                                        <div class="single-item-body">
                                                            {{ $article->TieuDe }}
                                                        </div>
                                                        <div class="single-item-caption">
                                                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/tintuc/xoa/{{$article->id}}"> Xóa</a></td>
                                                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/tintuc/sua/{{ $article->id}}">Sửa</a></td>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            </div>
                                        </div> <!-- .beta-products-list -->
                                        <div class="space50">&nbsp;</div>
                                        </div> <!-- .beta-products-list -->
                                    </div>
                                </div> <!-- end section with sidebar and main content -->
                            </div> <!-- .main-content -->
                        </div> <!-- #content -->
	                    </div>
	                </div>
					
				</div>
            </div>
        </div>
    </div>
</div>
    <html>
  <head>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load('visualization', '1.0', {'packages':['corechart']});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['Bóng đá',7 ],
          ['Cầu lông',2 ],
          ['Bóng rổ',1 ],
          ['Bơi lội',2 ],
          ['Tenis', 3],
        ]);
        var options = {'title':'BIỂU ĐỒ THỐNG KÊ LOẠI TIN XEM',
                       'width':1050,
                       'height':700};
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load('visualization', '1.0', {'packages':['corechart']});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['Việt Nam',7 ],
          ['Thế Giới',2 ],
          
        ]);
        var options = {'title':'BIỂU ĐỒ THỐNG KÊ THEO KHU VỰC',
                       'width':1050,
                       'height':700};
        var chart = new google.visualization.PieChart(document.getElementById('chart_div1'));
        chart.draw(data, options);
      }
    </script>

   
  </head>
  <body>
    <div id="chart_div" style="margin-left: 250px; float: left;"></div>
    <div id="chart_div1" style="margin-left: 250px;float: left;"></div>
  </body>
</html>
@endsection

