@extends('admin.layout.index')

@section('content')
<script src="admin_asset/dist/js/extra.js"></script>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header" style="text-align: center;color: #ccc222;">Loại Tin
                            <small style="color: #ccc222">> Danh Sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="clearfix"></div>
                    @if(session('message'))
                        <div class="alert alert-success">
                            <strong>{{ session('message') }}</strong>
                        </div>
                    @endif
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
                                            @foreach($loaitin as $chitiet)
                                                <div class="col-sm-3">
                                                    <div class="single-item">
                                                        <div class="single-item-header">
                                                            {{ $chitiet->id }}
                                                        </div>
                                                        <div class="single-item-body">
                                                            {{ $chitiet->Ten }}
                                                        </div>
                                                       <!--  <div class="single-item-body">
                                                            {{ $chitiet->TenKhongDau }}
                                                        </div> -->
                                                        <div class="single-item-caption">
                                                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/loaitin/xoa/{{$chitiet->id}}"> Xóa</a></td>
                                                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/loaitin/sua/{{ $chitiet->id}}">Sửa</a></td>
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
                     <!-- <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th class="text-center">ID</th>
                                <th class="text-center">Tên Loại Tin</th>
                                <th class="text-center">Tên Không Dấu</th>
                                <th class="text-center">Tên Thể Loại</th>
                                <th class="text-center">Sửa</th>
                                <th class="text-center">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($loaitin as $chitiet)
                                <tr class="odd gradeX" align="center">
                                    <td>{{ $chitiet->id }}</td>
                                    <td>{{ $chitiet->Ten }}</td>
                                    <td>{{ $chitiet->TenKhongDau }}</td>
                                    <td>{{ $chitiet->TheLoai->Ten }}</td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i><a href="admin/loaitin/sua/{{ $chitiet->id }}">Sửa</a></td>
                                    <td class="center">
                                        <i class="fa fa-trash-o fa-fw"></i>
                                        <input type="hidden" class="hiddenID" value="{{ $chitiet->id }}">

                                        <a href="#" class="btnDel" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#myModal{{$chitiet->id}}">Xóa</a>
                                        
                                        <div style="text-align: left;" id="myModal{{$chitiet->id}}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Xác Nhận</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Bạn muốn xóa Loại Tin: "{{$chitiet->Ten}}"?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" data-casetype="loaitin" class="btn btn-default btnConf">Có</button>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Không</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table> --> 
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

        <!-- Modal -->
        <!-- Modal -->

@endsection