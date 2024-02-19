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
            @include('sweetalert::alert')
                            <!-- Textual inputs start -->
                           
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="header-title">Chỉnh sửa chi tiết sản phẩm riêng</h3>
                                        @if (session('message'))
                                            <span class ="aler alert-safe">
                                            <strong> {{session('message')}}</strong>
                                            </span>
                                            @endif
                                        @include('alert')
                                        
                                        <div class="form-group">
                                            <h5>Sản phẩm: {{$Hienthi->tensp}}</h5>
                                            
                                        </div>
                                        </select>
                                        
                                        <style>
                                            select {
                                                font-family: Arial, sans-serif;
                                                font-size: 16px;
                                                color: #333;
                                                padding: 10px;
                                                max-width: 480px;
                                                width: 480px;
                                                }

                                                select option {
                                                padding: 10px;
                                                }

                                                /* Khi danh sách được mở ra */
                                                select:focus {
                                                outline: none;
                                                box-shadow: 0 0 10px #719ECE;
                                                border: 1px solid #719ECE;
                                                border-radius: 5px;
                                                }
                                                
                                        </style>
                                        <table id="myTable">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Bộ nhớ trong</th>
                                            <th>Ram</th>
                                            <th>Màu</th>
                                            <th>Giá</th>
                                            <th>Số Lượng</th>
                                            <th>Xóa</th>
                                        </tr>
                                        </thead>
                                        
                                        <tbody>
                                        @foreach($listspr as $chitietsprieng)
                                            <tr>
                                                
                                                <td><input type="number" readonly name="id[]" value="{{$chitietsprieng->id}}"></td>
                                                <td><input type="number" readonly name="bonhotrong[]" value="{{$chitietsprieng->bonhotrong}}"></td>         
                                                <td><input type="number" readonly name="ram[]" value="{{$chitietsprieng->ram}}"></td>
                                                <td><input type="text"  readonly name="mau[]" value="{{$chitietsprieng->mau}}"></td>
                                                <td><input type="number" required name="gia[]" value="{{$chitietsprieng->gia}}"></td>
                                                <td><input type="number" required name="soluong[]" value="{{$chitietsprieng->soluong}}"></td>
                                                <form method="GET" action="{{route('xoa1dong',['id'=> $chitietsprieng->id])}}">
                                                <td><button class="btn button11" type="submit" onclick="">Xóa</button></td>
                                                
                                                </form>
                                               
                                            </tr>
                                        @endforeach

                                        <!-- Thêm các dòng khác tại đây nếu cần -->
                                        </tbody>
                                        
                                    </table>

                                             <style>
                                                a {
                                                    font-size: 20px;
                                                    font-weight: bold;
                                                }
                                                a:hover {
                                                font-size: 30px;
                                                color: red;
                                                cursor: pointer;
                                                }
                                               
                                                a:link {
                                                color: blue;
                                                }
                                                a:visited {
                                                color: purple;
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
                                            
                                            input[type=text] {
                                                width: 100%;
                                                border-radius: 4px;
                                                padding: 8px 16px;
                                                border-radius: 1px;
                                                background-color: #f2f2f2;
                                                font-size: 16px;
                                                color: #696969;
                                                box-sizing: border-box;
                                            }
                                            input[type=number] {
                                                width: 100%;
                                                border-radius: 4px;
                                                padding: 8px 16px;
                                                border-radius: 1px;
                                                background-color: #f2f2f2;
                                                font-size: 16px;
                                                color: #000000;
                                                box-sizing: border-box;
                                                

                                            }
                                            button[type=submit] {
                                                border: none;
                                                background-color: #ff0000;
                                                color: #ffffff;
                                                padding: 8px 16px;
                                                border-radius: 4px;
                                                cursor: pointer;
                                            }
                                            
                                            button[type=submit]:hover {
                                                background-color: #f2f2f2;
                                                color: #ff0000;
                                            }

                                        </style>
                                         <style>
                                            .btn {
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
                                            
                                            .button11 {
                                              background-color: white; 
                                              color: black; 
                                              border: 2px solid #4CAF50;
                                            }
                                            
                                            .button11:hover {
                                              background-color: #4CAF50;
                                              color: white;
                                            }
                                        </style>
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>
        </div>
    </div>
    @include('admin.script')