<?php
if (!isset($_GET['username']) || empty($_GET['username'])) {
    die("Please provide a username.");
}

$user = htmlspecialchars($_GET['username']);
$api_url = "https://api.github.com/users/$user";
$options = [
    "http" => ["header" => "User-Agent: PHP-App"]
];
$context = stream_context_create($options);
$response = @file_get_contents($api_url, false, $context);

if ($response === FALSE) {
    die("User not found or API limit exceeded.");
}

$data = json_decode($response, true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .card {
            width: 350px;
            background: #0d1117;
            color: white;
            border-radius: 10px;
            padding: 20px;
            border: 1px solid #30363d;
            text-align: center;
            margin: 50px auto;
        }
        .avatar { width: 100px; border-radius: 50%; border: 2px solid #58a6ff; }
        .name { font-size: 22px; margin: 10px 0 5px; color: #58a6ff; }
        .bio { font-size: 14px; color: #8b949e; margin-bottom: 15px; }
        .stats { display: flex; justify-content: space-around; border-top: 1px solid #30363d; padding-top: 15px; }
        .stats div span { display: block; font-weight: bold; font-size: 18px; }
        .stats div label { font-size: 12px; color: #8b949e; }
        a { color: #58a6ff; text-decoration: none; font-size: 14px; }
    </style>
</head>
<body>

<div class="card">
    <img src="<?= $data['avatar_url'] ?>" class="avatar" alt="Profile Picture">
    <div class="name"><?= $data['name'] ?? $data['login'] ?></div>
    <div class="bio"><?= $data['bio'] ?? 'No bio available' ?></div>
    
    <div class="stats">
        <div>
            <span><?= $data['public_repos'] ?></span>
            <label>Repos</label>
        </div>
        <div>
            <span><?= $data['followers'] ?></span>
            <label>Followers</label>
        </div>
        <div>
            <span><?= $data['following'] ?></span>
            <label>Following</label>
        </div>
    </div>
    <br>
    <a href="<?= $data['html_url'] ?>" target="_blank">View Profile</a>
</div>

</body>
</html>