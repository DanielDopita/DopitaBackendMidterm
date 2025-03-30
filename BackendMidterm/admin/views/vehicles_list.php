<?php include('includes/header.php'); ?>

<h1>Vehicle Inventory</h1>

<div class="sort-options">
    <a href=".?sort=price">Sort by Price</a> | 
    <a href=".?sort=year">Sort by Year</a>
</div>

<table>
    <tr>
        <th>Year</th>
        <th>Make</th>
        <th>Model</th>
        <th>Type</th>
        <th>Class</th>
        <th>Price</th>
        <th>Action</th>
    </tr>
    <?php foreach ($vehicles as $vehicle) : ?>
    <tr>
        <td><?= $vehicle['year']; ?></td>
        <td><?= $vehicle['make_name']; ?></td>
        <td><?= $vehicle['model']; ?></td>
        <td><?= $vehicle['type_name']; ?></td>
        <td><?= $vehicle['class_name']; ?></td>
        <td>$<?= number_format($vehicle['price'], 2); ?></td>
        <td>
            <form action="." method="post">
                <input type="hidden" name="action" value="delete_vehicle">
                <input type="hidden" name="vehicle_id" value="<?= $vehicle['vehicle_id']; ?>">
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php include('includes/footer.php'); ?>