<?php include('includes/header.php'); ?>

<h1>Zippy Used Autos</h1>

<div class="sort-options">
    <a href=".?sort=price">Sort by Price</a> | 
    <a href=".?sort=year">Sort by Year</a>
</div>

<div class="filter-options">
    <form action="." method="get">
        <select name="make_id">
            <option value="0">View All Makes</option>
            <?php foreach ($makes as $make) : ?>
                <option value="<?= $make['make_id']; ?>" <?= ($make_id == $make['make_id']) ? 'selected' : ''; ?>>
                    <?= $make['make_name']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit" name="action" value="list_makes">Filter by Make</button>
    </form>

    <form action="." method="get">
        <select name="type_id">
            <option value="0">View All Types</option>
            <?php foreach ($types as $type) : ?>
                <option value="<?= $type['type_id']; ?>" <?= ($type_id == $type['type_id']) ? 'selected' : ''; ?>>
                    <?= $type['type_name']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit" name="action" value="list_types">Filter by Type</button>
    </form>

    <form action="." method="get">
        <select name="class_id">
            <option value="0">View All Classes</option>
            <?php foreach ($classes as $class) : ?>
                <option value="<?= $class['class_id']; ?>" <?= ($class_id == $class['class_id']) ? 'selected' : ''; ?>>
                    <?= $class['class_name']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit" name="action" value="list_classes">Filter by Class</button>
    </form>
</div>

<?php if (!empty($vehicles)) : ?>
<table>
    <tr>
        <th>Year</th>
        <th>Make</th>
        <th>Model</th>
        <th>Type</th>
        <th>Class</th>
        <th>Price</th>
    </tr>
    <?php foreach ($vehicles as $vehicle) : ?>
    <tr>
        <td><?= htmlspecialchars($vehicle['year']); ?></td>
        <td><?= htmlspecialchars($vehicle['make_name']); ?></td>
        <td><?= htmlspecialchars($vehicle['model']); ?></td>
        <td><?= htmlspecialchars($vehicle['type_name']); ?></td>
        <td><?= htmlspecialchars($vehicle['class_name']); ?></td>
        <td>$<?= number_format($vehicle['price'], 2); ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<?php else : ?>
<p>No vehicles found matching your criteria.</p>
<?php endif; ?>

<?php include('includes/footer.php'); ?>