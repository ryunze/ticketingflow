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
                    <td>
                        <form action="<?= base_url('support/task/update-status/'.$task['task_id']) ?>" method="post">
                            <div class="d-flex">
                                <select name="status_id" class="form-control">
                                    <option value="5">In Progress</option>
                                    <option value="6">Done</option>
                                </select>
                                <button type="submit" class="btn btn-success ms-2">Update</button>
                            </div>
                        </form>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>