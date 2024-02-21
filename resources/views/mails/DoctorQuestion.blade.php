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
        <h2>Yeni Doktor Sorusu</h2>
        <table>
            <tr><th>Ad:</th><td>{{ $object->user_name }}</td></tr>
            <tr><th>Email:</th><td>{{ $object->email }}</td></tr>
            <tr><th>Mesaj:</th><td>{{ $object->question }}</td></tr>
            <tr><th>Kaynak Sayfa:</th><td>{{ $object->source_url }}</td></tr>

        </table>
    </body>
</html>