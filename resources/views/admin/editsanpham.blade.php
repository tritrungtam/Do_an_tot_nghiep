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
                        
                            <form action="{{route('updatesanpham',['id'=> $sanpham->id] )}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">SỬA SẢN PHẨM</h4>
                                        @if (session('message'))
                                            <span class ="aler alert-safe">
                                            <strong> {{session('message')}}</strong>
                                            </span>
                                            @endif
                                        @include('alert')
                                      
                                        <div class="form-group">
                                            <label for="example-email-input" class="col-form-label">Tên sản phẩm</label>
                                            <input class="form-control" values="{{$sanpham->tensp}}" type="text" required id="example-email-input" name="tensp">
                                        </div>                                                                          
                                        <div class="form-group">
                                       
                                        <label for="example-tel-input" class="col-form-label">Thương hiệu</label>

                                        <select name="thuonghieu" id="fruit">
                                        <option selected>Chọn thương hiệu</option>
                                        <option value="APPLE" {{$sanpham->thuonghieu == "APPLE" ? 'selected' : ''}} >APPLE</option>
                                        <option value="SAMSUNG" {{$sanpham->thuonghieu == "SAMSUNG" ? 'selected' : ''}} >SAMSUNG</option>
                                        <option value="HUAWEI" {{$sanpham->thuonghieu == "HUAWEI" ? 'selected' : ''}} >HUAWEI</option>
                                        <option value="XIAOMI" {{$sanpham->thuonghieu == "XIAOMI" ? 'selected' : ''}} >XIAOMI</option>
                                        <option value="OPPO" {{$sanpham->thuonghieu == "OPPO" ? 'selected' : ''}} >OPPO</option>
                                        <option value="LG" {{$sanpham->thuonghieu == "LG" ? 'selected' : ''}} >LG</option>
                                        <option value="SONY" {{$sanpham->thuonghieu == "SONY" ? 'selected' : ''}} >SONY</option>
                                        <option value="LENOVO" {{$sanpham->thuonghieu == "LENOVO" ? 'selected' : ''}} >LENOVO</option>
                                        <option value="HTC" {{$sanpham->thuonghieu == "HTC" ? 'selected' : ''}} >HTC</option>
                                        <option value=" ASUS ROG" {{$sanpham->thuonghieu == " ASUS ROG" ? 'selected' : ''}} > ASUS ROG</option>
                                         
                                        
                                        </select>  
                                        </div>
                                       <style>
                                        select {
                                            width: 100%;
                                        padding: 0.67rem 0.8rem;
                                        font-family: Arial, sans-serif;
                                        font-size: 14px;
                                        color: #333;
                                        border: 1px solid #ccc;
                                        padding: 5px;
                                        border-radius: 5px;
                                        background-color: #fff;
                                       
                                       
                                        
                                        }

                                        option {
                                        font-family: Arial, sans-serif;
                                        font-size: 14px;
                                        color: #333;
                                        background-color: #fff;
                                        }
                                       </style>
                                            <div>
                                                <label for="example-tel-input" class="col-form-label">Ảnh bìa</label>
                                                <label class="picture" for="picture__input" tabIndex="0">
                                                <span class="picture__image"></span>
                                                </label>
    
                                                <input type="file" name="picture__input" id="picture__input">
                                            </div>
                                            
                                            
                                        
                                        
                                        <div class="form-group">
                                                <label for="example-url-input" class="col-form-label">Ảnh sản phẩm</label>
                                                <input class="form-control" type="file" required id="example-url-input" multiple name="anhsanpham[]">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword" class="">Mô tả</label>
                                            <textarea type="text" name="mota" values="{{$sanphamc->mota}}" required class="form-control" placeholder="mota" rows="7"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-tel-input" class="col-form-label">Chipset</label>
                                            <input class="form-control" type="text" values="{{$sanphamc->chipset}}"  id="example-tel-input"name="chipset">
                                        </div>
                                     
                                        <div class="form-group">
                                            <label for="example-tel-input" class="col-form-label">CPU</label>
                                            <input class="form-control" type="text" value="{{$sanphamc->cpu}}" id="example-tel-input"name="cpu">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-tel-input" class="col-form-label">GPU</label>
                                            <input class="form-control" type="text"  values="{{$sanphamc->gpu}}"  id="example-tel-input"name="gpu">
                                        </div>
                                        
                                        
                                      
                                       
                                        <div class="form-group">
                                            <label for="example-url-input" class="col-form-label">kích thước màn  hình</label>
                                            <input class="form-control" type="text"  values="{{$sanphamc->ktmanhinh}}"  id="example-url-input" name="ktmanhinh">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-tel-input" class="col-form-label">Công nghệ màn hình</label>
                                            <input class="form-control" type="text"  values="{{$sanphamc->cnmanhinh}}" id="example-tel-input"name="cnmanhinh">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-tel-input" class="col-form-label">Độ phân giải</label>
                                            <input class="form-control" type="text"  values="{{$sanphamc->dophangiai}}"  id="example-tel-input"name="dophangiai">
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label for="example-tel-input" class="col-form-label">Tính năng màn hình</label>
                                            <input class="form-control" type="text"  values="{{$sanphamc->tinhnangmanhinh}}"  id="example-tel-input"name="tinhnangmanhinh">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-tel-input" class="col-form-label">Tần số quét</label>
                                            <input class="form-control" type="text"  values="{{$sanphamc->tansoquet}}" id="example-tel-input"name="tansoquet">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-tel-input" class="col-form-label">Camera sau</label>
                                            <input class="form-control" type="text"  values="{{$sanphamc->camerasau}}" id="example-tel-input"name="camerasau">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-tel-input" class="col-form-label">Quay video</label>
                                            <input class="form-control" type="text"  values="{{$sanphamc->quayvideo}}" id="example-tel-input"name="quayvideo">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-tel-input" class="col-form-label">Camera trước</label>
                                            <input class="form-control" type="text"  values="{{$sanphamc->cameratruoc}}" id="example-tel-input"name="cameratruoc">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-tel-input" class="col-form-label">Quay video trước</label>
                                            <input class="form-control" type="text"  values="{{$sanphamc->quayvideotruoc}}" id="example-tel-input"name="quayvideotruoc">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-tel-input" class="col-form-label">Thẻ sim</label>
                                            <input class="form-control" type="text"  values="{{$sanphamc->thesim}}" id="example-tel-input"name="thesim">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-tel-input" class="col-form-label">Hệ điều hành</label>
                                            <input class="form-control" type="text"  values="{{$sanphamc->hedieuhanh}}" id="example-tel-input"name="hedieuhanh">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-tel-input" class="col-form-label">Hỗ trợ mạng</label>
                                            <input class="form-control" type="text"  values="{{$sanphamc->hotromang}}" id="example-tel-input"name="hotromang">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-tel-input" class="col-form-label">Wifi</label>
                                            <input class="form-control" type="text"  values="{{$sanphamc->wifi}}"  id="example-tel-input"name="wifi">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-tel-input" class="col-form-label">GPS</label>
                                            <input class="form-control" type="text"  values="{{$sanphamc->gps}}" id="example-tel-input"name="gps">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-tel-input" class="col-form-label">Kích thước</label>
                                            <input class="form-control" type="text"  values="{{$sanphamc->kichthuoc}}" id="example-tel-input"name="kichthuoc">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-tel-input" class="col-form-label">Trọng lượng</label>
                                            <input class="form-control" type="text"  values="{{$sanphamc->trongluong}}" id="example-tel-input"name="trongluong">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-tel-input" class="col-form-label">cổng sạc</label>
                                            <input class="form-control" type="text"  values="{{$sanphamc->congsac}}" id="example-tel-input"name="congsac">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-tel-input" class="col-form-label">Pin</label>
                                            <input class="form-control" type="text"  values="{{$sanphamc->pin}}" id="example-tel-input"name="pin">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-tel-input" class="col-form-label">Thời điểm ra mắt</label>
                                            <input class="form-control" type="date"  values="{{$sanphamc->thoidiemramat}}" id="example-tel-input"name="thoidiemramat">
                                        </div>
                                        
                                        
                                     
                                        <div><button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Sửa</button></div>
                                        <style>
                                            .card
                                            {
                                                margin-left: 300px;
                                                margin-right: 300px;
                                            }
                                        </style>
                                        <style>
                                            #picture__input {
                                            display: none;
                                            }

                                            .picture {
                                            width: 200px;
                                            height: 250px;
                                            aspect-ratio: 16/9;
                                            background: #ddd;
                                            display: flex;
                                            align-items: center;
                                            justify-content: center;
                                            color: #aaa;
                                            border: 2px dashed currentcolor;
                                            cursor: pointer;
                                            font-family: sans-serif;
                                            transition: color 300ms ease-in-out, background 300ms ease-in-out;
                                            outline: none;
                                            overflow: hidden;
                                            }

                                            .picture:hover {
                                            color: #777;
                                            background: #ccc;
                                            }

                                            .picture:active {
                                            border-color: turquoise;
                                            color: turquoise;
                                            background: #eee;
                                            }

                                            .picture:focus {
                                            color: #777;
                                            background: #ccc;
                                            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
                                            }

                                            .picture__img {
                                            max-width: 100%;
                                            }

                                        </style>
                                        <script>
                                           const inputFile = document.querySelector("#picture__input");
                                            const pictureImage = document.querySelector(".picture__image");
                                            const pictureImageTxt = "Choose an image";
                                            pictureImage.innerHTML = pictureImageTxt;

                                            inputFile.addEventListener("change", function (e) {
                                            const inputTarget = e.target;
                                            const file = inputTarget.files[0];

                                            if (file) {
                                                const reader = new FileReader();

                                                reader.addEventListener("load", function (e) {
                                                const readerTarget = e.target;

                                                const img = document.createElement("img");
                                                img.src = readerTarget.result;
                                                img.classList.add("picture__img");

                                                pictureImage.innerHTML = "";
                                                pictureImage.appendChild(img);
                                                });

                                                reader.readAsDataURL(file);
                                            } else {
                                                pictureImage.innerHTML = pictureImageTxt;
                                            }
                                            });
                                        </script>
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