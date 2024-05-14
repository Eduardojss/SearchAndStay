    <!DOCTYPE html>
    <html lang="ptBR">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @vite('resources/js/app.js')
        <style>
            .container {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: space-evenly;
                height: 60vh;
                margin-top: 20px;
                border: 1px solid #ccc;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            }


            h1 {
                color: #333;
                font-size: 24px;
                margin-bottom: 10px;
            }

            .card {
                border: 1px solid #ccc;
                border-radius: 5px;
                padding: 10px;
                margin-bottom: 10px;
            }

            .card-title {
                font-size: 18px;
                font-weight: bold;
                margin-bottom: 5px;
            }

            .card-text {
                font-size: 14px;
                color: #666;
            }

            .form-group {
                display: flex;
                justify-content: center;
                flex-direction: column;
                padding: 10px 10px;
            }

            label {
                font-weight: bold;
            }

            .btn-primary {
                background-color: #007bff;
                color: #fff;
                border: none;
                padding: 5px 10px;
                border-radius: 5px;
                cursor: pointer;
            }
        </style>
    </head>

    <body>
        <div class="container">

            <a href="{{ route('api.logout') }}" class="btn btn-primary">Logout</a>
            <h1>My Books</h1>

            <!-- Display all registered books -->
            <div class="row">
                @foreach($books as $book)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->name }}</h5>
                            <p class="card-text">{{ $book->value }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <h1>My Stores</h1>

            <!-- Display all registered stores -->
            <div class="row">
                @foreach($stores as $store)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $store->name }}</h5>
                            <p class="card-text">{{ $store->address }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Form to register new books and stores -->
            <h1>Register New</h1>
            <form action="{{ route('books.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Book Name</label>
                    <input type="text" class="form-control" id="title" name="name">
                    <label for="value">Book Value</label>
                    <input type="text" class="form-control" id="value" name="value">
                    <label for="ISBN">ISBN</label>
                    <input type="text" class="form-control" id="ISBN" name="ISBN">
                    <button type="submit" class="btn btn-primary">Register Book</button>
                </div>
            </form>

            <form action="{{ route('stores.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Store Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                    <label for="address">Store Address</label>
                    <input type="text" class="form-control" id="address" name="address">
                    <button type="submit" class="btn btn-primary">Register Store</button>
                </div>
            </form>
        </div>

    </body>

    </html>