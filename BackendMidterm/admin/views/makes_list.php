<?php include('includes/header.php'); ?>

<h1>Manage Makes</h1>

<form action="." method="post">
    <input type="hidden" name="action" value="add_make">
    <label>Make Name:</label>
    <input type="text" name="make_name" required>
    <button type="submit">Add Make</button>
</form>

<table>
    <tr>
        <th>Name</th>
        <th>Action</th>
    </tr>
    <?php foreach ($makes as $make) : ?>
    <tr>
        <td><?= $make['make_name']; ?></td>
        <td>
            <form action="." method="post">
                <input type="hidden" name="action" value="delete_make">
                <input type="hidden" name="make_id" value="<?= $make['make_id']; ?>">
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php include('includes/footer.php'); ?>