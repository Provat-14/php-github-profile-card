<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GitHub Profile Card Generator</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin-top: 50px; background: #f4f4f4; }
        .box { background: white; padding: 20px; display: inline-block; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        input { padding: 10px; width: 250px; border: 1px solid #ddd; border-radius: 4px; }
        button { padding: 10px 20px; background: #289fa7; color: white; border: none; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>
    <div class="box">
        <h2>Create GitHub Card</h2>
        <form action="card.php" method="GET">
            <input type="text" name="username" placeholder="Enter GitHub username (e.g., DProvat)" required>
            <button type="submit">Generate</button>
        </form>
    </div>
</body>
</html>