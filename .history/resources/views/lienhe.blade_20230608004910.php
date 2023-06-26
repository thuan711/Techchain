@extends('layout')
@section('noidungchinh')
<article class="">
    <h1 class="text-center">TRANG LIÊN HỆ</h1>
    <div class="container p-4 border">
        <div class="row">
            <div class="col-md-6 float-left">
                
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d19151.700603711015!2d106.63906274729096!3d10.850331733266433!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529b6a2b351a5%3A0x11690ada8c36f9bc!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIFRo4buxYyBow6BuaCBGUFQgUG9seXRlY2huaWMgVFAuSENNIChDUzMp!5e0!3m2!1svi!2s!4v1678473072125!5m2!1svi!2s" width="380" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-md-6 float-right text-center border p-0">
                <div class="border bg-warning">
                    <h2 class="pt-2">FORM LIÊN HỆ</h2>
                    <p>Kính mời nhập thông tin bên dưới</p>
                </div>
                <div class="card-body">
                    <form> 
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa-solid fa-user text-warning"></i></span>
                                </div>                                    
                                <input type="text" class="form-control" id="name" placeholder="Nhập tên của bạn">                          
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa-solid fa-inbox text-warning"></i></span>
                                </div>                                    
                                <input type="email" class="form-control" id="email" placeholder="Nhập email của bạn">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa-regular fa-comment text-warning"></i></span>
                                </div>                                    
                                <textarea class="form-control" id="message" rows="3" placeholder="Nhập nội dung liên hệ"></textarea>                            </div>
                            
                        </div>
                        
                            <button type="submit" class="btn btn-block bg-warning">GỬI LIÊN HỆ</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

</article>
@endsection