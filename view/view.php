<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Qo'shish</title>
</head>
<body>
<h1>Post Qo'shish</h1>
<form action="/post" method="post">
    <textarea name="text" rows="5" cols="50" maxlength="500" required></textarea><br>
    <button type="submit">Yuborish</button>
</form>

<h2>Barcha Postlar</h2>
<ul>
    <?php
    use Jamshid\ExamProject\DB;

    $pdo = DB::getConnection();
    $posts = $pdo->query("SELECT * FROM posts ORDER BY created_at DESC")->fetchAll();
    foreach ($posts as $post) {
        echo "<li>" . htmlspecialchars($post['text']) . " - " . $post['created_at'] . "</li>";
    }
    ?>
</ul>
</body>
</html>
