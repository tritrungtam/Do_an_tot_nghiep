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
                            <form action="{{route('them-moi-sp')}}" method="post" enctype="multipart/form-data">
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Them san pham</h4>
                                        @if (session('message'))
                                            <span class ="aler alert-safe">
                                            <strong> {{session('message')}}</strong>
                                            </span>
                                            @endif
                                        @include('alert')
                                        <!-- <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">ma san pham</label>
                                            <input class="form-control" type="text" required placeholder="" id="example-text-input" name="masp">
                                        </div> -->
                                       
                                        
                                        <div class="form-group">
                                            <label for="example-tel-input" class="col-form-label">Hinh anh</label>
                                            <input class="form-control" type="file" multiple required id="example-tel-input"name="file[]">
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
                                        <div><button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Them moi sp</button></div>
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