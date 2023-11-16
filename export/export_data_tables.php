<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export Data</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    

</head>
<body>
    
<div class="container mt-5 ">
<h2> Listing </h2>
<!-- <div style="text-align: right;">
    <button type="button" class="btn btn-primary m-2" id="">Export to CSV</button>
</div> -->


<table id="data-table" class="table table-bordered">
<thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Comments</th>

                    <th>Email</th>

                    <!-- <th>Username</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Website</th> -->
                </tr>
            </thead>
            <tbody></tbody>
        </table>
  
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<!-- Bootstrap Js-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>

<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<!-- data tables with export buttons -->
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    
<script>
//     axios.get('https://jsonplaceholder.typicode.com/comments')
// .then((response)=>{console.log(response.data)})

$(document).ready(function() {
            // Function to fetch JSON data and display it using DataTables
            $('#data-table').DataTable({
                ajax: {
                    url: 'https://jsonplaceholder.typicode.com/comments', // Replace with your API endpoint
                    dataSrc: ''
                },
                columns: [
                    { data: 'id' },
                    { data: 'name' },
                    { data: 'body' },
                    { data: 'email' },
                    // { data: 'username' },
                    // { data: 'email' },
                    // { data: 'phone' },
                    // { data: 'website' }
                ],
                paging: true,
                lengthMenu: [5, 10, 20], // Adjust the number of records per page
                pageLength: 5, // Set the default number of records per page
                dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
        // buttons: [
        //     {
        //         extend: 'excelHtml5',
        //         title: 'Excel Data export'
        //     },
        //     {
        //         extend: 'csvHtml5',
        //         title: 'CSV Data export'
        //     },
        //     {
        //         extend: 'pdfHtml5',
        //         title: 'PDF Data export'
        //     }
        // ]
                
            });

           
        
        });
    </script>
</body>
</html>      