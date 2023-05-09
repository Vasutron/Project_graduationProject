<?php
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
/* Custom styles for this page */
.form-container {
    width: 85%;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
}
</style>
</head>
<body>
    <?php
    include 'manu_header.php'
    ?>
    <div class="container mt-5">
        <h1>Contact Us</h1>
        <form>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control"
                id="name" required>
              </div>
              <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control" id="email" required>
              </div>
              <div class="form-group">
                  <label for="phone">Phone:</label>
                  <input type="text" class="form-control" id="phone" required>
              </div>
              <div class="form-group">
                  <label for="message">Message:</label>
                  <textarea class="form-control" id="message" rows="5" required></textarea>
              </div>
              <button type="submit" class="btn btn-primary mt-3">Submit</button>
          </form>
          <div class="row mt-5">
              <div class="col-md-6">
                  <h2>Location</h2>
                  <p>1234 Example St.<br>
                      City, State 12345</p>
                  <h2>Phone</h2>
                  <p>(02) 999-9999</p>
                  <h2>Email</h2>
                  <p>popart.vl@gmail.com</p>
              </div>
              <div class="col-md-6">
                  <iframe src="https://maps.google.com/maps?q=1234%20Example%20St.%2CCity%2C%20State%2012345&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
              </div>
          </div>
      </div>
          <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
  </html>
  