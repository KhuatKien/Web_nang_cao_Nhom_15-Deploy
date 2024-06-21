# Thành viên nhóm:
1. Khuất Phú Kiên
2. Trần Duy Bim

# Tên đề tài: Xây dựng website giới thiệu khách sạn và đặt phòng trực tuyến

* Cho phép người dùng:
  - Tìm kiếm và xem thông tin về khách sạn, phòng trong khách sạn và các dịch vụ trong khách
sạn như nhà hàng, phòng họp, đám cưới, massage...
  - Tiến hành đặt phòng/các dịch vụ trực tuyến kèm những yêu cầu liên quan (như số khách, số
phòng, thời gian sử dụng phòng/dịch vụ...)
  - Nhận và xem các kết quả đặt phòng/dịch vụ
* Cho phép người quản lý:
  - Cập nhật thông tin về khách sạn, phòng trong khách sạn và các dịch vụ trong khách sạn như
nhà hàng, phòng họp, đám cưới, massage...
  - Quản lý người dùng
  - Quản lý và xử lý các đơn đặt phòng/dịch vụ của khách sạn
  - Quản lý giao diện...
 
# Các công nghệ sử dụng:
  - Laravel Framework
  - Google Cloud Console (SSO - Single Sign-On)
  - Bootstrap (Giao diện Admin mẫu)
  - Aiven (Database lưu trữ trên Cloud)
  - SMTP (Gửi mail xác nhận đặt phòng)
  - Heroku (Deploy Web)

# Framework sử dụng: Laravel (Mô hình MVC)
* Khái niệm: Laravel là một framework PHP mã nguồn mở dùng để xây dựng ứng dụng web. Nó tuân theo mô hình MVC (Model-View-Controller) và có cú pháp dễ hiểu. Các tính năng chính của Laravel bao gồm:
  - Eloquent ORM: Hệ thống ORM giúp tương tác với cơ sở dữ liệu dễ dàng.
  - Routing: Hệ thống định tuyến mạnh mẽ.
  - Blade: Công cụ tạo template đơn giản và mạnh mẽ.
  - Artisan: Giao diện dòng lệnh hỗ trợ nhiều lệnh hữu ích.
  - Bảo mật: Tích hợp nhiều tính năng bảo mật như mã hóa mật khẩu và chống SQL injection.
  - Lịch trình công việc: Hệ thống tự động hóa tác vụ.
  - Xác thực: Hệ thống xác thực toàn diện.
  - Kiểm thử: Hỗ trợ kiểm thử với PHPUnit.
  - Di cư cơ sở dữ liệu: Quản lý schema cơ sở dữ liệu.
  - Hệ thống đóng gói: Hỗ trợ quản lý và đóng gói mã nguồn dễ dàng qua Composer.
  
  => Laravel giúp đơn giản hóa và tối ưu hóa quá trình phát triển web.
  
# Google Cloud Console (SSO - Single Sign-On)
  - Truy cập Google Cloud Console: Đăng nhập vào Google Cloud Console.
  - Tạo một Project: Nếu bạn chưa có project, hãy tạo một project mới.
  - Bật API: Vào phần APIs & Services > Library và tìm Google+ API hoặc Google Identity. Bật API này.
  - Tạo Credentials:
      + Truy cập vào APIs & Services > Credentials.
      + Chọn Create Credentials và chọn OAuth 2.0 Client ID.
      + Cấu hình màn hình đồng ý OAuth (OAuth consent screen): Bạn cần cung cấp các thông tin cần thiết như tên ứng dụng, email hỗ trợ, và các thông tin khác.
      + Chọn loại ứng dụng là Web application.
      + Cung cấp thông tin như tên, Authorized JavaScript origins và Authorized redirect URIs (ví dụ: http://yourdomain.com/callback).
  - Lưu Client ID và Client Secret: Sau khi tạo, bạn sẽ nhận được Client ID và Client Secret. Lưu lại để sử dụng trong Laravel.
  - Cài đặt Laravel Socialite.
  - Cấu hình môi trường (.env):
    Thêm các dòng sau vào file .env của bạn, thay thế your-google-client-id và your-google-client-secret bằng các giá trị từ Google Cloud Console:
  - Cấu hình dịch vụ trong Laravel:
    Mở file config/services.php và thêm cấu hình cho Google:
  - Cập nhật Routes.
  - Cập nhật User Model.
  - Chạy Migration (nếu cần thiết):

# SMTP:
  - MAIL_MAILER=smtp
  - MAIL_HOST=smtp.gmail.com
  - MAIL_PORT=587
  - MAIL_USERNAME="kien18122k3@gmail.com"
  - MAIL_PASSWORD="fckc zbnz pixm mhdm"
  - MAIL_ENCRYPTION=tls
  - MAIL_FROM_ADDRESS="kien18122k3@gmail.com"
  - MAIL_FROM_NAME="The Cappa Hotel"

# Tài khoản Admin
  - Email: admin@gmail.com
  - Mật khẩu: 123456789

# Link Web deploy (Heroku): https://thecappahotel-ff70e6604f55.herokuapp.com/
