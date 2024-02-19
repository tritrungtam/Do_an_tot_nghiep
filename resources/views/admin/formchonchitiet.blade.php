@include('admin.head')
<div class="page-container">
@include('admin.sidebar')
<div class="main-content">
            <!-- header area start -->
            @include('admin.headerarea')
            <div class="main-content-inner">
            {{-- @include('sweetalert::alert') --}}
                            <!-- Textual inputs start -->
                            
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="header-title">Chỉnh sửa thông tin riêng của sản phẩm</h3>
                                      
                                        
                                        @include('alert')
                                        <table> 
                                              <tr>                                                
                                                <th>ID</th>
                                                <th>Tên sản phẩm</th>
                                                <th>Thương hiệu</th> 
                                                                                         
                                                <th>Ngày thêm sản phẩm</th>
                                                <th>Chức năng</th>                                               
                                              </tr>
                                              @foreach($listSanpham as $Sanpham)    
                                               <tr>                                              
                                                <td>{{$Sanpham->id}}</td>
                                                <td>{{$Sanpham->tensp}}</td>
                                                <td>{{$Sanpham->thuonghieu}}</td>  
                                                                                      
                                                <td>{{$Sanpham->created_at}}</td>                                               
                                                <td>
                                                    <form method="GET" action="{{route('xoactsprct',['id'=>$Sanpham->id])}}" style="display: inline;">
                                                        @csrf

                                                    <button class="btn button22" type="submit" onclick="return confirm('Are you sure you want to delete this product?')">Xóa</button>
                                                    </form>
                                                
                                                    <form method="GET" action="{{route('suactsprct',['id'=>$Sanpham->id])}}" style="display: inline;">
                                                        @csrf

                                                    <button class="btn button11" type="submit">Sửa</button>
                                                    </form>
                                                </td>
                                              </tr>
                                              @endforeach
                                            </table>
                                        
                                        </select>

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
                                            
                                            .button22 {
                                              background-color: white; 
                                              color: black; 
                                              border: 2px solid #ff0000;
                                            }
                                            
                                            .button22:hover {
                                              background-color: #ff0000;
                                              color: white;
                                            }
                                            
                                        </style>

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
                                                cell1.innerHTML = "<input type='number' required name='bonhotrong[]' value='' />";
                                                cell2.innerHTML = "<input type='number' required name='ram[]' value='' />";
                                                cell3.innerHTML = "<input type='text' required name='mau[]' value='' />";
                                                cell4.innerHTML = "<input type='number' required name='gia[]' value='' />";
                                                cell5.innerHTML = "<input type='number' required name='soluong[]' value='' />";
                                                cell5.innerHTML = "<input type='number' required name='soluong[]' value='' />";
                                                cell6.innerHTML = "<button type='button'  onclick='deleterow(this)'>x</button>";
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
                          
                        </div>
            </div>
        </div>
    </div>
    @include('admin.script')