@include('admin.head')
<div class="page-container">
@include('admin.sidebar')

<div class="main-content">
            <!-- header area start -->
            @include('admin.headerarea')
            <!-- header area end -->
            <!-- page title area start -->
            
            <!-- page title area end -->
            <div class="main-content-inner">
            
                            <!-- Textual inputs start -->
                            <form action="{{route('index-tai-khoan')}}" method="post" enctype="multipart/form-data">
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        {{-- <h4 class="header-title">Danh sách phiếu bảo hành</h4> --}}
                                        @if (session('message'))
                                            <span class ="aler alert-safe">
                                            <strong> {{session('message')}}</strong>
                                            </span>
                                            @endif
                                        @include('alert')

                                       
                                            </head>
                                            <body>
                                            
                                            <h3>Danh sách khuyến mãi</h3><br>    
                                            
                                            <table>
                                               
                                              <tr>
                                                
                                                <th>Mã khuyến mãi</th>
                                                <th>Tên khuyến mãi</th>
                                                <th>Mô tả</th>
                                                <th>Phần trăm</th>
                                                <th>Ngày Bắt Đầu</th>
                                                <th>Ngày Kết Thúc
                                                <th>Trạng thái</th>
                                                
                                                <th>Chức năng</th>
                                              </tr>
                                              @foreach ($khuyenmai as $product)
                                               <tr>
                                                <td>{{$product->id}}</td>
                                                <td>{{$product->tenkm}}</td>
                                                <td>{{$product->mota}}</td>
                                               
                                                <td>{{$product->phantram}}</td>
                                                <td>{{$product->ngaybatdau}}</td>
                                                <td>{{$product->ngayketthuc}}</td>
                                                <td>
                                                  @if($product->trangthai == 0 )
                                                   <p style="color:rgb(255, 9, 9);"> Đã hết hạn</p>    
                                                  @else
                                                  <p style="color:rgb(70, 19, 255);"> Còn hạn </p>           
                                                  @endif   
                                                  </td> 
                                                  
                                                  <td>
                                                    <form method="POST" action="{{route('deletekm',['id' => $product->id])}} " style="display: inline;">
                                                      @csrf 
                                                      @method('DELETE')    
                                                    <a class="button button1" href="{{ route('editkm', ['id' => $product->id]) }}">Sửa</a> 

                                                   
                                                     
                                                      
                                                     
                                                        <button class="button button2"  onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm {{ $product->tenkm }}?')"> Xóa</button>
                                                     
                                                     
                                                    </form>
                                                    
                                                   
                                                  </td>
                                                
                                              </tr>
                                              @endforeach
                                            </table>
                                            <style>
                                                .button {
                                                  border: none;
                                                  color: white;
                                                  padding: 10px 20px;
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
                                                  color: black; 
                                                  border: 2px solid #4CAF50;
                                                }
                                                
                                                .button1:hover {
                                                  background-color: #4CAF50;
                                                  color: white;
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
                                                
                                            </style>
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
                                                </style>
                                            
                                      
                                    </div>
                                </div>
                            </div>
                            @csrf
                            </form> 
                          
                        </div>
            </div>
        </div>
    </div>
    @include('admin.script')