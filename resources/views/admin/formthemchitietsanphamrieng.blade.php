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
                            <form action="{{route('themspr')}}" method="post" enctype="multipart/form-data">
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="header-title">Thêm sản phẩm riêng</h3>
                                        @if (session('message'))
                                            <span class ="aler alert-safe">
                                            <strong> {{session('message')}}</strong>
                                            </span>
                                        @endif
                                        @include('alert')
                                        
                                        <select name="tensp">
                                        @foreach($listsanpham as $Sanpham)
                                        <option value="{{$Sanpham->tensp}}" >{{$Sanpham->tensp}}</option>
                                        @endforeach
                                       
                                        </select>
                                        
                                       
                                        <table id="myTable">
                                        <thead>
                                        <tr>
                                            <th>Bộ nhớ trong</th>
                                            <th>Ram</th>
                                            <th>Màu</th>
                                            <th>Giá</th>
                                            <th>Số Lượng</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><input type="number" required  name="bonhotrong[]"></td>
                                            <td><input type="number" required name="ram[]"></td>
                                            <td><input type="text" required name="mau[]"></td>
                                            <td><input type="number" required name="gia[]"></td>
                                            <td><input type="number" required name="soluong[]"></td>
                                            <td><button class="btn button11" type="button" onclick="deleterow(this)">Xóa</button></td>
                                        </tr>
                                      
                                        <!-- Thêm các dòng khác tại đây nếu cần -->
                                        </tbody>
                                        </table>
                                                <div><button type="" onclick="addRow()" class="btn button12"> Thêm dòng</button></div>                       
                                             {{-- <a onclick="addRow()">+</a> --}}
                                             
                                        <div><button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Hoàn thành</button></div>
                                       
                                        <script>
                                           function addRow() {
                                                // Get table
                                                var table = document.getElementById("myTable");
                                                // Create new row
                                                var newRow = table.insertRow(-1);
                                                // Add input cells to row
                                                var cell1 = newRow.insertCell(0);
                                                var cell2 = newRow.insertCell(1);
                                                var cell3 = newRow.insertCell(2);
                                                var cell4 = newRow.insertCell(3);
                                                var cell5 = newRow.insertCell(4);
                                                var cell6 = newRow.insertCell(5);
                                                // Add input elements to cells
                                                cell1.innerHTML = "<input type='text' required name='bonhotrong[]' value='' />";
                                                cell2.innerHTML = "<input type='text' required name='ram[]' value='' />";
                                                cell3.innerHTML = "<input type='text' required name='mau[]' value='' />";
                                                cell4.innerHTML = "<input type='number' required name='gia[]' value='' />";
                                                cell5.innerHTML = "<input type='number' required name='soluong[]' value='' />";
                                              
                                                cell6.innerHTML = "<button type='button' class='btn button11'  onclick='deleterow(this)'>Xóa</button>";
		                                        }
                                                function deleterow(btn){
                                                    
                                                    var inputs = document.querySelectorAll('input[name="bonhotrong[]"]');
                                                    var count = inputs.length;
                                                    if(count === 1)
                                                    {

                                                    }
                                                    else
                                                    {
                                                        btn.parentElement.parentElement.remove();
                                                    }
                                                    
                                                }
                                        </script>
                                        <style>
                                           
                                              .button12 {
                                              background-color: rgb(255, 255, 255); 
                                              color: black; 
                                              border: 2px solid rgb(0, 179, 195);
                                            }
                                            
                                            .button12:hover {
                                              background-color:   rgb(0, 179, 195);
                                              color: white;
                                            }
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
                                                color: rgb(82, 82, 83);
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
                                            
                                            th {
                                                background-color: #f2f2f2;
                                                color: #000000;
                                                font-weight: bold;
                                            }
                                            
                                            tr:nth-child(even) {
                                                background-color: #f2f2f2;
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
                                            button[type=submit] {
                                                border: none;
                                                background-color: #1403ac;
                                                color: #ffffff;
                                                padding: 8px 16px;
                                                border-radius: 4px;
                                                cursor: pointer;
                                            }
                                            
                                            button[type=submit]:hover {
                                                background-color: #3f53ff;
                                                color: #000000;
                                            }

                                            
                                    
                                            
                                            .button11 {
                                              background-color: white; 
                                              color: black; 
                                              border: 2px solid #ff0000;
                                            }
                                            
                                            .button11:hover {
                                              background-color: #ff0000;
                                              color: white;
                                            }

                                        </style>
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