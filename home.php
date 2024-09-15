<?php
    include 'koneksi.php';
    session_start();
    $user_id = $_SESSION['user_id'];

    if (!isset($user_id)) {
        header('location:index.php');
    };
    if (isset($_GET['logout'])) {
        unset($user_id);
        session_destroy();
        header('location:index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
    <title>AdminHub</title>
</head>
<body>
    <section id="sidebar">
        <a href="#" class="brand">
            <i class='bx bxs-home'></i>
            <span class="text">UTD RSUD ULIN</span>
        </a>
        <ul class="side-menu top">
            <li class="active">
                <a href="#">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="golongandarah.php">
                    <i class='bx bxs-droplet'></i>
                    <span class="text">Golongan Darah</span>
                </a>
            </li>
            <li>
                <a href="blanko.php">
                    <i class='bx bxs-file-blank'></i>
                    <span class="text">Blanko Darah</span>
                </a>
            </li>
            <li>
                <a href="label.php">
                    <i class='bx bxs-file'></i>
                    <span class="text">Label Darah</span>
                </a>
            </li>
            <li>
                <a href="pendonor.php">
                    <i class='bx bxs-group'></i>
                    <span class="text">Pendonor</span>
                </a>
            </li>
            <li>
                <a href="pemusnahan.php">
                    <i class='bx bxs-trash-alt'></i>
                    <span class="text">Pemusnahan Darah</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="#">
                    <i class='bx bxs-cog' ></i>
                    <span class="text">Setting</span>
                </a>
            </li>
            <li>
                <a href="home.php?logout=<?php echo $user_id; ?>" class="logout">
                    <i class='bx bxs-log-out'></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>

    <section id="content">
        <nav>
            <i class="bx bx-menu"></i>
            <a href="#" class="nav-link">Categories</a>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button type="submit" class="search-btn"><i class="bx bx-search"></i></button>
                </div>
            </form>
            <a href="#" class="notification">
                <i class='bx bxs-bell'></i>
                <span class="num">8</span>
            </a>
            <a href="#" class="profile">
                <img src="img/utdrs.png" alt="">
            </a>
        </nav>

        <main>
            <div class="head-title">
                <div class="left">
                    <h1>UTD RSUD ULIN</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right' ></i></li>
                        <li >
                            <a class="active" href="#">Home</a>
                        </li>
                    </ul>
                </div>
                <a href="#" class="btn-download">
                    <i class='bx bxs-cloud-download' ></i>
                    <span class="text">Download PDF</span>
                </a>
            </div>
            <ul class="box-info">
                <li>
                    <i class='bx bxs-droplet'></i>
                    <span class="text">
                        <h3>10</h3>
                        <p>Golongan Darah AB</p>
                    </span>
                </li>
                <li>
                    <i class='bx bxs-droplet'></i>
                    <span class="text">
                        <h3>50</h3>
                        <p>Golongan Darah A</p>
                    </span>
                </li>
                <li>
                    <i class='bx bxs-droplet'></i>
                    <span class="text">
                        <h3>70</h3>
                        <p>Golongan Darah B</p>
                    </span>
                </li>
                <li>
                    <i class='bx bxs-droplet'></i>
                    <span class="text">
                        <h3>100</h3>
                        <p>Golongan Darah O</p>
                    </span>
                </li>
            </ul>

            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Recent Orders</h3>
                        <i class="bx bx-search"></i>
                        <i class='bx bx-filter' ></i>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Data Order</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img src="img/utdrs.png" alt="">
                                    <p>Muhammad Bayu</p>
                                </td>
                                <td>01-10-2024</td>
                                <td>
                                    <span class="status completed">Completed</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="img/utdrs.png" alt="">
                                    <p>Muhammad Bayu</p>
                                </td>
                                <td>01-10-2024</td>
                                <td>
                                    <span class="status panding">Panding</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="img/utdrs.png" alt="">
                                    <p>Muhammad Bayu</p>
                                </td>
                                <td>01-10-2024</td>
                                <td>
                                    <span class="status prosses">Prosses</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="img/utdrs.png" alt="">
                                    <p>Muhammad Bayu</p>
                                </td>
                                <td>01-10-2024</td>
                                <td>
                                    <span class="status panding">Panding</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="img/utdrs.png" alt="" >
                                    <p>Muhammad Bayu</p>
                                </td>
                                <td>01-10-2024</td>
                                <td>
                                    <span class="status completed">Completed</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="todo">
                    <div class="head">
                        <h3>Todos</h3>
                        <i class='bx bx-plus'></i>
                        <i class='bx bx-filter' ></i>
                    </div>
                    <ul class="todo-list">
                        <li class="completed">
                            <p>Todo List</p>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                        <li class="completed">
                            <p>Todo List</p>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                        <li class="not-completed">
                            <p>Todo List</p>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                        <li class="completed">
                            <p>Todo List</p>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                        <li class="not-completed"> 
                            <p>Todo List</p>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                    </ul>
                </div>
            </div>
        </main>
    </section>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>