@extends("Admin.AdminPublic.adminpublic")
@section("admin")
<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i> 列表</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
      <form action="/adminuser" method="get">
      <div class="dataTables_filter" id="DataTables_Table_1_filter">
      <label>搜索名字: <input type="text" name="keywords"  aria-controls="DataTables_Table_1" /><input type="submit" value="搜索"></label>
      <label>搜索邮箱: <input type="text" name="keywordss"  aria-controls="DataTables_Table_1" /><input type="submit" value="搜索"></label>
     </div>

      </form>
    
     <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
      <thead> 
       <tr role="row">
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 140px;">ID</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 192px;">名字</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 179px;">邮箱</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 120px;">状态</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 120px;">添加时间</th>
          <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 120px;">修改时间</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 87px;">操作</th>
       </tr> 
      </thead> 
      <tbody role="alert" aria-live="polite" aria-relevant="all">
        @foreach($user as $row)
       <tr class="odd"> 
        <td class="  sorting_1">{{$row->id}}</td> 
        <td class=" ">{{$row->name}}</td> 
        <td class=" ">{{$row->email}}</td>
        <td class=" ">{{$row->status}}</td> 
        <td class=" ">{{$row->created_at}}</td> 
        <td class=" ">{{$row->updated_at}}</td> 
        
        <td class=" ">
          <a href="/userinfo/{{$row->id}}" class="btn btn-success">会员详情列表</a>
          <a href="/useraddress/{{$row->id}}" class="btn btn-success">获取收货地址</a>
          <form action="/adminuser/{{$row->id}}" method="post">
            {{csrf_field()}}
            {{method_field("DELETE")}}
          <button class="btn btn-success" type="submit"><i class="icon-trash"></i></button>
        </form>
          <a class="btn btn-info"  href="/adminuser/{{$row->id}}/edit"><i class="icon-wrench"></i></a></td> 
     @endforeach
      </tbody>
     </table>
 
     <div class="dataTables_paginate paging_full_numbers" id="pages">
      {{$user->appends($request)->render()}}
     </div>
    </div> 
   </div> 
  </div>
 </body>
</html>
@endsection
@section("title","后台用户列表")