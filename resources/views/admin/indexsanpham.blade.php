@include('admin.head')
<div class="page-container">
@include('admin.sidebar')
<div class="main-content">
            <!-- header area start -->
           @include('admin.headerarea')
            <!-- page title area end -->
            <div class="main-content-inner">
            
                            <!-- Textual inputs start -->
                           
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">

                                        @include('alert')

                                        
                                            </head>
                                            <body>
                                            
                                            <h4>Danh sách Sản Phẩm</h4>

                                            @if (session('message'))
                                            <span class ="aler alert-safe">
                                            <strong> {{session('message')}}</strong>
                                            </span>
                                            @endif
                                            <table>
                                              <tr>
                                                <th>STT</th>
                                                <th>ID</th>
                                                <th>Tên sản phẩm</th>
                                                <th>Ảnh sản phẩm</th>
                                                <th>Thương hiệu</th>
                                                <th>Ngày thêm sản phẩm</th>
                                                <th>Trạng thái & Khuyến mãi</th>
                                                <th>Chức năng</th>
                                              </tr>
                                              @foreach ($sp as $product)
                                               <tr>
                                                <td>{{++$i}}</td>
                                                <td>{{$product->id}}</td>
                                                <td>{{$product->tensp}}</td>
                                                <td><img src="{{asset('images/404/'. $product->anhbia)}}" id="anhbia" alt="" /></td>
                                                <td>{{$product->thuonghieu}}</td>                                             
                                                <td>{{$product->created_at}}</td>
                                                <td>
                                                
                                                  @if( $product->trangthai==1)
                                                
                                                  <a href="{{URL::to('admin/an/'.$product->id)}}" class=" btn-default "><i class="fa fa-shopping-cart"></i>>Hoạt động</a>
                                                  @else
                                               
                                                  <a href="{{URL::to('admin/hien/'.$product->id)}}" class=" btn-default1 "><i class="fa fa-shopping-cart"></i>>Không hoạt động</a>
                                                  @endif
                                                  <br>
                                             
                                                <select name="tenkm">
                                                  @foreach($chon as $c)
                                                  <option value="{{$c->tenkm}}" >{{$c->tenkm}}</option>
                                                  @endforeach
                                                </select>
                                                    
                                                  
                                                    
                                                 
                                                </td>

                                                <td>
                                                  <form method="POST" action="{{route('deletesanpham',['id' => $product->id])}} " style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')   
                                                  <a class="button button1" href="{{ route('editsanpham', ['id' => $product->id]) }}">Sửa</a>
                                              
                                                    <br>
                                                   
                                                    
                                                   
                                                      <button class="button button2"  onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm {{ $product->tensp }}?')"> Xóa</button>
                                                   
                                                   
                                                  </form>
                                                  
                                                  <br><a href="{{URL::to('admin/productdetail/'.$product->id)}}" class=" btn-default "><i class="fa "></i>Chi tiết</a>
                                                </td>
                                                

                                              </tr>
                                              @endforeach
                                            </table>
                                           
                                            <style>
                                              .btn-default1{
                                                border: none;
                                                color: rgb(233, 0, 0);
                                               
                                              }
                                              .button {
                                                border: none;
                                                color: white;
                                                padding: 7px 14px;
                                                text-align: center;
                                                text-decoration: none;
                                                display: inline-block;
                                                font-size: 13px;
                                                margin: 2px 1px;
                                                transition-duration: 0.4s;
                                                cursor: pointer;
                                              }
                                              
                                              .button1 {
                                                background-color: white; 
                                                color: rgb(0, 0, 0); 
                                                border: 2px solid #4CAF50;
                                              }
                                              
                                              .button1:hover {
                                                background-color: #4CAF50;
                                                color: rgb(255, 255, 255);
                                              }
                                              
                                              .button2 {
                                                background-color: white; 
                                                color: black; 
                                                border: 2px solid #ff0000;
                                              }
                                              
                                              .button2:hover {
                                                background-color: #ff0000;
                                                color: white;
                                              }
                                              .button11 {
                                                background-color: white; 
                                                color: black; 
                                                border: 2px solid #4516ff;
                                              }
                                              
                                              .button11:hover {
                                                background-color: #1100d2;
                                                color: white;
                                              }  
                                          </style>
                                          
                                    </div>

                                    {{$sp->links()}}
                                    <style>
                                              table {
                                                font-family: arial, sans-serif;
                                                border-collapse: collapse;
                                                width: 100%;
                                              }
                                              
                                              td, th {
                                                border: 1px solid #dddddd;
                                                text-align: left;
                                                padding: 8px;
                                              }
                                              
                                              tr:nth-child(even) {
                                                background-color: #dddddd;
                                              }
                                              #anhbia{
                                                weight: 100px;
                                                height: 100px;
                                              }
                                      </style>
                                      
                                        
                                </div>
                               



                            </div>
                        
                          
                          
                        </div>
            </div>
        </div>
    </div>
    @include('admin.script')
    