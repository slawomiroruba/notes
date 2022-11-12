<div class="bg-white p-4 space-y-3">
    <div>
        <p class="font-bold">Tytuł</p>
        <p><?= htmlentities($params['note']['title']) ?></p>
    </div>
    <div>
        <p class="font-bold">Treść</p>
        <p><?= htmlentities($params['note']['description']) ?></p>
    </div>
    <div>
        <p class="font-bold">Utworzona:</p>
        <p><?= htmlentities($params['note']['created']) ?></p>
    </div>
</div>