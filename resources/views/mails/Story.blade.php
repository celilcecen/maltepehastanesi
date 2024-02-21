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
        <h2>Yeni Hikaye Formu</h2>
        <table>
            <tr><th>Ad:</th><td>{{ $object->user_name }}</td></tr>
            <tr><th>Cinsiyet:</th><td>{{ $object->gender }}</td></tr>
            <tr><th>Başlık:</th><td>{{ $object->title }}</td></tr>
            <tr><th>Email:</th><td>{{ $object->email }}</td></tr>
            <tr><th>Mesaj:</th><td>{{ $object->content }}</td></tr>
        </table>
    </body>
</html>