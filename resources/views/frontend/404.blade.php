<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css">
  <title>404 Not Found</title>
</head>
<style>
  body {
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f0f0f0;
    /* Background abu-abu */
  }

  .container {
    text-align: center;
  }

  img {
    max-width: 100%;
    height: auto;
  }

  h1 {
    font-size: 2em;
    margin: 10px 0;
  }

  p {
    font-size: 1em;
    color: #555;
  }
</style>

<body>
  <div class="container">
    <!-- <img src="dinosaur.png" alt="Dinosaur Image"> -->
    <h1>404 Not Found</h1>
    <p>Oops! The page you are looking for might be in another era.</p>
    <a href="{{route('logout.flush')}}" class="btn btn-primary">Logout</a>
  </div>
</body>

</html>