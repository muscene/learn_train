<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internship Applications</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS */
        .container {
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Internship Applications</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Telephone</th>
                    <th>Address</th>
                    <th>Major</th>
                    <th>Laptop</th>
                    <th>Internship Area</th>
                    <th>Interest Reason</th>
                    <th>How did you know</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="applicationTableBody">
                <!-- Application data will be inserted here -->
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Custom JavaScript -->
    <script>
        $(document).ready(function() {
            // Fetch data from JSON file
            $.getJSON('http://learn.vrt.rw/internship_applications.json', function(data) {
                displayApplications(data);
            });

            // Function to display applications in the table
            function displayApplications(applications) {
                $("#applicationTableBody").empty();
                applications.forEach(function(application, index) {
                    var row = "<tr>";
                    row += "<td>" + application.name + "</td>";
                    row += "<td>" + application.email + "</td>";
                    row += "<td>" + application.telephone + "</td>";
                    row += "<td>" + application.address + "</td>";
                    row += "<td>" + application.major + "</td>";
                    row += "<td>" + application.laptop + "</td>";
                    row += "<td>" + application.internship_area + "</td>";
                    row += "<td>" + application.interest_reason + "</td>";
                    row += "<td>" + application.how_did_you_know + "</td>";
                    row += "<td><button class='btn btn-sm btn-primary mr-1 editBtn' data-index='" + index + "' data-toggle='modal' data-target='#editModal'>Edit</button>";
                    row += "<button class='btn btn-sm btn-danger deleteBtn' data-index='" + index + "'>Delete</button></td>";
                    row += "</tr>";
                    $("#applicationTableBody").append(row);
                });
            }

            // Edit button click event
            $(document).on("click", ".editBtn", function() {
                var index = $(this).data("index");
                var application = applications[index];
                $("#editName").val(application.name);
                $("#editEmail").val(application.email);
                // Similarly, fill other fields in the edit modal
            });

            // Delete button click event
            $(document).on("click", ".deleteBtn", function() {
                var index = $(this).data("index");
                if (confirm("Are you sure you want to delete this application?")) {
                    applications.splice(index, 1);
                    displayApplications(applications);
                }
            });
        });
    </script>
</body>
</html>
