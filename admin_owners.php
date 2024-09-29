<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Manage customers</title>

    <style>
        .nav-link {
            transition: transform 0.3s ease-in-out;
        }
        
        .nav-link:hover {
            transform: scale(1.1);
        }
        /*bg color*/
        
        body {
            background-color: rgb(218, 216, 209);
        }
        /*footer styles*/
        
        footer {
            background-color: #343a40;
            color: #dcdcdc;
            padding: 20px 0;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
        <img src="image/boarding_logo.jpg" alt="Your Image Description" style="
          width: 70px;
          height: 70px;
          vertical-align: middle;
          margin-left: 50px;
        " />
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto px-5">
                <a class="nav-item nav-link" href="admin_dash.php">Booking Requests</a>
                <a class="nav-item nav-link active" href="admin_NOT_Approve_List.php">NOT Approve List</a>
                <a class="nav-item nav-link" href="admin_customers.php">Customers</a>
                <a class="nav-item nav-link active" href="admin_owners.php">Owners</a>
                <a class="nav-item nav-link" href="index.php">Sign Out</a>
            </div>
        </div>
    </nav>

    <h2 class="text-center mb-5">Registered Owners</h2>

    <div class="mx-5">
        <table class="table table-hover table-borderless">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>

                </tr>
                <tr>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    </td>
                </tr>
                <tr>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>