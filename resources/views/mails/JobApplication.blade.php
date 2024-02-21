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
        <h2>Yeni İş Başvurusu Formu</h2>
        <table>
            <tr><th>Ad:</th><td>{{ $object->user_name }}</td></tr>
            <tr><th>Tel:</th><td>{{ $object->phone }}</td></tr>
            <tr><th>Email:</th><td>{{ $object->email }}</td></tr>
            <tr><th>Tckn:</th><td>{{ $object->tr_identity }}</td></tr>
            <tr><th>Yaş:</th><td>{{ $object->age }}</td></tr>
            <tr><th>Cinsiyet:</th><td>{{ $object->gender }}</td></tr>
            <tr><th>Branş:</th><td>{{ $related->title }}</td></tr>
            <tr><th>Adres:</th><td>{{ $object->address }}</td></tr>
            <tr><th>Ülke:</th><td>{{ $object->country }}</td></tr>
            <tr><th>CV:</th><td><a href="{{ asset(parse_file($object->cv_file)) }}" target="_blank">Görüntüle</a></td></tr>
            <tr><th>Mesaj:</th><td>{{ $object->cover_letter }}</td></tr>
        </table>
    </body>
</html>