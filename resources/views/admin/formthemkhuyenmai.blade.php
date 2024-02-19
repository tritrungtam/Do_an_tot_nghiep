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
                            <form action="{{route('form-them-moi-khuyen-mai')}}" method="post" enctype="multipart/form-data">
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Thêm khuyến mãi</h4>
                                        @if (session('message'))
                                            <span class ="aler alert-safe">
                                            <strong> {{session('message')}}</strong>
                                            </span>
                                            @endif
                                        @include('alert')
                                       
                                       
                                        <div class="form-group">
                                            <label for="example-email-input" class="col-form-label">ten khuyen mai</label>
                                            <input class="form-control" type="text"  id="example-email-input" name="tenkm">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-url-input" class="col-form-label">mo ta</label>
                                            <input class="form-control" type="text"  id="example-url-input" name="mota">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-tel-input" class="col-form-label">phan tram</label>
                                            <input class="form-control" type="text"  id="example-tel-input"name="phantram">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-tel-input" class="col-form-label">Ngày bắt đầu:</label>
                                            <input class="form-control" type="date"  id="example-tel-input"name="ngaybatdau">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-tel-input" class="col-form-label">Ngày kết thúc:</label>
                                            <input class="form-control" type="date"  id="example-tel-input"name="ngayketthuc">
                                        </div>
                                       
                                      
                                       
                                        <div><button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Them moi bao hanh</button></div>
                                        <style>
                                            .card
                                            {
                                                margin-left: 300px;
                                                margin-right: 300px;
                                            }
                                        </style>
                                    </div>
                                </div>
                            </div>
                            @csrf
                            </form> 
                            <!-- Textual inputs end -->
                            <!-- Radios start -->
                        
                            <!-- Radios end -->
                            <!-- Checkboxes start -->
                        
                            <!-- Checkboxes end -->
                            <!-- button with dropdown start -->
                         
                            <!-- button with dropdown end -->
                        </div>
            </div>
        </div>
    </div>
    @include('admin.script')