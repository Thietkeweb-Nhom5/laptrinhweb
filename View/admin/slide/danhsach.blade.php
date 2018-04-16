 @extends('admin.layout.index')
 @section('content')
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Slide
                            <small> Danh sách</small>
                        </h1>
                    </div>

                     @if(session('thongbao'))
                       <div class="alert alert-success">
                             {{session('thongbao')}}
                       </div>
                    @endif
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th> Tên</th>
                                <th> Nội dung</th>
                                <th>Hình</th>
                                <td>link</td>
                                <th>Xóa </th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                     

                       @foreach($slide as $sl)
                            <tr class="odd gradeX" align="center">
                                <td>{{$sl->id}} </td>
                                <td>{{$sl->Ten}} </td>
                                <td>{!!html_entity_decode($sl->NoiDung)!!}</td>
                                <td>
                                    <img width="400px" height="200px" src="upload/slide/{{$sl->Hinh}}">
                                </td>
                                <td>{{$sl->link}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/slide/xoa/{{$sl->id}}"> Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/slide/sua/{{$sl->id}}">Sửa</a></td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
 </div>
 @endsection