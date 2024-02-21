<html>
    <head>
        <style>
            tr{
                line-height: 30px;
            }
            tr td:first-child{
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <h2>Yeni bulten Formu</h2>
        <table>
            <tr><td>Email:</td><td>{{ $object->email }}</td></tr>
        </table>
    </body>
</html>