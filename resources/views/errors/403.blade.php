<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>403 - Không có quyền truy cập</title>
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            body {
                font-family: 'Arial', sans-serif;
                background-color: #f4f4f9;
                color: #333;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }
            .container {
                text-align: center;
                padding: 40px;
                background: #fff;
                border-radius: 10px;
                box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
            }
            h1 {
                font-size: 4rem;
                color: #ff6b6b;
            }
            p {
                font-size: 1.2rem;
                margin: 20px 0;
            }
            a {
                display: inline-block;
                padding: 10px 20px;
                margin-top: 20px;
                background-color: #007bff;
                color: #fff;
                text-decoration: none;
                border-radius: 5px;
                transition: background-color 0.3s ease;
            }
            a:hover {
                background-color: #0056b3;
            }
            .error-icon {
                font-size: 5rem;
                color: #ff6b6b;
                margin-bottom: 20px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="error-icon">🚫</div>
            <h1>403</h1>
            <p>Bạn không có quyền truy cập vào trang này.</p>
            <a href="{{ route('post.index') }}">Quay lại trang chủ</a>
        </div>
    </body>
</html>
