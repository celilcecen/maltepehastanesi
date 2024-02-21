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
        <h2>Yeni Soru Formu</h2>
        <table>
            <tr><th>Ad:</th><td>{{ $object->first_name }}</td></tr>
            <tr><th>Soyad:</th><td>{{ $object->last_name }}</td></tr>
            <tr><th>Tel:</th><td>{{ $object->phone }}</td></tr>
            <tr><th>Email:</th><td>{{ $object->email }}</td></tr>
            <tr><th>Tıbbi Birim :</th><td>{{ $related_1->title }}</td></tr>
            <tr><th>Konu :</th><td>{{ $related_2->title }}</td></tr>
            <tr><th>Ücret bilgileriyle ilgili benimle iletişime geçilmesini talep ediyorum:</th><td>{{ $object->ask_for_price == 1 ? 'EVET' : 'HAYIR'  }}</td></tr>
            <tr><th>Telefon :</th><td>{{ $object->contact_by_phone == 1 ? 'EVET' : 'HAYIR' }}</td></tr>
            <tr><th>Email :</th><td>{{ $object->contact_by_email == 1 ? 'EVET' : 'HAYIR' }}</td></tr>
            <tr><th>SMS :</th><td>{{ $object->contact_by_sms == 1 ? 'EVET' : 'HAYIR' }}</td></tr>
        </table>
    </body>
</html>