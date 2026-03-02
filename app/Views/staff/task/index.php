<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<div class="container mt-4">
    <div class="col-md-6 m-auto">
        <a href="<?= url_to('staff.task.create') ?>" class="btn btn-primary mb-4">New Task</a>
        <table class="table table-striped">
            <thead>
                <th>Title</th>
                <th>Status</th>
            </thead>
            <tbody>
                <?php foreach ($data['tasks'] as $task) : ?>
                    <tr>
                        <td><?= $task['title'] ?></td>
                        <td><?= $task['status_id'] ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>