<div class="container mt-3">
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?=$data['students']['name'];?></h5>
    <h6 class="card-subtitle mb-2 text-body-secondary"><?=$data['students']['npm'];?></h6>
    <p class="card-text"><?=$data['students']['email'];?> <br> <?=$data['students']['major'];?></p>
    <br>
    <div class="d-flex justify-content-between">
      <a href="<?=BASEURL;?>/students" class="btn btn-secondary">Back</a>
      <button class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#formModal" style="text-decoration:none">
        Edit
      </button>
    </div>
  </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="modalTitle">Edit Student Data</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="<?=BASEURL;?>/students/edit" method="post">
            <div class="modal-body">
                <div class="mb-3">
                    <input type="hidden" id="id" name="id" value="<?=$data['students']['id'];?>">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control mb-2" id="name" name="name" value="<?=$data['students']['name'];?>" required>
                    <label for="npm" class="form-label">NPM</label>
                    <input type="number" class="form-control mb-2" id="npm" name="npm" value="<?=$data['students']['npm'];?>" required>
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control mb-2" id="email" name="email" value="<?=$data['students']['email'];?>" required>
                    <label for="major" class="form-label">Major</label>
                    <select class="form-select" id="major" name="major" aria-label="Default select example">
                        <option value="<?=$data['students']['major'];?>"><?=$data['students']['major'];?></option>Chemical Engineering
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
                <button type="submit" class="btn btn-primary">Update Data</button>
            </div>
        </form>
    </div>
  </div>
</div>