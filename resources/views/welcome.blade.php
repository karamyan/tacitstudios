<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
    <title>Simple Task</title>
</head>
<body>

<div class="container">
    <div class="row">
        <table id="contacts">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Created date</th>
                <th scope="col">Updated date</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

<script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>

<script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
@csrf
<script>
    $(document).ready(function () {
        $.ajax({
            type: "POST",
            url: '{{ route("create_token") }}',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: {
                "email": "admin@admin.com",
                "password": "password"
            },
            success: function (data) {
                var access_token = data.data.token

                $('#contacts').DataTable({
                    "ajax": {
                        'url':'{{ route("view_contacts") }}',
                        'beforeSend': function (request) {
                            request.setRequestHeader("Authorization", 'Bearer '+access_token);
                        },
                        'success': function (data) {
                            console.log(data);
                        },
                        "columns": [
                            { "data": "contact_id" },
                            { "data": "name" },
                            { "data": "created_at" },
                            { "data": "updated_at" }
                        ]
                    },
                });

            }
        });
    });
</script>
</body>
</html>
