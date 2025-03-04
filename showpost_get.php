<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($activity['name']) ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: url('bk.png') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>

<div class="mx-auto mt-10 p-6 bg-gray-200 rounded-xl shadow-md text-center flex flex-col items-center" style="margin-top: 100px; width: 1800px; min-height: 750px; height: auto;">
    <h1 class="text-2xl font-bold text-gray-800"><?= htmlspecialchars($activity['name']) ?></h1>

    <div class="mt-4 w-full flex justify-center items-center">
        <?php
        if (!empty($activity['image'])) {
            $images = explode(',', $activity['image']);
            $image_count = count($images);
            ?>
            <div class="<?= $image_count > 3 ? 'overflow-x-auto whitespace-nowrap flex p-2' : 'flex justify-center w-full' ?>" style="max-width: 100%;">
                <?php
                foreach ($images as $image) {
                    $image_path = htmlspecialchars(trim($image));
                    ?>
                    <img src="<?= $image_path ?>" class="rounded-lg shadow object-cover <?= $image_count === 1 ? 'w-full h-[600px]' : 'w-full h-[400px]' ?>">
                    <?php
                }
                ?>
            </div>
            <?php
        } else {
            echo "<p class='text-gray-500'>ไม่มีรูป</p>";
        }
        ?>
    </div>

    <p class="mt-4 text-gray-700 text-center" style="font-size: 26px; max-width: 80%;">
        <strong>รายละเอียด:</strong> <?= htmlspecialchars($activity['description']) ?><br>
        <strong>วันที่:</strong> <?= htmlspecialchars($activity['start_date']) ?><br>
        <strong>เวลา:</strong> <?= htmlspecialchars($activity['start_time']) ?><br>
        <strong>สถานที่:</strong> <?= htmlspecialchars($activity['location']) ?>
    </p>

    <br><br>
    <a href="/register?activity_id=<?= urlencode($activity['aid']) ?>&user_id=<?= urlencode($_SESSION['user_id']) ?>"
        class="mt-5 bg-blue-500 text-white px-8 py-4 rounded-lg hover:bg-blue-600 text-center" style="text-decoration: none;">
        ขอเข้าร่วมกิจกรรม
    </a> 
</div>


</body>

</html>