<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php
$id = $_GET["id"] ?? 0;
$recepts = json_decode(file_get_contents("recepts.json"), true);
$receptForm = [];
if($id != 0) {
    foreach ($recepts as $recept) {
        if ($recept["id"] == $id){
            $receptForm = $recept;
        }
    }
}
?>


<div class="container">
    <form class="form-dark" method="post">
        <input type="hidden" value="<?= $receptForm["id"]  ?? ""?>" name="id" />
        <input name="title" value="<?= $receptForm["title"]  ?? ""?>" placeholder="Title"><br/>
        <textarea name="instruction"><?= $receptForm["instruction"]  ?? ""?></textarea><br/>
        <button type="submit">Create</button>
    </form>
</div>

<?php
$recepts = json_decode(file_get_contents("recepts.json"), true);
foreach ($recepts as $recept){?>
    <div class="card">
        <?= $recept["title"]?>
        <a href="?id=<?= $recept["id"] ?>">Edit</a>
        <a href="?id=<?= $recept["id"] ?>&delete">Delete</a>
    </div>
<?php }
?>

</body>
</html>