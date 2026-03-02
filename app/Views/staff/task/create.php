<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<div class="container mt-4">
    <div class="col-6 m-auto">
        <form method="post" action="<?= url_to('staff.task.store') ?>">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>