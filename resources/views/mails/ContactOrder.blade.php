<html>
    <head>
        <style>
            tr{
                line-height: 30px;
            }
            tr td:first-child{
                font-weight: bold;
            }
            tr th{
                text-align: left;
            }
        </style>
    </head>
    <body>
        <h2>Yeni İletişim Formu</h2>
        <table>
            <tr><th>Ad:</th><td>{{ $object->first_name }}</td></tr>
            <tr><th>Soyad:</th><td>{{ $object->last_name }}</td></tr>
            <tr><th>Tel:</th><td>{{ $object->telephone }}</td></tr>
            <tr><th>Email:</th><td>{{ $object->email }}</td></tr>
            <tr><th>Mesaj:</th><td>{{ $object->cover_letter }}</td></tr>
        </table>
    </body>
</html>