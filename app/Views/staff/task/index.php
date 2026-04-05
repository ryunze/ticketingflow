<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<?php
    // var_dump($data);
?>

<div class="container mt-4">
    <div class="col-md-6 m-auto">
        <a href="<?= url_to('staff.task.create') ?>" class="btn btn-primary mb-4">New Task</a>
        <table class="table table-striped">
            <thead>
                <th>Title</th>
                <th>Status</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php foreach ($data['tasks'] as $task) : ?>
                <tr>
                    <td><?= $task['title'] ?></td>
                    <td><?= $task['status_name'] ?></td>
                    <td>
                        <?php if ($task['status_id'] == 1) : ?>
                            <button onclick="cancelTask()" class="btn btn-outline-danger">Cancel</button>
                        <?php endif ?>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    function cancelTask() {
        if (confirm('Batalkan task ini?')) {
            alert('Berhasil hapus task.')
        }
    }
</script>

<?= $this->endSection() ?>