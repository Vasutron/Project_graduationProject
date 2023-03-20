<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">


    <title>Manage Articles</title>

    <script>
    $(document).ready(function() {
        $('#repair-requests-table').DataTable();
    });
    </script>
    <style>
    /* Custom styles for this page */
    
    .body-container {
        width: 100%;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .body-container {
        background-color: #ffffff;
        padding: 30px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-width: 800px;
        margin: 30px auto;
    }

    
    .form-container {
        width: 100%;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .form-container {
        background-color: #ffffff;
        padding: 30px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-width: 800px;
        margin: 30px auto;
    }

    #repair-requests-table th,
    #repair-requests-table td {
        vertical-align: middle;
    }

    #searchInput {
        max-width: 300px;
        margin-bottom: 1rem;
    }

    table {
        font-size: 14px;
        background-color: #fff;
        box-shadow: 0 6px 10px -4px rgba(0, 0, 0, 0.1);
        margin: 0 auto;
        border-radius: 10px;
        overflow: hidden;
    }

    th,
    td {
        padding: 12px 15px;
        text-align: left;
    }

    thead {
        background-color: #292b2c;
        color: #fff;
        position: sticky;
        top: 0;
    }

    tbody tr:nth-child(even) {
        background-color: #f5f5f5;
    }

    tbody tr:hover {
        background-color: #e6f5ff;
    }
    </style>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light ">
            <a class="navbar-brand" href="#">Management page for administrators</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="adminpage.php">Home Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="managemembers.php">Manage members</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Manage repair requests</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="device.php">Manage devices</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="managerepairman.php">Manage repairman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="managearticles.php">Manage articles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-primary" href="adminlogin.php">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
</head>

<body>
    <?php
        include 'dataconnect.php';

        // Function to add article
        function addArticle($conn) {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $author = $_POST['author'];
            $reference_url = $_POST['reference_url'];
            $publication_date = $_POST['publication_date'];
        
            $stmt = $conn->prepare("INSERT INTO articles (title, content, author, reference_url, publication_date) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $title, $content, $author, $reference_url, $publication_date);
            $stmt->execute();
            $stmt->close();
            header("Location: managearticles.php");
            exit();
        }

        // Function to delete article
        function deleteArticle($conn) {
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                $stmt = $conn->prepare("DELETE FROM articles WHERE id = ?");
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $stmt->close();
                header("Location: managearticles.php");
                exit();
            }
        }        
        
        // Function to update article
        function updateArticle($conn) {
            $id = $_POST['id'];
            $title = $_POST['title'];
            $content = $_POST['content'];
            $author = $_POST['author'];
            $reference_url = $_POST['reference_url'];
            $publication_date = $_POST['publication_date'];
        
            $stmt = $conn->prepare("UPDATE articles SET title = ?, content = ?, author = ?, reference_url = ?, publication_date = ? WHERE id = ?");
            $stmt->bind_param("sssssi", $title, $content, $author, $reference_url, $publication_date, $id);
            $stmt->execute();
            $stmt->close();
            header("Location: managearticles.php");
            exit();
        }
        
        // Check if form is submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['add_article'])) {
            addArticle($conn);
            } elseif (isset($_POST['delete_article'])) {
            deleteArticle($conn);
            } elseif (isset($_POST['update_article'])) {
            updateArticle($conn);
            }
        }
    ?>

    <div class=" ">
        <h1 class="text-center mt-5">Manage Articles</h1>

        <!-- Add Article Form -->
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add-article-modal">เพิ่มบทความใหม่</button>

        <!-- Add Article Modal -->
        <div class="modal" tabindex="-1" id="add-article-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Article</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="author" class="form-label">Author</label>
                                <input type="text" class="form-control" id="author" name="author" required>
                            </div>
                            <div class="mb-3">
                                <label for="reference_url" class="form-label">Reference URL</label>
                                <input type="url" class="form-control" id="reference_url" name="reference_url" required>
                            </div>
                            <div class="mb-3">
                                <label for="publication_date" class="form-label">Publication Date</label>
                                <input type="date" class="form-control" id="publication_date" name="publication_date"
                                    required>
                            </div>
                            <button type="submit" class="btn btn-primary" name="add_article">Add Article</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Display, Search, Update and Delete Articles -->
        <h3 class="mt-5">Articles</h3>
        <input class="form-control" id="searchInput" type="text" placeholder="Search.." />
        <br />
        <table id="repair-requests-table" class="table table-striped table-bordered table-hover mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Author</th>
                    <th>Reference URL</th>
                    <th>Publication Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="articlesTable">
                <?php
                    $sql = "SELECT * FROM articles";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["title"] . "</td>";
                            echo "<td>" . $row["content"] . "</td>";
                            echo "<td>" . $row["author"] . "</td>";
                            echo "<td>" . $row["reference_url"] . "</td>";
                            echo "<td>" . $row["publication_date"] . "</td>";
                            echo "<td>";
                            echo "<button class='btn btn-warning btn-sm editBtn' data-id='" . $row["id"] . "'>Edit</button> ";
                            echo "<button class='btn btn-danger btn-sm deleteBtn' data-id='" . $row["id"] . "'>Delete</button>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    }
                ?>
            </tbody>
        </table>

        <!-- Update Article Modal -->
        <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateModalLabel">Update Article</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="updateForm" method="post"
                            action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <input type="hidden" id="updateId" name="id">
                            <div class="mb-3">
                                <label for="updateTitle" class="form-label">Title</label>
                                <input type="text" class="form-control" id="updateTitle" name="title" required>
                            </div>
                            <div class="mb-3">
                                <label for="updateContent" class="form-label">Content</label>
                                <textarea class="form-control" id="updateContent" name="content" rows="3"
                                    required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="updateAuthor" class="form-label">Author</label>
                                <input type="text" class="form-control" id="updateAuthor" name="author" required>
                            </div>
                            <div class="mb-3">
                                <label for="updateReferenceUrl" class="form-label">Reference URL</label>
                                <input type="url" class="form-control" id="updateReferenceUrl" name="reference_url"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="updatePublicationDate" class="form-label">Publication Date</label>
                                <input type="date" class="form-control" id="updatePublicationDate"
                                    name="publication_date" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" form="updateForm" name="update_article">Update
                            Article</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

    // Search articles
    document.getElementById("searchInput").addEventListener("keyup", function() {
        const filter = this.value.toUpperCase();
        const rows = document.getElementById("articlesTable").getElementsByTagName("tr");
        for (let i = 0; i < rows.length; i++) {
            const columns = rows[i].getElementsByTagName("td");
            let showRow = false;
            for (let j = 0; j < columns.length; j++) {
                if (columns[j].textContent.toUpperCase().includes(filter)) {
                    showRow = true;
                    break;
                }
            }
            rows[i].style.display = showRow ? "" : "none";
        }
    });

    // Edit and Delete button click event listeners
    document.querySelectorAll(".editBtn, .deleteBtn").forEach(function(btn) {
        btn.addEventListener("click", function() {
            if (this.classList.contains("editBtn")) {
                // Edit button clicked
                const id = this.getAttribute("data-id");
                const row = this.closest("tr");
                const rowData = row.getElementsByTagName("td");

                // Fill the update form with the current data
                document.getElementById("updateId").value = rowData[0].textContent;
                document.getElementById("updateTitle").value = rowData[1].textContent;
                document.getElementById("updateContent").value = rowData[2].textContent;
                document.getElementById("updateAuthor").value = rowData[3].textContent;
                document.getElementById("updateReferenceUrl").value = rowData[4].textContent;
                document.getElementById("updatePublicationDate").value = rowData[5].textContent;

                // Show the update modal
                const updateModal = new bootstrap.Modal(document.getElementById("updateModal"));
                updateModal.show();
            } else if (this.classList.contains("deleteBtn")) {
                // Delete button clicked
                const confirmDelete = confirm("Are you sure you want to delete this article?");
                if (confirmDelete) {
                    const id = this.getAttribute("data-id");
                    const form = document.createElement("form");
                    form.method = "POST";
                    form.action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>";
                    const inputId = document.createElement("input");
                    inputId.type = "hidden";
                    inputId.name = "id";
                    inputId.value = id;
                    form.appendChild(inputId);
                    const inputSubmit = document.createElement("input");
                    inputSubmit.type = "submit";
                    inputSubmit.name = "delete_article";
                    inputSubmit.value = "Delete Article";
                    form.appendChild(inputSubmit);
                    document.body.appendChild(form);
                    form.submit();
                }
            }
        });
    });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>