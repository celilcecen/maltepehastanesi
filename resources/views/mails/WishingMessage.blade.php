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
        <h2>Yeni E-Geçmiş Olsun Formu</h2>
        <table>
            <tr><th>Hasta Adı:</th><td>{{ $object->relativeName }}</td></tr>
            <tr><th>Gönderici Adı:</th><td>{{ $object->yourName }}</td></tr>
            <tr><th>Tel:</th><td>{{ $object->phone }}</td></tr>
            <tr><th>Mesaj:</th><td>{{ $object->message }}</td></tr>
        </table>
    </body>
</html>