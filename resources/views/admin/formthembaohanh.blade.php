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
                            <form action="{{route('form-them-moi-phieu-bao-hanh')}}" method="post" enctype="multipart/form-data">
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Them bao hanh</h4>
                                        @if (session('message'))
                                            <span class ="aler alert-safe">
                                            <strong> {{session('message')}}</strong>
                                            </span>
                                            @endif
                                        @include('alert')
                                       
                                       
                                        
                                        <div class="form-group">
                                            <label for="example-url-input" class="col-form-label">Họ tên khách hàng:</label>
                                            <input class="form-control" type="text"  id="example-url-input" name="hotenkh">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-url-input" class="col-form-label">Địa chỉ:</label>
                                            <input class="form-control" type="text"  id="example-url-input" name="diachi">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-url-input" class="col-form-label">Ngày tạo phiếu:</label>
                                            <input class="form-control" type="date"  id="example-url-input" name="ngaytaophieu">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-url-input" class="col-form-label">Tình trạng sản phẩm:</label>
                                            <input class="form-control" type="text"  id="example-url-input" name="tinhtrang">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-tel-input" class="col-form-label">imei</label>
                                            <input class="form-control" type="text"  id="example-tel-input"name="imei">
                                        </div>
                                       
                                        
                                      
                                        <!-- <div class="form-group">
                                            <label class="col-form-label">Select</label>
                                            <select class="form-control">
                                                <option>Select</option>
                                                <option>Large select</option>
                                                <option>Small select</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">Custom Select</label>
                                            <select class="custom-select">
                                                <option selected="selected">Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input-lg" class="col-form-label">Large</label>
                                            <input class="form-control form-control-lg" type="text" placeholder=".form-control-lg" id="example-text-input-lg">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input-sm" class="col-form-label">Small</label>
                                            <input class="form-control form-control-sm" type="text" placeholder=".form-control-sm" id="example-text-input-sm">
                                        </div>
                                        <div class="form-group has-primary">
                                            <label for="inputHorizontalPrimary" class="col-form-label">Email</label>
                                            <input type="email" class="form-control form-control-primary" id="inputHorizontalPrimary" placeholder="name@example.com">
                                            <div class="form-control-feedback">Primary! You've done it.</div>
                                            <small class="form-text text-muted">Example help text that remains unchanged.</small>
                                        </div>
                                        <div class="form-group has-warning">
                                            <label for="inputHorizontalWarning" class="col-form-label">Email</label>
                                            <input type="email" class="form-control form-control-warning" id="inputHorizontalWarning" placeholder="name@example.com">
                                            
                                        <div class="form-group mb-0 has-danger">
                                            <label for="inputHorizontalDnger" class="col-form-label">pict</label>
                                            <input type="file" class="form-control form-control-danger" id="inputHorizontalDnger" placeholder="name@example.com">
                                             -->
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
              
                        </div>
            </div>
        </div>
    </div>
    @include('admin.script')