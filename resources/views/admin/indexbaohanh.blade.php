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
                                            <body>
                                            <h3>Danh sách phiếu bảo hành</h3><br>
                                            <table>
                                               
                                              <tr>
                                                <th>ID</th>
                                                <th>Mã sản phẩm riêng</th>
                                                <th>Mã sản phẩm</th>
                                                <th>IMEI</th>
                                                <th>Chức năng</th>
                                              </tr>
                                              @foreach ($baohanh as $product)
                                               <tr>
                                                <td>{{$product->mabh}}</td>
                                                <td>{{$product->maspr}}</td>
                                                <td>{{$product->masp}}</td>
                                                <td>{{$product->imei}}</td>
                                                <td>
                                                    <button class="button button1" href="
                                                    {{-- {{ route('admin.indexbaohanh.edit', $product->id) }} --}}
                                                    ">Sửa</button>
                                                    
                                                    <form method="POST" action="
                                                    {{-- {{ route('admin.indexbaohanh.destroy', $product->id) }} --}}
                                                    " style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                    
                                                   
                                                    <button class="button button2" type="submit" onclick="return confirm('Are you sure you want to delete this product?')">Xóa</button>
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
                            @csrf
                            </form> 
                          
                        </div>
            </div>
        </div>
    </div>
    @include('admin.script')