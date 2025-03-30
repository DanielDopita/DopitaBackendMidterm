<?php include('includes/header.php'); ?>

<h1>Manage Classes</h1>

<form action="." method="post">
    <input type="hidden" name="action" value="add_class">
    <label>Class Name:</label>
    <input type="text" name="class_name" required>
    <button type="submit">Add Class</button>
</form>

<table>
    <tr>
        <th>Name</th>
        <th>Action</th>
    </tr>
    <?php foreach ($classes as $class) : ?>
    <tr>
        <td><?= $class['class_name']; ?></td>
        <td>
            <form action="." method="post">
                <input type="hidden" name="action" value="delete_class">
                <input type="hidden" name="class_id" value="<?= $class['class_id']; ?>">
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php include('includes/footer.php'); ?>