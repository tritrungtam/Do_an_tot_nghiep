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
                                            <h4>Các sản phẩm</h4>
                                            <table>
                                              <tr>                                              
                                                <th>ID</th>
                                                <th>Tên sản phẩm</th>
                                                <th>Màu</th>
                                                <th>Bộ nhớ trong</th>
                                                <th>Ram</th>
                                                <th>Số lượng</th>
                                                <th>Giá</th>
                                              </tr>
                                              @foreach($lay1spr as $Sanpham)   
                                               <tr>
                                                <td>{{$Sanpham->id}}</td>
                                                <td>{{$lay1sp->tensp}}</td>
                                                <td>{{$Sanpham->mau}}</td>
                                                <td>{{$Sanpham->bonhotrong}}  </td>  
                                                <td>{{$Sanpham->ram}}  </td> 
                                                <td>
                                                @if($Sanpham->soluong == 0 )
                                                 <p style="color:rgb(255, 9, 9);"> {{$Sanpham->soluong}}</p>    
                                                @else
                                                <p style="color:rgb(70, 19, 255);"> {{$Sanpham->soluong}}</p>           
                                                @endif   
                                                </td>                                   
                                                <td>{{$Sanpham->gia}}</td>
                                                
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
                                    
                                   
                                    <div class="card-body">
                                     
                                     
                                      <table>
                                        <tr>
                                            <th colspan="2">Thông số kỹ thuật</th>
                                        </tr>
                                        <tr>
                                            <td>Thương hiệu</td>
                                            <td>{{$lay1sp->thuonghieu}}</td>
                                        </tr>
                                        <tr>
                                            <td>Hệ điều hành</td>
                                            <td>{{$lay1spc->hedieuhanh}}</td>
                                        </tr>
                                        <tr>
                                            <td>Kích thước màn hình</td>
                                            <td>{{$lay1spc->ktmanhinh}}</td>
                                        </tr>
                                        <tr>
                                            <td>Công nghệ màn hình</td>
                                            <td>{{$lay1spc->cnmanhinh}}</td>
                                        </tr>
                                        <tr>
                                            <td>Tính năng màn hình</td>
                                            <td>{{$lay1spc->tinhnangmanhinh}}</td>
                                        </tr>
                                        <tr>
                                            <td>Độ phân giải</td>
                                            <td>{{$lay1spc->dophangiai}}</td>
                                        </tr>
                                        <tr>
                                          <td>Tần số quét</td>
                                          <td>{{$lay1spc->tansoquet}}</td>
                                      </tr>
                                      <tr>
                                          <td>Camera sau</td>
                                          <td>{{$lay1spc->camerasau}}</td>
                                      </tr>
                                      <tr>
                                          <td>Quay video</td>
                                          <td>{{$lay1spc->quayvideo}}</td>
                                      </tr>
                                      <tr>
                                          <td>Camera trước</td>
                                          <td>{{$lay1spc->cameratruoc}}</td>
                                      </tr>
                                      <tr>
                                          <td>Quay video trước</td>
                                          <td>{{$lay1spc->quayvideotruoc}}</td>
                                      </tr>
                                      <tr>
                                          <td>Thẻ SIM</td>
                                          <td>{{$lay1spc->thesim}}</td>
                                      </tr>
                                      <tr>
                                          <td>Hỗ trợ mạng</td>
                                          <td>{{$lay1spc->hotromang}}</td>
                                      </tr>
                                      <tr>
                                          <td>Wifi</td>
                                          <td>{{$lay1spc->wifi}}</td>
                                      </tr>
                                      <tr>
                                          <td>GPS</td>
                                          <td>{{$lay1spc->gps}}</td>
                                      </tr>
                                      <tr>
                                          <td>Kích thước</td>
                                          <td>{{$lay1spc->kichthuoc}}</td>
                                      </tr>
                                      <tr>
                                          <td>Trọng lượng</td>
                                          <td>{{$lay1spc->trongluong}}</td>
                                      </tr>
                                      <tr>
                                          <td>Cổng sạc</td>
                                          <td>{{$lay1spc->congsac}}</td>
                                      </tr>
                                      <tr>
                                          <td>Pin</td>
                                          <td>{{$lay1spc->pin}}</td>
                                      </tr>
                                      <tr>
                                          <td>Thời điểm ra mắt</td>
                                          <td>{{$lay1spc->thoidiemramat}}</td>
                                      </tr>
                                    </table>
                                    <br>
                                    <h5>Mô tả</h5>
                                    <h6>{{$lay1spc->mota}}</h6>
                                    
                                    </div>
                              
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
    