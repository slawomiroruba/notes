<div>
    <?php if(!empty($params['before'])) {
        switch ($params['before']) {
            case 'created':
                echo '<div id="message" class="p-2 border border-green-600 bg-green-200 text-green-600 mb-2">Notatka została utworzona</div>';
                break;
        }
    }
    ?>
</div>



<?php if(!empty($params['notes'])): ?>
    <div class="border-2 border-blue-500">
        <ul class="bg-blue-500 text-white grid grid-cols-[50px_1fr_120px] p-3">
            <li>ID</li>
            <li>Tytuł</li>
            <li>Opcje</li>
        </ul>

        <?php foreach ($params['notes'] as $note): ?>

            <ul class="<?= $note['id'] % 2 ? 'bg-white' : 'bg-gray-200' ?> text-gray-800 grid grid-cols-[50px_1fr_120px] p-3">
                <li><?= (int) $note['id'] ?></li>
                <li><?= htmlentities($note['title']) ?></li>
                <li><a href="/notes/?action=show&id=<?= (int) $note['id'] ?>">Pokaż</a></li>
            </ul>

        <?php endforeach; ?>
    <div>
<?php else: ?>
    <p class="text-center py-2">Nie znaleziono notatek</p>
<?php endif; ?>

