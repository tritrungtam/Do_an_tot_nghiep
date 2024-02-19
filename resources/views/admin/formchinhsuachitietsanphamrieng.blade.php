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
                            <form action="{{route('Suachitiet')}}" method="post" enctype="multipart/form-data">
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
                                            <label for="example-tel-input" class="col-form-label">Sản phẩm: {{$Hienthi->tensp}}</label>                              
                                        </div>
                                        </select>
                                        
                                       
                                        <table id="myTable">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Bộ nhớ trong</th>
                                            <th>Ram</th>
                                            <th>Màu</th>
                                            <th>Giá</th>
                                            <th>Số Lượng</th>
                                            <th></th>
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
                                            </tr>
                                        @endforeach

                                        <!-- Thêm các dòng khác tại đây nếu cần -->
                                        </tbody>
                                        
                                    </table>
                                             <!-- <a onclick="addRow()">+</a> -->
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
                                        <div><button type="submit" class="btn button11"> Sửa</button></div>
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
                                                color: #696969;
                                                box-sizing: border-box; 
                                            }
                                            .button11 {
                                              background-color: white; 
                                              color: black; 
                                              border: 2px solid #2908ff;
                                            }
                                            
                                            .button11:hover {
                                              background-color:  #2908ff;
                                              color: white;
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