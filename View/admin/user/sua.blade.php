 @extends('admin.layout.index')
 @section('content')
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Thêm</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                     @if(count($errors)>0)
                    <div class="alert alert-danger">
                      @foreach($errors->all() as $err)
                           {{$err}}<br>
                      @endforeach
                      </div>
                     @endif

                    @if(session('thongbao'))
                       <div class="alert alert-success">
                             {{session('thongbao')}}
                       </div>
                    @endif
                        <form action="admin/user/sua/{{$user->id}}" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}} " />
                            <div class="form-group">
                                <label>Họ Tên</label>
                                <input class="form-control" name="Ten" placeholder="Nhập tên người dùng" value="{{$user->name}}" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="Email" placeholder="Nhập email người dùng" value="{{$user->email}}" readonly="" />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="changepass" id="changepass">
                                <label>Đổi Password</label>
                                <input class="form-control password" type="password" name="Password" placeholder="Nhập mật khẩu người dùng" value="{{$user->password}}" disabled="" />
                            </div>
                             <div class="form-group">
                                <label> Nhập lại Password</label>
                                <input class="form-control password" type="password" name="Password1" placeholder=" Nhập lại mật khẩu người dùng" disabled="" />
                            </div>
                            <div class="form-group">
                                <label>Quyền người dùng</label>
                                <label class="radio-inline">
                                    <input type="radio" name="Quyen" value="0"
                                     @if($user->quyen==0)
                                     {{"checked"}}
                                     @endif
                                  >Người dùng
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="Quyen" value="1"
                                      @if($user->quyen==1)
                                      {{"checked"}}
                                      @endif
                                    >Admin
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->



                       <div class="row">
                    <div class="col-lg-12">
                     @if(session('thongbao2'))
                       <div class="alert alert-success">
                             {{session('thongbao2')}}
                       </div>
                    @endif
                        <h1 class="page-header">User
                            <small>Chat</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                   
                    <table class="table table-striped table-bordered table-hover" >
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th> Người đăng</th>
                                <th> Nội dung</th>
                                <th> Ngày đăng </th>
                                <th> Xóa </th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($chat as $ch)
                        @if($ch->type==0)
                            <tr class="odd gradeX" align="center" style="color: blue">
                                <td>{{$ch->id}}</td>
                                <td>{{$ch->user->name}}</td>
                                <td>{{$ch->noidung}} </td>
                                <td>{{$ch->created_at}} </td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="binhluan/xoa/{{$ch->id}}/{{$user->id}}"> Xóa </a></td>
                            </tr>
                        @else
                            <tr class="odd gradeX" align="center" >
                                <td>{{$ch->id}}</td>
                                <td>Admin-{{$ch->user->name}}</td>
                                <td>{{$ch->noidung}} </td>
                                <td>{{$ch->created_at}} </td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="binhluan/xoa/{{$ch->id}}/{{$user->id}}"> Xóa </a></td>
                            </tr>
                        @endif
                        @endforeach
                        </tbody>
                        <tbody>
                        </tbody>
                    </table>
                    <a href="binhluan/traloi/{{$user->id}}/{{$us->id}}"><span style="font-weight: bold;color: red;padding-left: 20px;font-size: 20px">Trả lời</span></a>
                
                </div>


                

            </div>
            <!-- /.container-fluid -->
 </div>
 @endsection

 @section('script')
  <script type="text/javascript" src="a.js"></script>
       <script>
    $(document).ready(function() {
        $("#changepass").change(function(){
            if($(this).is(":checked")){
                $(".password").removeAttr('disabled');
            }
            else{
                $(".password").attr('disabled','');
            }

        });
      });
    </script>
    @endsection