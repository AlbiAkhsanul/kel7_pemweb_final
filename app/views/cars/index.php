<div class="container mt-3">

    <!-- flasher -->
    <div class="row">
        <div class="col-lg-6">
            <?php FlashMsg::flash(); ?>
        </div>
    </div>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formModal">
        New Student
    </button>

    <h2 class="mt-3">Students List</h2>

    <form class="d-flex mt-2 mb-2 col-lg-3" role="search" action="<?= BASEURL; ?>/students/search" method="post">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="keyword" name="keyword" autocomplete="off">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>

    <ul class="list-group col-lg-6">
        <?php foreach ($data['students'] as $student) : ?>
            <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-action">
                <h5><?= $student['name']; ?></h5>
                <div class="btn-group dropend">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"></button>
                    <ul class="dropdown-menu">
                        <li><a href="<?= BASEURL; ?>/students/details/<?= $student['id']; ?>" class="dropdown-item" style="text-decoration:none">Details</a></li>
                        <li><a href="<?= BASEURL; ?>/students/delete/<?= $student['id']; ?>" class="dropdown-item" style="text-decoration:none" onclick="return confirm('Are you sure to delete this data?');">Delete</a></li>
                    </ul>
                    <div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalTitle">Insert New Student</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= BASEURL; ?>/students/create" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control mb-2" id="name" name="name" placeholder="student name" required>
                        <label for="npm" class="form-label">NPM</label>
                        <input type="number" class="form-control mb-2" id="npm" name="npm" placeholder="student NPM" required>
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control mb-2" id="email" name="email" placeholder="name@example.com" required>
                        <label for="major" class="form-label">Major</label>
                        <select class="form-select" id="major" name="major" aria-label="Default select example">
                            <option value="Chemical Engineering">Chemical Engineering</option>
                            <option value="Electrical Engineering">Electrical Engineering</option>
                            <option value="Industrial Engineering">Industrial Engineering</option>
                            <option value="Information Systems">Information Systems</option>
                            <option value="Art">Art</option>
                            <option value="Informatics Engineering">Informatics Engineering</option>
                            <option value="Management">Management</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Insert</button>
                </div>
            </form>
        </div>
    </div>
</div>