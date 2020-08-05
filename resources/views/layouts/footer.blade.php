<!-- Footer -->
<footer class="page-footer font-small pt-4">
    <div class="container">
        <div class="text-center text-md-left">
            <div class="row">
                <div class="col-md-4 mt-md-0 mt-1">
                    <div class="p-1 d-flex" style="border-bottom: 1px solid #b8c0c4;">
                        <h4 style="color:#565e65">Về chúng tôi</h4>
                    </div>
                    <div class="mt-2">
                        <a href="" style="font-size:16px; margin-left:10px; color:black">  Giới thiệu</a><br>
                        <a href="" style="font-size:16px; margin-left:10px; color:black">  Liên hệ</a><br>
                        <a href="" style="font-size:16px; margin-left:10px; color:black">  Hướng dẫn sử dụng</a>
                    </div>
                </div>
                <hr class="clearfix w-100 d-md-none pb-3">
                <div class="col-md-8 mb-md-0 mb-3">
                    <div class="p-1 d-flex text-center justify-content-center" style="border-bottom: 1px solid #b8c0c4;">
                        <h4 style="color:#565e65">Chủ đề nổi bật</h4>
                    </div>
                        <div class="mt-2">
                            @foreach($highlights as $highlight)
                            <a href="{{ $highlight->link }}" class="tag-cloud-link hashtag" 
                                style="font-size: 20.181818181818px;">{{ mb_substr(strip_tags($highlight->title), 0, 30, 'UTF-8') }}...</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="footer-copyright text-center">
            <p style="color:green; font-size:16px;">
                <a href="{{ route('homes.index') }}" style="color:blue; font-size:16px;">@2020 travel.vn </a>
                Cùng nhau chia sẻ những khoảnh khắc du lịch tuyệt vời trên mọi miền tổ quốc
            </p>
        </div>
    </div>

</footer>
