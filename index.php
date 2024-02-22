<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internship Application Form</title>
    <style>
        /* Add your CSS styling here */
        body {
            font-family: Arial, sans-serif;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="email"],
        input[type="tel"],
        select,
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="checkbox"] {
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .error {
            color: red;
            margin-bottom: 10px;
        }
    </style>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS */
        .error {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                 <!--<img class="gallery-item img-fluid" src="Screenshot 2023-12-26 at 17-56-06 Ginger Sunny Just Living Photo Collage Facebook Cover.png" >-->
             <img class="gallery-item img-fluid" src="Screenshot 2023-12-26 at 17-57-52 Ginger Sunny Just Living Photo Collage Facebook Cover.png" >
        <h1></h1>
        <!--<img class="gallery-item img-fluid" src="Screenshot 2023-12-15 082244.png" >-->
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Internship Application Form</h2>
                    </div>
   <div class="card-body">
    <form id="applicationForm" action="process.php" method="POST" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        <label for="telephone">Telephone:</label>
        <input type="tel" id="telephone" name="telephone" required><br>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br>
        <label for="major">Major:</label>
        <input type="text" id="major" name="major" required><br>
        <label for="laptop">Do you have a laptop?</label>
        <input type="checkbox" id="laptop" name="laptop" value="yes"><br>
        <label for="internship_area">Choose Internship Area:</label>
        <select id="internship_area" name="internship_area">
            <option value="">Select</option>
            <option value="IOT">IOT</option>
            <option value="Machine Learning">Machine Learning</option>
            <option value="SolidWORKs">SolidWORKs</option>
            <option value="Firmware Development">Firmware Development</option>
            <option value="Python Programming">Python Programming</option>
            <option value="PCB Design">PCB Design</option>
        </select><br>
        <label for="interest_reason">Why are you interested in this Internship?</label><br>
        <textarea id="interest_reason" name="interest_reason" rows="4" required></textarea><br>
        <label for="how_did_you_know">How did you hear about us?</label><br>
        <input type="text" id="how_did_you_know" name="how_did_you_know" required><br>
        <div id="errorMessages" class="error"></div>
        <input type="submit" value="Submit Application">
    </form>
</div>
    <script>
        document.getElementById('applicationForm').addEventListener('submit', function(event) {
            var errors = [];
            if (!document.getElementById('name').value) {
                errors.push('Name is required');
            }
            if (!document.getElementById('email').value || !document.getElementById('email').checkValidity()) {
                errors.push('Valid email address is required');
            }
            if (!document.getElementById('telephone').value || !/^[0-9]{10}$/.test(document.getElementById('telephone').value)) {
                errors.push('Valid telephone number is required (10 digits)');
            }
            if (!document.getElementById('address').value) {
                errors.push('Address is required');
            }
            if (!document.getElementById('major').value) {
                errors.push('Major is required');
            }
            if (!document.getElementById('internship_area').value) {
                errors.push('Please select a valid internship area');
            }
            if (!document.getElementById('interest_reason').value) {
                errors.push('Interest reason is required');
            }
            if (!document.getElementById('how_did_you_know').value) {
                errors.push('How did you know is required');
            }
            var errorMessages = document.getElementById('errorMessages');
            errorMessages.innerHTML = '';
            if (errors.length > 0) {
                event.preventDefault();
                errors.forEach(function(error) {
                    var errorElement = document.createElement('div');
                    errorElement.textContent = error;
                    errorMessages.appendChild(errorElement);
                });
            }
        });
    </script>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>
