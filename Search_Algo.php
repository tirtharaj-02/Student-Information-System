<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "bcaproject";

$data = mysqli_connect($host, $user, $password, $db);

if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

$search_results = [];

// Function to calculate the weight of a string
function calculate_weight($string) {
    $sum = 0;
    foreach (str_split(strtoupper($string)) as $char) {
        $sum += ctype_alpha($char) ? ord($char) - ord('A') + 1 : intval($char);
    }
    return $sum;
}

// Function to find the k-th smallest element based on weight
function get_kth_element($arr, $k) {
    usort($arr, fn($a, $b) => $a['weight'] <=> $b['weight']); // Sort by weight
    return $arr[$k - 1] ?? null; // Return k-th element (1-based index)
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $search_query = mysqli_real_escape_string($data, $_POST['search_query'] ?? '');
    $k_rank = intval($_POST['k_rank'] ?? 1);

    $sql = "
        (SELECT 'Teacher' AS type, name AS name, description AS details, image, id 
        FROM teacher WHERE name LIKE '%$search_query%')
        UNION
        (SELECT 'Student' AS type, username AS name, email AS details, image, id 
        FROM user WHERE usertype='student' AND username LIKE '%$search_query%')
    ";

    $result = mysqli_query($data, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $row['weight'] = calculate_weight($row['name']);
            $search_results[] = $row;
        }

        // Get the k-th ranked result
        $search_results = [$search_results ? get_kth_element($search_results, $k_rank) : null];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickSelect-Algorithm</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Quick select Algorithm</h2>
    <form method="POST" class="mb-4">
        <div class="input-group">
            <input type="text" name="search_query" class="form-control" placeholder="Enter Search Query" required>
            <input type="number" name="k_rank" class="form-control" placeholder="Enter K Rank" min="1" required>
            <button type="submit" class="btn btn-primary">Search</button>
            <button type="button" class="btn btn-warning" onClick="location.href='index.php'">Exit</button>
        </div>
    </form>

    <?php if (!empty($search_results) && $search_results[0]): ?>
        <div class="table-responsive">
            <h2 class="text-center">Top K Result</h2>
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Type</th>
                        <th>Name</th>
                        <th>Details</th>
                        <th>Image</th>
                        <th>Weight</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo htmlspecialchars($search_results[0]['type']); ?></td>
                        <td><?php echo htmlspecialchars($search_results[0]['name']); ?></td>
                        <td><?php echo htmlspecialchars($search_results[0]['details']); ?></td>
                        <td><img src="<?php echo htmlspecialchars($search_results[0]['image']); ?>" class="img-thumbnail" style="width: 50px; height: 50px;"></td>
                        <td><?php echo htmlspecialchars($search_results[0]['weight']); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <div class="alert alert-danger text-center">No results found...</div>
    <?php endif; ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
