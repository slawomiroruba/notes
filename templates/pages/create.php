<div class="bg-white p-4">
    <h3 class="font-bold">Nowa notatka</h3>
    <form action="<?= \App\BASE_URL ?>?action=create" method="POST">
        <ul class="space-y-2">
            <li class="flex flex-col space-y-1">
                <label for="title">Tytuł<span class="text-red-500 ml-1">*</span></label>
                <input class="border border-black px-2" type="text" name="title" id="title">
            </li>
            <li class="flex flex-col space-y-1">
                <label for="field5">Opis</label>
                <textarea class="border border-black px-2" name="description" id="field5" rows="4"></textarea>
            </li>
            <li>
                <input class="bg-blue-500 w-full p-2" type="submit" value="Dodaj notatkę">
            </li>
        </ul>
    </form>
</div>
