<!DOCTYPE html>
<html>

<head>
    <title>Página de Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        div {
            display: flex;
            flex-direction: column;
            width: 300px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin: 10px 10px;
            color: #333;
        }

        input[type="name"],
        input[type="email"],
        input[type="password"] {
            width: 90%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button[type="submit"] {
            width: 98%;
            margin-top: 20px;
            padding: 10px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #555;
        }

        a.register {
            text-align: center;
            margin-top: 10px;
            color: #333;
            text-decoration: none;
        }

        a.register:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <h1>Register</h1>

    <div class="">

        <form method="POST" action="api/register">
            @csrf

            <label for="name">Name:</label>
            <input type="name" name="name" id="name" required>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>

            <button type="submit">registrar</button>
        </form>
    </div>
</body>

</html>