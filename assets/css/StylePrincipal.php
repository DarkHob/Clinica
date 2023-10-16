<style>
        body {
            font-family: "Roboto", sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ECECEC;
        }
        .sidebar {
            width: 280px;
            height: 100%;
            position: fixed;
            background: #ffffff;
            color: #000000;
        }
        .logo {
            text-align: center;
            padding: 20px 0;
        }
        .logo img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }
        .hospital-name {
            text-align: center;
            margin-top: 10px;
            color: #000000;
        }
        .sidebar-menu {
            padding: 20px;
            color: #7C8EA6;
        }
        .menu-item {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .menu-button {
            background-color: transparent;
            color: #7C8EA6;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            display: flex;
            align-items: center;
        }
        .menu-icon {
            width: 30px;
            height: 30px;
            margin-right: 10px;
        }
        .divider {
            width: 100%;
            height: 50px;
            background-color: #088395;
        }
        .logout-button {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            margin-top: auto; /* Empuja el botón hacia la parte inferior */
            padding: 10px 20px; /* Espaciado interior para el botón */
            cursor: pointer;
        }

        .logout-icon {
            width: 20px;
            height: 20px;
            margin-right: 15px;
            color: #BB1A1A;
        }

        .logout-button span {
            color: #BB1A1A;
            font-size: 18px;
            font-weight: 500;
        }

        .logout-button {
            position: absolute;
            bottom: 0; /* Lo colocamos en la parte inferior */
        }

        .adquisiciones-form {
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        .adquisiciones-form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .adquisiciones-form select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            background-color: #fff;
        }

        .adquisiciones-form button {
            display: block;
            width: 100%;
            background-color: #007BFF;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .adquisiciones-form button:hover {
            background-color: #0056b3;
        }

        body {
            font-family: "Roboto", sans-serif;
            margin: 0;
            padding: 0;
        }

    </style>