<?php
    $title = 'Hello world';
    $content = 'This is example content';
    $posts = [
        [
            'url' => 'http://localhost/1',
            'title' => 'Title 1',
        ],
        [
            'url' => 'http://localhost/2',
            'title' => 'Title 2',
        ],
        [
            'url' => 'http://localhost/3',
            'title' => 'Title 3',
        ],
    ];
?>
<!DOCTYPE html>
<html>
    <body>
        <h1><?php echo $title; ?></h1>
        <p><?php echo $content; ?></p>
        <hr>
        <ul>
            <?php foreach ($posts as $post) : ?>
                <a href="<?php echo $post['url']; ?>">
                    <?php echo $post['title']; ?>
                </a>
            <?php endforeach; ?>
        </ul>
    </body>
</html>