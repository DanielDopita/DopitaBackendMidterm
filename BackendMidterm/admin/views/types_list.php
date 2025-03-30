<?php include('includes/header.php'); ?>

<h1>Manage Types</h1>

<form action="." method="post">
    <input type="hidden" name="action" value="add_type">
    <label>Type Name:</label>
    <input type="text" name="type_name" required>
    <button type="submit">Add Type</button>
</form>

<table>
    <tr>
        <th>Name</th>
        <th>Action</th>
    </tr>
    <?php foreach ($types as $type) : ?>
    <tr>
        <td><?= $type['type_name']; ?></td>
        <td>
            <form action="." method="post">
                <input type="hidden" name="action" value="delete_type">
                <input type="hidden" name="type_id" value="<?= $type['type_id']; ?>">
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php include('includes/footer.php'); ?>