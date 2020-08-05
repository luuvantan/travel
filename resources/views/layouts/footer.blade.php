<!-- Footer -->
<footer class="page-footer font-small pt-4">
    <div class="container">
        <div class="text-center text-md-left">
            <div class="row">
                <div class="col-md-4 mt-md-0 mt-3">
                    <h4 style="color:#565e65">Về chúng tôi</h4>
                    <a href="" style="font-size:16px; margin-left:0px">  Giới thiệu</a><br>
                    <a href="" style="font-size:16px; margin-left:0px">  Liên hệ</a><br>
                    <a href="" style="font-size:16px; margin-left:0px">  Hướng dẫn sử dụng</a>
                </div>
                <hr class="clearfix w-100 d-md-none pb-3">
                <div class="col-md-8 mb-md-0 mb-3">
                    <h4 class="text-center" style="color:#565e65">Chủ đề nổi bật</h4>
                    <div>
                        @foreach($highlights as $highlight)
                        <a href="{{ $highlight->link }}" class="tag-cloud-link hashtag" 
                            style="font-size: 20.181818181818px;">{{ substr($highlight->title, 0, 40) }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="footer-copyright text-center">
            <p style="color:green; font-size:16px;">
                <a href="{{ route('homes.index') }}" style="color:blue; font-size:20px;">@2020 travel.vn </a>
                Cùng nhau chia sẻ những khoảnh khắc du lịch tuyệt vời trên mọi miền tổ quốc
            </p>
        </div>
    </div>

</footer>
