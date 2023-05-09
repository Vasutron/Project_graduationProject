<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        /* Custom styles for this page */
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
  </body>
  </html>
  